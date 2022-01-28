<?php 

namespace App\Models;  
use CodeIgniter\Model;

  
class RoleModel extends Model{

    protected $table = 'tbl_roles';
    protected $primaryKey = 'role_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    
    protected $allowedFields = [
        'role_name'
    ];

    
}