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

				$config['upload_path']          = './asset/foto_profile';
				$config['allowed_types']        = 'jpeg|jpg|png';
				$config['max_size']             = 10000;
				$config['max_width']            = 10000;
				$config['max_height']           = 10000;
				$this->load->library('upload', $config);

				if (! $this->upload->do_upload('userImage')) {
					$this->session->set_flashdata('pesan', "Foto Profile Gagal Di Update/Tidak Memasukan Foto");
					redirect(
						'Cuserprofile/index', 'refresh'
					);
					return;
				} else {
					$image = $this->upload->data();
					$image = 'asset/foto_profile/'. $image['file_name'];
					$data = array(
						'foto' => $image
					);
					$this->session->set_flashdata('pesan', "Foto Profile Berhasil Di Update");
					redirect(
						'Cuserprofile/index', 'refresh'
					);

				}


			$this->Muserprofile->editprofile($id_user, $data);
		}

		function updateusername(): void
		{
			$id_user = $this->input->post('id_user');
			$data = array(
				'username' => $this->input->post('username')
			);
			$this->session->set_flashdata('pesan', "Username Berhasil Di Update");
			$this->Muserprofile->editusername($id_user, $data);
			redirect('Cuserprofile/index', 'refresh');
		}

		function updateemail(): void
		{
			$id_user = $this->input->post('id_user');
			$data = array(
				'email' => $this->input->post('email')
			);
			$this->session->set_flashdata('pesan', "Email Berhasil Di Update");
			$this->Muserprofile->editemail($id_user, $data);
			redirect('Cuserprofile/index', 'refresh');
		}

		function showdata(): void
		{

		}

	}
