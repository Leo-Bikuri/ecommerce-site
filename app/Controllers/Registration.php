<?php

namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
use CodeIgniter\CLI\Console;
use CodeIgniter\HTTP\IncomingRequest;


class Registration extends BaseController
{
	public function index()
	{
		helper(['form']);
		$data = [];
		return view('Registration/registration.php');
	}

	protected $seek;
	public function register(){
		$this->seek = service('request');

		helper(['form']);
		if($this->request->getMethod() == 'post'){
			$rules = [
				'firstname' => 'required|min_length[3]|max_length[255]',
				'lastname' => 'required|min_length[3]|max_length[255]',
				'email' => 'required|min_length[6]|max_length[255]|valid_email|is_unique[tbl_users.email]',
				'password'=> 'required|min_length[8]|max_length[255]',
				'password_confirm'=> 'matches[password]'
			];

			if(!$this->validate($rules)){
				// echo view('Registration/registration.php', [
				// 	'validation' => $this->validator,
				// ]);
				$data = array(
					'validation' => $this->validator,
				);
				return $data;
			}else{
				$model = new UserModel();
				$newData = [
					'first_name' => $this->seek->getVar('firstname'),
					'last_name' => $this->seek->getVar('lastname'),
					'email' => $this->seek->getVar('email'),
					'password'=> password_hash($this->seek->getVar('password'), PASSWORD_DEFAULT),
					'gender'=> $this->seek->getVar('gender'),
					'role'=> 1
				];
				$model->save($newData);
				$session = session();
				$session->set('success', 'Registration Successful');
				return "success";
			}
		}
	}

}


?>