<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cauth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'FendingNemu | Login';
			$this->load->view('Authentication/login.php', $data);
		} else {
			$this->_login();
		}
	}
	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['username' => $username])->row_array();
		$admin = $this->db->get_where('admin', ['nama_admin' => $username])->row_array();
		//jika usernya ada
		if ($user) {
			//cek user
			if ($user['verifikasi'] == 1) {
				//cek password
				if ($password == $user['password']) {
					$data = [
						'username' => $user['username']
					];
					$this->session->set_userdata($data);
					redirect(base_url('Cposting'));
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">kata sandi salah!</div>');
					redirect(base_url('Cauth/login'));
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">nama pengguna ini belum diaktifkan</div>');
				redirect(base_url('Cauth/login'));
			}
		} elseif ($admin) {
			if ($password == $admin['password_admin']) {
				$data = [
					'nama_admin' => $admin['nama_admin']
				];
				$this->session->set_userdata($data);
				redirect(base_url('Coverview/tampiltabel'));
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Belum Di Register</div>');
			redirect(base_url('Cauth/login'));
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
			'required' => 'Username harus diisi',
			'is_unique' => 'Username sudah ada'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
			'min_length' => 'Password manimal 3 kata',
			'required' => 'Password Harus diisi'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'required' => 'Email harus diisi',
			'valid_email' => 'Email valid!',
			'is_unique' => 'Email Sudah Ada'
		]);
		$this->form_validation->set_rules('telp', 'Telp', 'required|trim', [
			'required' => 'Telepon harus diisi'
		]);

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'FendingNemu | Registration';
			$this->load->view('Authentication/register.php', $data);
		} else {
			$data = [
				'username' => htmlentities($this->input->post('username', true)),
				'password' => $this->input->post('password'),
				'email' => htmlentities($this->input->post('email', true)),
				'verifikasi' => 1,
				'foto' => 'asset/foto_profile/default.png',
				'tanggal' => date("Y-m-d"),
				'telp' => $this->input->post('telp')
			];
			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! data kamu sudah berhasil.Mohon Login</div>');
			redirect(base_url('Cauth/login'));;
		}
	}
	// sementara, untuk akses admin page
	public function admindashboard()
	{
		$this->load->view('Admin/homepageAdmin.php');
	}
	public function adminoverview()
	{
		$this->load->view('Admin/overview.php');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('Cauth/login'));
	}
}
