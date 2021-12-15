<?php 

namespace App\Models;  
use CodeIgniter\Model;

  
class ProductImageModel extends Model{

    protected $table = 'tbl_product';
    protected $primaryKey = 'product_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    
    protected $allowedFields = [
        'product_image',
        'product_id',
        'created_at',
        'updated_at',
        'added_by'
    ];

    
}