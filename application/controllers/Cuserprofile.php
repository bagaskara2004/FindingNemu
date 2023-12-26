<?php
	class Cuserprofile extends CI_Controller
	{
		public function index(): void
		{
			$this->load->view('user/profile.php');
			$this->load->view('Posting/footer.php');
		}
	}
