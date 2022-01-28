<?php 

namespace App\Models;  
use CodeIgniter\Model;
use Exception;

  
class UserModel extends Model{

    protected $table = 'tbl_users';
    protected $primaryKey = 'user_id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    
    protected $allowedFields = [
        'first_name',
        'last_name',
        'email',
        'password',
        'gender',
        'role'
    ];

    public function findUserByEmailAddress(string $emailAddress)
    {
        $user = $this
            ->asArray()
            ->where(['email' => $emailAddress])
            ->first();

        if (!$user) 
            throw new Exception('User does not exist for specified email address');

        return $user;
    }
    public function findUserById($id)
    {
        $User = $this
            ->asArray()
            ->where(['user_id' => $id])
            ->first();

        if (!$User){
            throw new Exception('Could not find User for specified ID');
        }else{
            return $User;
        }
    }
    
}