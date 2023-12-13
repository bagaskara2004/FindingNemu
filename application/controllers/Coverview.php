<?php
	class Coverview extends CI_Controller
	{
		function tampiltabel()
		{
			$data['overviewtable'] = $this->load->view('Admin/overview.php','',true);
			$this->load->view('Admin/homepageAdmin.php', $data);
		}
	}
