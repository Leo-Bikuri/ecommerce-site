<?php 

namespace App\Models;  
use CodeIgniter\Model;

  
class ProductImageModel extends Model{

    protected $table = 'tbl_productimages';
    protected $primaryKey = 'productimages_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    
    protected $allowedFields = [
        'product_image',
        'product_id',
        'created_at',
        'updated_at',
        'added_by'
    ];

    
}