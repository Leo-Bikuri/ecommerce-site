<?php 

namespace App\Models;  
use CodeIgniter\Model;

  
class PaymentTypes extends Model{

    protected $table = 'tbl_paymenttypes';
    protected $primaryKey = 'paymenttype_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';


    
    protected $allowedFields = [
        'paymenttype_name',
        'description'
    ];
}