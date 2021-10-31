<?php 

namespace App\Models;  
use CodeIgniter\Model;

  
class ProductModel extends Model{

    protected $table = 'tbl_categories';
    protected $primaryKey = 'category_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    
    protected $allowedFields = [
        'category_name'
    ];

    
}