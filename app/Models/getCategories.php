<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use PHPUnit\TextUI\CliArguments\Builder;
use CodeIgniter\Model;

class getCategories extends Model{
    protected $db;
    public function __construct(ConnectionInterface $db){
        $this->db=&$db;
    }
    public function getC(){
        $builder = $this->db->table('tbl_categories');
        $categories = $builder->get()->getResult();
        return $categories;
    }

    public function getSC($id){
        $builder = $this->db->table('tbl_subcategories');
        $subcategories = $builder->getWhere(['category' == $id])->getResult();
        return $subcategories;
        
    }
    
}