<?php

namespace App\Controllers;
use App\Models\getCategories;
use App\Models\ProductModel;
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
		$users = json_decode(json_encode($model->getWhere(['role' => 1])->getResult()), true);
		$data['admins'] = $users;
		echo view('Admin/administrators', $data);
	}

	public function inventory(){

		$model = new ProductModel();
		$data['products'] = $model->paginate();
		$data['pager'] = $model->pager;
		echo view('Admin/sidebar');
		echo view('Admin/inventory', $data);
	}

	public function add_item(){
		$data = [];
		$db = db_connect();
		$model = new getCategories($db);
		$categories = $model->getC();
		$categories = json_decode(json_encode($categories), true);
		$data['categories'] = $categories;
		echo view('Admin/sidebar');
		echo view('Admin/additem', $data);
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
		date_default_timezone_set('Africa/Nairobi');
		$date = date('Y-m-d H:i:s');

		$this->seek= service('request');
		$destination = '/assets/images';
		$image = $this->seek->getFile('image');
		$image_name = $image->getName();
		$image->move($destination, $image_name);

		helper(['form']);
		if($this->request->getMethod() == 'post'){
			$model = new ProductModel();
			$data = [
				'product_name' => $this->seek->getVar('name'),
				'product_description' => $this->seek->getVar('quantity'),
				'product_image' => $image->getClientName(),
				'unit_price' => $this->seek->getVar('price'),
				'available_quantity' => $this->seek->getVar('quantity'),
				'subcategory_id' => $this->seek->getVar('subcategory'),
				'created_at' =>    $date,
				'updated_at'=>   $date,
				'added_by'=> 1

			];

			$model->save($data);
			return "success";
		}
	}

	public function search($searchvalue = NULL){
		$model = new ProductModel();
		$data['with_name'] = json_decode(json_encode($model->like('product_name',$searchvalue)), true);
		$data['with_id'] = json_decode(json_encode($model->orLike('product_id', $searchvalue, 'after')), true);
		return $data;
	}
}


?>
