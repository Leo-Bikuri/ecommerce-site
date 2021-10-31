<?php

namespace App\Controllers;
use App\Models\getCategories;
use App\Models\ProductModel;
use App\Models\CategoriesModel;

class Admin extends BaseController
{
	public function index()
	{
		echo view('Admin/sidebar');
		echo view('Admin/admin-dashboard');
	}

	public function inventory(){
		echo view('Admin/sidebar');
		echo view('Admin/inventory');
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
		$this->see = service('request');

		helper(['form']);
		if($this->request->getMethod() == 'post'){
			
		}
	}
}


?>
