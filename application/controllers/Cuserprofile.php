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
					$this->session->set_flashdata('pesan', "Foto Profile Gagal Di Update/Tidak Memasukan Foto");
				} else {
					$image = $this->upload->data();
					$image = $path.$image['file_name'];
					$data = array(
						'foto' => $image
					);
					unlink($old_photo);
					$this->muserprofile->editprofile($id_user, $data);
					$this->session->set_flashdata('message', "Foto Profile Berhasil Di Update Silahkan Login Ulang");
					$this->logout();

				}
		}

		function updateusername(): void
		{
			$id_user = $this->input->post('id_user');
			$data = array(
				'username' => $this->input->post('username')
			);
			$this->muserprofile->editusername($id_user, $data);
			$this->session->set_flashdata('message', "Username Berhasil Di Update Silahkan Login Ulang Dengan Username Baru Anda");
			$this->logout();
		}

		function updateemail(): void
		{
			$id_user = $this->input->post('id_user');
			$data = array(
				'email' => $this->input->post('email')
			);
			$this->muserprofile->editemail($id_user, $data);
			$this->session->set_flashdata('message', "Email Berhasil Di Update Silahkan Login Ulang");
			$this->logout();
		}

		public function logout()
		{
			$this->session->sess_destroy();
			$this->load->view('Authentication/login');
		}
	}
