<?php

namespace App\Controllers;
use App\Models\getCategories;
use App\Models\ProductModel;
use App\Models\CategoriesModel;
use App\Models\SubcategoriesModel;
use App\Models\UserModel;

class Client extends BaseController
{
    protected $seek;
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
    public function shop(){
        
        $uri = current_url(true);
        $category_id = $uri->setSilent()->getSegment(2);
        // dd($category_id);
        // if(!is_string($uri->setSilent()->getSegment(3)){
        //     $subcategory_id = $uri->setSilent()->getSegment(3);
        // }
        if(is_numeric($uri->setSilent()->getSegment(3)) || $uri->setSilent()->getSegment(3) == ""){
            $subcategory_id = $uri->setSilent()->getSegment(3);
        }else{
            $subcategory_id = "";
        }
        $sort = $uri->setSilent()->getSegment(4);
        if($sort == ""){
            if(is_numeric($uri->setSilent()->getSegment(3))){
            $sort = "";
            }else{
                $sort = $uri->setSilent()->getSegment(3);
            }
            
        }
        // dd($sort);
        $data = $this->getProducts($category_id, $subcategory_id, $sort);
        echo view('Client/header/client-header', $this->getCategories());
        echo view('Client/shop', $data);
    }
    public function getProducts($category_id, $subcategory_id = null, $sort = null){
        $category = array(
            'id' => $category_id
        );
        session()->set($category);
        $p_model = new ProductModel();
        $s_model = new SubcategoriesModel();
        $subCategories = json_decode(json_encode($s_model->getWhere(['category'=>$category_id])->getResult()), true);
        $x=0;
        $ids = [];
        foreach($subCategories as $subCategory){
            $ids[$x]= $subCategory['subcategory_id'];
            $x++;
        }
        $data['products'] = json_decode(json_encode($p_model->whereIn('subcategory_id', $ids)->paginate()), true);
        $data['pager'] = $p_model->pager;
        $data['subcategories'] = $subCategories;
        if($subcategory_id!="" && $sort==""){
            $p_model = new ProductModel();
            $s_model = new SubcategoriesModel();
            session()->set('sub_id', $subcategory_id);
            $subCategories = json_decode(json_encode($s_model->getWhere(['category'=>$category['id']])->getResult()), true);
            $data['products'] = json_decode(json_encode($p_model->whereIn('subcategory_id', [$subcategory_id])->paginate()), true);
            $data['pager'] = $p_model->pager;
            $data['subcategories'] = $subCategories;
            return $data;
        }if($sort != "" && $subcategory_id!=""){
            if($sort[0] == 'p'){
                $col = 'unit_price';
            }elseif($sort[0] == 'c'){
                $col = 'created_at';
            }
            $p_model = new ProductModel();
            $s_model = new SubcategoriesModel();
            $subCategories = json_decode(json_encode($s_model->getWhere(['category'=>$category['id']])->getResult()), true);
            $data['products'] = json_decode(json_encode($p_model->orderBy($col, trim(str_replace('p', '', substr($sort, -4))))->whereIn('subcategory_id', [$subcategory_id])->paginate()), true);
            $data['pager'] = $p_model->pager;
            $data['subcategories'] = $subCategories;

            return $data;
        }
        if($sort != "" && $category_id!=""){
            if($sort[0] == 'p'){
                $col = 'unit_price';
            }elseif($sort[0] == 'c'){
                $col = 'created_at';
            }
            $category = array(
                'id' => $category_id
            );
            session()->set($category);
            $p_model = new ProductModel();
            $s_model = new SubcategoriesModel();
            $subCategories = json_decode(json_encode($s_model->getWhere(['category'=>$category_id])->getResult()), true);
            $x=0;
            $ids = [];
            foreach($subCategories as $subCategory){
                $ids[$x]= $subCategory['subcategory_id'];
                $x++;
            }
            $data['products'] = json_decode(json_encode($p_model->orderBy($col, trim(str_replace('p', '', substr($sort, -4))))->whereIn('subcategory_id', $ids)->paginate()), true);
            $data['pager'] = $p_model->pager;
            $data['subcategories'] = $subCategories;

            return $data;
        }
        return $data;
    }

    // public function shop_subcategories($id = NULL, $sortby = null){
    //     $p_model = new ProductModel();
    //     $s_model = new SubcategoriesModel();
    //     $subCategories = json_decode(json_encode($s_model->getWhere(['category'=>session()->get('id')])->getResult()), true);
    //     $data['products'] = json_decode(json_encode($p_model->whereIn('subcategory_id', [$id])->paginate()), true);
    //     $data['pager'] = $p_model->pager;
    //     $data['subcategories'] = $subCategories;
    //     $data['products'] = json_decode(json_encode($p_model->whereIn('subcategory_id', [$id])->paginate()), true);
    //     echo view('Client/header/client-header', $this->getCategories());
    //     echo view('Client/shop', $data);
    // }
    public function cart(){
        $cart = \Config\Services::cart();
        $data['orders'] = $cart->contents(); 
        echo view('Client/header/client-header', $this->getCategories());
		echo view('Client/cart', $data);
    }
    public function sproduct($id = NULL){
        $product_model = new ProductModel();
        $data['product'] = json_decode(json_encode($product_model->getWhere(['product_id'=>$id])->getResult()), true);
        $data['related_products'] = json_decode(json_encode($product_model->getWhere(['subcategory_id'=>$data['product'][0]['subcategory_id']])->getResult()), true);
        echo view('Client/header/client-header', $this->getCategories());
		echo view('Client/sproduct', $data);
    }
    public function add_to_cart(){
        $this->seek = service('request');
        $data = array(
            'id' => $this->seek->getVar('item-id'),
            'qty' =>$this->seek->getVar('quantity'),
            'price' => (int) $this->seek->getVar('price'),
            'name' => $this->seek->getVar('item'),
            'options'=> array('image' => $this->seek->getVar('image'))
        );
        
        $cart = \Config\Services::cart();
        if($cart->insert($data)){
            session()->set('items',$cart->totalItems());
            return "success";
        }else{
            return 'fail';
        }
    }
    public function empty_cart(){
        $cart = \Config\Services::cart();
        $cart->destroy();
        session()->remove('items');
    }
    public function cart_delete($rowid = NULL){
        $cart = \Config\Services::cart();
        $cart->remove($rowid);
        session()->set('items', $cart->totalItems());
        return redirect()->back();
    }
    public function update_cart($rowid = NULL){
        $this->seek = service('request');
        $cart = \Config\Services::cart();
        $cart->update(array(
            'rowid'=> $rowid,
            'qty' => $this->seek->getVar('quantity')
        ));
        session()->set('items', $cart->totalItems());
        return "success";
    }
    public function checkout(){
        $cart = \Config\Services::cart();
        $data['cart'] = $cart->contents();
        return view('Client/checkout.php',$data);
    }
    public function thanks(){
        $cart = $cart = \Config\Services::cart();
        $data['orders'] = $cart->contents();
        echo view('Client/pdf', $data);
    }
}

?>
