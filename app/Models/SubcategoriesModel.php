<?php 

namespace App\Models;  
use CodeIgniter\Model;

  
class SubcategoriesModel extends Model{

    protected $table = 'tbl_subcategories';
    protected $primaryKey = 'subcategory_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    
    protected $allowedFields = [
        'subcategory_name',
        'category'
    ];

    
}