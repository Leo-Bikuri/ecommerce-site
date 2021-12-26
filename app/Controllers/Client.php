<?php

namespace App\Controllers;
use App\Models\getCategories;
use App\Models\ProductModel;
use App\Models\CategoriesModel;
use App\Models\SubcategoriesModel;
use App\Models\UserModel;

class Client extends BaseController
{
    public static function getCategories(){
        $model = new CategoriesModel();
        $data['categories'] = $model->findAll();
        return $data;
    }
	public function index()
	{
		echo view('Client/header/client-header', $this->getCategories());
		echo view('Client/index');
	}
    public function shop($id = NULL){
        $category = array(
            'id' => $id
        );
        session()->set($category);
        $p_model = new ProductModel();
        $s_model = new SubcategoriesModel();
        $subCategories = json_decode(json_encode($s_model->getWhere(['category'=>$id])->getResult()), true);
        $x=0;
        // dd($subCategories);
        foreach($subCategories as $subCategory){
            $ids[$x]= $subCategory['subcategory_id'];
            $x++;
        }
        $data['products'] = json_decode(json_encode($p_model->whereIn('subcategory_id', $ids)->paginate()), true);
        $data['pager'] = $p_model->pager;
        $data['subcategories'] = $subCategories;
        echo view('Client/header/client-header', $this->getCategories());
        echo view('Client/shop', $data);
    }

    public function shop_subcategories($id = NULL){
        $p_model = new ProductModel();
        $s_model = new SubcategoriesModel();
        $subCategories = json_decode(json_encode($s_model->getWhere(['category'=>session()->get('id')])->getResult()), true);
        $data['products'] = json_decode(json_encode($p_model->whereIn('subcategory_id', [$id])->paginate()), true);
        shuffle($data['products']);
        $data['pager'] = $p_model->pager;
        $data['subcategories'] = $subCategories;
        echo view('Client/header/client-header', $this->getCategories());
        echo view('Client/shop', $data);
    }
    public function cart(){
        echo view('Client/header/client-header', $this->getCategories());
		echo view('Client/cart');
    }
    public function sproduct($id = NULL){
        $product_model = new ProductModel();
        $data['product'] = json_decode(json_encode($product_model->getWhere(['product_id'=>$id])->getResult()), true);
        $data['related_products'] = json_decode(json_encode($product_model->getWhere(['subcategory_id'=>$data['product'][0]['subcategory_id']])->getResult()), true);
        shuffle($data['related_products']);
        echo view('Client/header/client-header', $this->getCategories());
		echo view('Client/sproduct', $data);
    }
}

?>
