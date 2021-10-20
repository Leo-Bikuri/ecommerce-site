<?php

namespace App\Controllers;

class Admin extends BaseController
{
	public function index()
	{
		echo view('Admin/admin-dashboard');
	}

}

?>
