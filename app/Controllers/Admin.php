<?php

namespace App\Controllers;
use App\Models\getCategories;
use App\Models\ProductModel;
use App\Models\ProductImageModel;
use App\Models\RoleModel;
use App\Models\CategoriesModel;
use App\Models\UserModel;

class Admin extends BaseController
{

	public function index()
	{
		echo view('Admin/sidebar');
		echo view('Admin/admin-dashboard');
	}
	public function administrators(){
		$data = [];
		$model = new UserModel();
		$data['admins'] = $model->whereIn('role',[2])->paginate();
		$data['pager'] = $model->pager;
		echo view('A/header/header');
		echo view('A/administrators', $data);
	}
	public function getAdministrator($id = null){
		$model = new UserModel();
		$data['admin'] = $model->getWhere(['user_id'=> $id])->getFirstRow('array');
		echo view('A/header/header');
		echo view('A/user', $data);
	}
	public function inventory(){
		$data = [];
		$db = db_connect();
		$model = new getCategories($db);
		$categories = $model->getC();
		$categories = json_decode(json_encode($categories), true);
		$data['categories'] = $categories;
		
		$model = new ProductModel();
		$data['products'] = $model->paginate();

		$data['pager'] = $model->pager;
		echo view('Admin/sidebar');
		echo view('Admin/inventory', $data);
	}

	public function getSubcategories($id = NULL){
		$data = [];
		intval($id);
		$db = db_connect();
		$model = new getCategories($db);
		$subcategories = $model->getSC($id);
		foreach($subcategories as $subcategory){
			$data[] = array(
				"id"=>$subcategory->subcategory_id,
				"name"=>$subcategory->subcategory_name,
				"category"=>$subcategory->category
			);
		}
		$response['data'] = $data;
		return $this->response->setJSON($response);
	}


	protected $seek;
	public function additem(){

		$this->seek= service('request');
		$image = $this->seek->getFile('image');
		$image_name = $image->getRandomName();
		$image->move(ROOTPATH."public/media", $image_name);

		helper(['form']);
		if($this->request->getMethod() == 'post'){
			$model = new ProductModel();
			$data = [
				'product_name' => $this->seek->getVar('name'),
				'product_description' => $this->seek->getVar('description'),
				'product_image' => $image_name,
				'unit_price' => $this->seek->getVar('price'),
				'available_quantity' => $this->seek->getVar('quantity'),
				'subcategory_id' => $this->seek->getVar('subcategory'),
				'added_by'=> 1

			];

			$model->save($data);
			$product_id =(int) $model->insertID();
			$more_data = [
				'product_image' => $image_name,
				'product_id' => $product_id,
				'added_by'=> 1
			];
			$product_image = new ProductImageModel();
			$product_image->save($more_data);

			return 'success';
		}
	}

	public function search($searchvalue = NULL){
		$model = new ProductModel();
		$data['with_name'] = json_decode(json_encode($model->like('product_name',$searchvalue)), true);
		$data['with_id'] = json_decode(json_encode($model->orLike('product_id', $searchvalue, 'after')), true);
		return $data;
	}

	public function registration(){
		echo view('Admin/sidebar');
		echo view("Admin/registration");
	}

	protected $var;
	public function register(){
		$this->var = service('request');

		helper(['form']);
		if($this->request->getMethod() == 'post'){
			$rules = [
				'first_name' => 'required|min_length[3]|max_length[255]',
				'last_name' => 'required|min_length[3]|max_length[255]',
				'email' => 'required|min_length[6]|max_length[255]|valid_email|is_unique[tbl_users.email]',
				'password'=> 'required|min_length[8]|max_length[255]',
				'password_confirm'=> 'matches[password]'
			];

			if(!$this->validate($rules)){
				// echo view('Registration/registration.php', [
				// 	'validation' => $this->validator,
				// ]);
				$data = array(
					'validation' => $this->validator,
				);
				return $data;
			}else{
				$model = new UserModel();
				$newData = [
					'first_name' => $this->var->getVar('first_name'),
					'last_name' => $this->var->getVar('last_name'),
					'email' => $this->var->getVar('email'),
					'password'=> password_hash($this->var->getVar('password'), PASSWORD_DEFAULT),
					'gender'=> $this->var->getVar('gender'),
					'role'=> 2
				];
				$model->save($newData);
				$session = session();
				$session->set('success', 'Registration Successful');
				return "success";
			}
		}
	}

	public function customers(){
		$data = [];
		$model = new UserModel();
		$data['clients'] = $model->whereIn('role',[1])->paginate();

		$data['pager'] = $model->pager;
		echo view('Admin/sidebar');
		echo view('Admin/customers', $data);
	}
	public function delete($id = null){
		$model = new UserModel();
		if($model->where('user_id', $id)->delete()){
			return "success";
		}else{
			return $model->error();
		}

	}
	public function update($id = null){
		$this->seek= service('request');
		$model = new UserModel();
		$data = $this->seek->getVar();
		$data['user_id'] = $id;
		if($this->seek->getVar('password')){
			if($model->save($data)){
				return "success";
			}else{
				return $model->errors();
			}
		}elseif($this->seek->getVar('first_name')){
			$data['password'] = password_hash($this->seek->getVar('password'), PASSWORD_DEFAULT);
			if($model->save($data)){
				return "success";
			}else{
				return $model->errors();
			}
		}
	}

	public function test(){
		$data = [];
		$model = new UserModel();
		$data['admins'] = json_decode(json_encode($model->whereIn('role',[2])->paginate()), true);
		$data['pager'] = $model->pager;
		echo view('A/header/header');
		echo view('A/user', $data);
	}
}


?>
