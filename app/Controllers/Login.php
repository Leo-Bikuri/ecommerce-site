<?php

namespace App\Controllers;
use App\Models\UserModel;

class Login extends BaseController
{
	protected $seek;
	public function index()
	{
		$this->seek = service('request');
		if($this->request->getMethod() == 'post'){
			$rules = [
				'email' => 'required|min_length[6]|max_length[255]|valid_email',
				'password'=> 'required|min_length[8]|max_length[255]|validateUser[email,password]',
			];

			$errors = [
				'password' =>[
					'validateUser' => 'Email or Password don\'t match'
				]
			];

			if(!$this->validate($rules, $errors)){
				$data = array(
					'validation' => $this->validator,
				);
				return $data;
			}else{
				$model = new UserModel();

				$user = $model->where('email', $this->seek->getVar('email'))
								->first();

				$this->setUserSession($user);

				return "success";
			}
		}else{
			return view('Login/login.php');
		}
	}
	private function setUserSession($user){
		$data = [
			'user_id' =>  $user['user_id'],
			'firstname'=> $user['first_name'],
			'lastname' => $user['last_name'],
			'email'    => $user['email'],
			'isLoggedin'=> true, 
		];
	 
		session()->set($data);
		return true;
	}
	public function logout(){
		session()->destroy();
		
		return redirect()->to('/Home');
	}
  }

?>
