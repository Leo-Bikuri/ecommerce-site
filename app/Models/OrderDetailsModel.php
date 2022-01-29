<?php 

namespace App\Models;  
use CodeIgniter\Model;

  
class OrderDetailsModel extends Model{

    protected $table = 'tbl_orderdetails';
    protected $primaryKey = 'orderdetails_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    
    protected $allowedFields = [
        'order_id',
        'product_id',
        'product_price',
        'order_quantity',
        'orderdetails_total'
    ];
}