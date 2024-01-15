<?php

/**
 * @property Madmin $madmin;
 * @property Mposting $mposting;
 */

use Mpdf\Mpdf;

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
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akses Ditolak, Silahkan Login Ulang</div>');
			redirect('Cauth/login', 'refresh');
		}
		$this->load->view('Admin/navbar');
		$this->load->view('Admin/homepageAdmin');
		$this->load->view('Admin/footer');
	}
	function admin()
	{
		if ($this->session->userdata('nama_admin') == '') {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akses Ditolak, Silahkan Login Ulang</div>');
			redirect('Cauth/login', 'refresh');
		}

		$this->load->view('Admin/navbar');
		$this->load->view('Admin/admin');
		$this->load->view('Admin/footer');
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
			$image = $path . $image['file_name'];
			$data = array(
				'foto_admin' => $image
			);
			if (file_exists($old_photo)) {
				unlink($old_photo);
			}
			$this->madmin->executeedit($id_admin, $data);
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Foto Profile Berhasil di Update, Silahkan Login Ulang</div>');
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
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Berhasil di Update, Silahkan Login Ulang</div>');
		$this->logout();
	}

	function updateemail(): void
	{
		$id_admin = $this->input->post('id_admin');
		$data = array(
			'email_admin' => $this->input->post('email')
		);
		$this->madmin->executeedit($id_admin, $data);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Berhasil di Update, Silahkan Login Ulang</div>');
		$this->logout();
	}

	function logout(): void
	{
		$this->session->sess_destroy();
		$this->load->view('Authentication/login');
	}
	public function getPostAndValidationStatistics()
	{
		$this->load->model('Madmin');
		$data['data'] = $this->Madmin->getPostAndValidationStatistics();
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
	function cetakpdf()
	{
		$data['total_posting'] = $this->madmin->getTotalPosting();
		$data['kategori_stats'] = $this->madmin->getKategoriStats();
		$data['total_validasi'] = $this->madmin->getTotalValidasi();
		$data['total_user'] = $this->madmin->getTotalUser();
		$data['all_postings'] = $this->madmin->getPosting();

		require_once(APPPATH . 'libraries/dompdf/autoload.inc.php');
		$pdf = new Dompdf\Dompdf();
		$pdf->setPaper('A4', 'potrait');
		$pdf->set_option('isRemoteEnabled', TRUE);
		$pdf->set_option('isHtml5ParserEnabled', true);
		$pdf->set_option('isPhpEnabled', true);
		$pdf->set_option('isFontSubsettingEnabled', true);

		$pdf->loadHtml($this->load->view('admin/cetak_pdf', $data, true));
		$pdf->render();
		$pdf->stream('NamaFile', ['Attachment' => false]);
	}
	public function viewAdmin()
	{
		$data['admins'] = $this->madmin->getAllAdmins();
		echo json_encode($data['admins']);
	}
	public function delete_data()
	{
		$id_admin = $this->input->post('id_admin');
		$result = $this->madmin->deleteAdmin($id_admin);
		echo json_encode($result);
	}
	public function simpan_data()
	{
		$config['upload_path'] = './asset/foto_admin';
		$config['allowed_types'] = 'jpeg|jpg|png';
		$config['max_size'] = 100000;
		$config['max_width'] = 10000;
		$config['max_height'] = 10000;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('foto_admin')) {
			$foto_admin = $this->upload->data();
			$foto_admin = 'asset/foto_admin/' . $foto_admin['file_name'];
		} else {
			$name = $this->upload->data()['file_name'];
			if (empty($name)) {
				$foto_admin = 'asset/foto_admin/default.jpg';
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Form gagal di kirim, Pastikan format foto dan size foto sesuai</div>');
				redirect(base_url('admin/Cadmin'));
			}
		}

		$data = array(
			'nama_admin' => $this->input->post('nama_admin'),
			'password_admin' => $this->input->post('password_admin'),
			'email_admin' => $this->input->post('email_admin'),
			'foto_admin' => $foto_admin
		);

		$this->madmin->simpanAdmin($data);
		echo json_encode(array('status' => 'success', 'message' => 'Admin berhasil ditambahkan.'));
	}
	public function getUserStatistics() {
        $userData = $this->madmin->getUserStatistics();

       
        header('Content-Type: application/json');
        echo json_encode(['userData' => $userData]);
    }
}
