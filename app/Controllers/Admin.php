<?php

namespace App\Controllers;

class Admin extends BaseController
{
	public function index()
	{
		echo view('Admin/sidebar.php');
		echo view('Admin/admin-dashboard');
	}
	public function additem(){
		echo view('Admin/sidebar.php');
		echo view('Admin/additem.php');
	}

}

?>
