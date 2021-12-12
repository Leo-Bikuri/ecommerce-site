<?php

namespace App\Controllers;
use App\Models\getCategories;
use App\Models\ProductModel;
use App\Models\CategoriesModel;
use App\Models\UserModel;

class Client extends BaseController
{
	public function index()
	{
		echo view('Client/header/client-header');
		echo view('Client/index');
	}
    public function shop(){
        $model = new ProductModel();
        $data['products'] = $model->paginate();
        $data['pager'] = $model->pager;
        echo view('Client/header/client-header');
        echo view('Client/shop', $data);
    }
    public function cart(){
        echo view('Client/header/client-header');
		echo view('Client/cart');
    }
    public function sproduct(){
        echo view('Client/header/client-header');
		echo view('Client/sproduct');
    }
}

?>
