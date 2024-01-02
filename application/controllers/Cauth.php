<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cauth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('encryption');
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
			if ($user['actived'] == 1) {
				//cek password
				if ($password == $this->encryption->decrypt($user['password'])) {
					$data = [
						'username' => $user['username'],
						'foto' => $user['foto'],
						'email' => $user['email'],
						'id_user' => $user['id_user']
					];
					$this->session->set_userdata($data);
					if(!empty($this->input->post('save_id')))
					{
						setcookie("loginID", $username, time()+(10 * 365 * 24 * 60 * 60));
						setcookie("loginPASS", $password, time()+(10 * 365 * 24 * 60 * 60));
					}else{
						setcookie("loginID", "");
						setcookie("loginPASS", "");
					}
					redirect(base_url('Cposting'));
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">kata sandi salah!</div>');
					redirect(base_url('Cauth/login'));
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun belum di actived</div>');
				redirect(base_url('Cauth/login'));
			}
		} elseif ($admin) {
			if ($password == $admin['password_admin']) {
				$data = [
					'id_admin' => $admin['id_admin'],
					'nama_admin' => $admin['nama_admin']
				];
				$this->session->set_userdata($data);
				redirect(base_url('Admin/Cadmin'));
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nama Pengguna tidak ditemukan</div>');
			redirect(base_url('Cauth/login'));
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
			'required' => 'Username harus diisi',
			'is_unique' => 'Username sudah ada'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|max_length[20]', [
			'min_length' => 'Password minimal 3 kata',
			'max_length' => 'Password maximal 20 kata',
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
				'password' => $this->encryption->encrypt($this->input->post('password')),
				'email' => htmlentities($this->input->post('email', true)),
				'actived' => 0,
				'foto' => 'asset/foto_profile/default.png',
				'tanggal' => date("Y-m-d"),
				'telp' => $this->input->post('telp')
			];
			$this->sendMail($data);
		}
	}

	public function sendMail($data)
	{
		$config['useragent'] = 'Codeigniter';
		$config['mailpath'] = "/usr/bin/sendmail";
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "smtp.gmail.com";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = "bagaskaraputra87@gmail.com";
		$config['smtp_pass'] = "frnm jlse bibl kzoy";
		$config['smtp_crypto'] = "ssl";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
		$config['smtp_timeout'] = "10";
		$config['wordwrap'] = TRUE;

		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->from("findingNemu", "FindingNemu");
		$this->email->to($data['email']);
		$this->email->subject("Actived Akun");
		$this->email->message("Klik link berikut untuk <a href='http://localhost/findingNemu/Cauth/actived?email=" . $data["email"] . "'>actived akunmu</a>");

		if ($this->email->send()) {
			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Periksa email sekarang untuk actived akunmu</div>');
			redirect(base_url('Cauth/login'));
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Register Akun</div>');
			redirect(base_url('Cauth/login'));
		}
	}

	public function actived()
	{
		$email = $this->input->get('email');
		$data = array(
			'actived' => 1
		);
		$this->db->where('email', $email);
		$this->db->update('user', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akunmu berhasil di actived, login sekarang</div>');
		redirect(base_url('Cauth/login'));;
	}

	public function lupapassword()
	{	
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email[user.email]', [
			'required' => 'Email harus diisi',
			'valid_email' => 'Email valid!'
		]);
		if($this->form_validation->run()== FALSE){
		$data['title'] = "Lupa Password";
		$this->load->view('Authentication/Lupa_Password.php', $data);
		}else{
		$email = $this->input->post('email');
		$user  =  $this->db->get_where('user',['email' => $email, 'actived' => 1])->row_array();
		if($user){
			// $token = base64_encode(random_bytes(32));
			// $user_token[
			// 	'email' => $email,
			// 	'token'	=> $token,
			// 	'date_created' => time()
			// ];
			// $this->db->insert('user_token', $user_token);
			// $this->sendMail($token, 'lupa');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mohon Cek Email Anda untuk reset Password</div>');
		redirect(base_url('Cauth/lupapassword'));;
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">email tidak terdaftar atau diaktifkan</div>');
		redirect(base_url('Cauth/lupapassword'));;
		}
		}
	}
	
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
