<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\RoleModel;
use App\Models\ApiUser;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;
use ReflectionException;

class Auth extends BaseController
{
    /**
     * Register a new user
     * @return Response
     * @throws ReflectionException
     */
    public function register()

    {
        $rules =[
            'first_name' => 'required',
			'last_name' => 'required',
            "email"=>"required|valid_email|is_unique[tbl_users.email]|min_length[6]",
            "gender"=>"required|in_list[male,female]",
            'password'=> 'required|min_length[8]|max_length[255]',
            'password_confirmation'=> 'matches[password]'
        ];
        $messages = [
            "firstname" => [
                "required"=>"First name is required",
            ],
            "lastname" => [
                "required"=>"Last name is required",
            ],
            "email"=>[
                "required" => "Email required",
                "valid_email" => "Email address is not in format",
                "is_unique" => "The email provided is already in use"
            ],
            "password" => [
                "required" => "A password is required",
                "min_length"=>"Password must be longer than 8 characters"
            ],
            "password_confirmation" => [
                "matches" => 'Your passwords do not match.'
            ],

        ];
        $data = $this->getRequestInput($this->request);
        
        if(!$this->validateRequest($data ,$rules)){
            return $this->getResponse($this->validator->getErrors(), ResponseInterface::HTTP_BAD_REQUEST);
        }else{
            $user = new UserModel();
            $apiuser = new ApiUser();
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $role = new RoleModel();
            $role_id = $role->select('role_id')->where('role_name', 'Api User')->first();
            $data['role'] = $role_id['role_id'];
            $data['username'] = $data['username'] ?? $data['email'];
            $data['key'] = uniqid('styl', true);
            

            $user->insert($data);
            $apiuser->insert($data);

            return  $this->getJWTForUser($data['email'], RESPONSEiNTERFACE::HTTP_CREATED);
        }
         
    }
    /**
     * Authenticate Existing User
     * @return Response
     */

     public function login(){
        $rules = [
            'email' => 'required|min_length[6]|max_length[50]|valid_email',
            'password' => 'required|min_length[8]|max_length[255]|validateUser[email, password]'
        ];

        $errors = [
            'password' => [
                'validateUser' => 'Invalid login credentials provided'
            ]
        ];

        $input = $this->getRequestInput($this->request);
        if (!$this->validateRequest($input, $rules, $errors)) {
            return $this
                ->getResponse($this->validator->getErrors(), ResponseInterface::HTTP_BAD_REQUEST);
        }

        return $this->getJWTForUser($input['email']);
     }

     private function getJWTForUser(
        string $emailAddress,
        int $responseCode = ResponseInterface::HTTP_OK
    )
    {
        try {
            $model = new UserModel();
            $user = $model->findUserByEmailAddress($emailAddress);
            unset($user['password']);

            helper('jwt');

            return $this
                ->getResponse(
                    [
                        'message' => 'User authenticated successfully',
                        'user' => $user,
                        'access_token' => getSignedJWTForUser($emailAddress)
                    ]
                );
        } catch (Exception $exception) {
            return $this
                ->getResponse(
                    [
                        'error' => $exception->getMessage(),
                    ],
                    $responseCode
                );
        }
    }


}