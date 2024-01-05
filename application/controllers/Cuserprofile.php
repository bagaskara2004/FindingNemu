<?php
/**
 * @property Muserprofile $muserprofile;
 */
	class Cuserprofile extends CI_Controller
	{

		public function __construct()
		{
			parent::__construct();
			$this->load->model('muserprofile');
			$this->load->library('form_validation');
			$this->load->helper('form');
		}
		public function index(): void
		{
			$id_user = $this->session->userdata('id_user');
			$data['lokasi'] = "profile";
			$title['title'] = "Profile | FindingNemu";
			$showdata['result'] = $this->muserprofile->getDataTable($id_user);
			$this->load->view('Posting/navbar.php', $data);
			$this->load->view('user/profile.php', $title);
			$this->load->view('user/status_table.php', $showdata);
			$this->load->view('Posting/footer.php');
		}

		function uploadprofile(): void
		{
				$id_user = $this->input->post('id_user');
				$old_photo = $this->input->post('old_photo');
				$path = 'asset/foto_profile/';

				$config['upload_path']          = $path;
				$config['allowed_types']        = 'jpeg|jpg|png';
				$config['max_size']             = 10000;
				$config['max_width']            = 10000;
				$config['max_height']           = 10000;
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('userImage')) {
					$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Foto Profile Gagal Di Update/Tidak Memasukan Foto</div>');
				} else {
					$image = $this->upload->data();
					$image = $path.$image['file_name'];
					$data = array(
						'foto' => $image
					);
					if (!empty($old_photo)) {
						unlink($old_photo);

					}
					$this->muserprofile->executeedit($id_user, $data);
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Foto Profile Berhasil Di Update Silahkan Login Ulang</div>');
					$this->logout();

				}
		}

		function updateusername(): void
		{
			$id_user = $this->input->post('id_user');
			$data = array(
				'username' => $this->input->post('username')
			);
			$this->muserprofile->executeedit($id_user, $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Username Berhasil Di Update Silahkan Login Ulang Dengan Username Baru Anda</div>');
			$this->logout();
		}

		function updateemail(): void
		{
			$id_user = $this->input->post('id_user');
			$data = array(
				'email' => $this->input->post('email')
			);
			$this->muserprofile->executeedit($id_user, $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Email Berhasil Di Update Silahkan Login Ulang</div>');
			$this->logout();
		}

		public function logout(): void
		{
			$this->session->sess_destroy();
			$this->load->view('Authentication/login');
		}
	}
