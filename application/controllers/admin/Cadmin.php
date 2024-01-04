<?php

/**
 * @property Madmin $madmin;
 * @property Mposting $mposting;
 */
class Cadmin extends CI_Controller

{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/madmin');
		$this->load->model('mposting');
		$this->load->helper('form');
	}

    function index()
    {
        if ($this->session->userdata('nama_admin') == '') {
            redirect('Cauth/login', 'refresh');
        }
        $this->load->view('Admin/navbar');
        $this->load->view('Admin/homepageAdmin');
        $this->load->view('Admin/footer');
    }
    public function search()
    {
        $key = $this->input->post("cari");
        $loc = $this->input->post("lokasi");
        $output = $this->mposting->searching($key, $loc);
        echo $output;
    }

	function uploadprofile(): void
	{
		$id_admin = $this->input->post('id_admin');
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
				'foto_admin' => $image
			);
			if (!empty($old_photo)) {
				unlink($old_photo);

			}
			$this->madmin->executeedit($id_admin, $data);
			$this->session->set_flashdata('message', "Foto Profile Berhasil Di Update Silahkan Login Ulang");
			$this->logout();

		}
	}

	function updateusername(): void
	{
		$id_admin = $this->input->post('id_admin');
		$data = array(
			'nama_admin' => $this->input->post('username')
		);
		$this->madmin->executeedit($id_admin, $data);
		$this->session->set_flashdata('message', "Username Berhasil Di Update Silahkan Login Ulang Dengan Username Baru Anda");
		$this->logout();
	}

	function updateemail(): void
	{
		$id_admin = $this->input->post('id_admin');
		$data = array(
			'email_admin' => $this->input->post('email')
		);
		$this->madmin->executeedit($id_admin, $data);
		$this->session->set_flashdata('message', "Email Berhasil Di Update Silahkan Login Ulang");
		$this->logout();
	}

    function logout(): void
	{
        $this->session->sess_destroy();
		$this->load->view('Authentication/login');
    }
}
