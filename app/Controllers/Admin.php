<?php

namespace App\Controllers;
use App\Models\getCategories;
use App\Models\ProductModel;
use App\Models\CategoriesModel;

class Admin extends BaseController
{
	public function index()
	{
		echo view('Admin/sidebar.php');
		echo view('Admin/admin-dashboard');
	}

	public function additem(){
		$data = [];
		$db = db_connect();
		$model = new getCategories($db);
		$categories = $model->getC();
		$categories = json_decode(json_encode($categories), true);
		$data['categories'] = $categories;
		echo view('Admin/sidebar.php');
		echo view('Admin/additem.php', $data);
	}
	public function getSubcategories($id = NULL){
		intval($id);
		$db = db_connect();
		$model = new getCategories($db);
		$subcategories = $model->getSC($id);
		$subcategories = json_decode(json_encode($subcategories), true);
		return $subcategories;
	}

}

?>
