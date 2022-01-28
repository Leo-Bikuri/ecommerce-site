<?php

namespace App\Controllers\API;

use App\Models\UserModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class User extends BaseController
{
    /**
     * Get all Users
     * @return Response
     */
    public function index()
    {
        $model = new UserModel();
        return $this->getResponse(
            [
                'message' => 'Users retrieved successfully',
                'Users' => $model->findAll()
            ]
        );
    }

    /**
     * Create a new User
     */
    public function create()
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
            "first_name" => [
                "required"=>"First name is required",
            ],
            "last_name" => [
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

        $input = $this->getRequestInput($this->request);

        if (!$this->validateRequest($input, $rules)) {
            return $this->getResponse($this->validator->getErrors(), ResponseInterface::HTTP_BAD_REQUEST);
        }

        $UserEmail = $input['email'];

        $model = new UserModel();
        $model->save($input);
        

        $User = $model->where('email', $UserEmail)->first();

        return $this->getResponse(
            [
                'message' => 'User added successfully',
                'User' => $User
            ]
        );
    }

    /**
     * Get a single User by ID
     */
    public function show($id)
    {
        try {

            $model = new UserModel();
            $User = $model->findUserById($id);

            return $this->getResponse(
                [
                    'message' => 'User retrieved successfully',
                    'User' => $User
                ]
            );

        } catch (Exception $e) {
            return $this->getResponse(
                [
                    'message' => 'Could not find User for specified ID'
                ],
                ResponseInterface::HTTP_NOT_FOUND
            );
        }
    }
}
