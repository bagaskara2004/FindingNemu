<?php
	class Cdaftar extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library('form_validation');
		}

		function simpandaftar()
		{		
			$this->form_validation->set_rules('username','Username','required|trim');
			$this->form_validation->set_rules('password','Username','required|trim');
			$this->form_validation->set_rules('username','Username','required|trim');

			if ($this->form_validation->run() == FALSE){
			$this->load->model('mdaftar');
			$this->mdaftar->simpandaftar();
			}else{
			echo 'data berhasil ditambahkan!';
		}
		}
		
	}
?>