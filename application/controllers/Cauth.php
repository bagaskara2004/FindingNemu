<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cauth extends CI_Controller {

	public function login()
	{
		$this->load->view('Authentication/login.php');
	}
    public function register()
	{
		$this->load->view('Authentication/register.php');
	}

	// sementara, untuk akses admin page
	public function admindashboard(){
		$this->load->view('Admin/homepageAdmin.php');
	}
	
}
