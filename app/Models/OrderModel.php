<?php 

namespace App\Models;  
use CodeIgniter\Model;

  
class OrderModel extends Model{

    protected $table = 'tbl_order';
    protected $primaryKey = 'order_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    
    protected $allowedFields = [
        'customer_id',
        'order_amount',
        'order_status',
        'payment_type'
    ];
}