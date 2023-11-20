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
	
}
