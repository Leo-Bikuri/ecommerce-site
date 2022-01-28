<?php 

namespace App\Models;  
use CodeIgniter\Model;

  
class ApiUser extends Model{

    protected $table = 'tbl_apiusers';
    protected $primaryKey = 'apiuser_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_on';
    
    protected $allowedFields = [
        'username',
        'key'
    ];
}