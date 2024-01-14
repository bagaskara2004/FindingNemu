<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cauth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('encryption');
		$this->load->helper('date');
		$this->cekActived();
	}

	public function cekActived(){
		$data = $this->db->select('*')->from('user')->where('actived',0)->get();
		$kadaluarsa = 3;
		foreach ($data->result_array() as $datas) {
			$tanggal = date("d", strtotime($datas['tanggal']));
			$bulan = date("m", strtotime($datas['tanggal']));
			$tahun = date("Y", strtotime($datas['tanggal']));
			$tglHapus = $tanggal + $kadaluarsa;
			$jmlHari = days_in_month($bulan, $tahun);
			if ($tglHapus > $jmlHari) {
				$tglHapus = $tglHapus - $jmlHari;
				if ($bulan == 12) {
					$bulan = 01;
					$tahun += 1;
				}else {
					$bulan +=1;
				}
			}
			if ($tglHapus <= date('d') && $bulan <= date('m') && $tahun <= date('Y')) {
				$this->db->delete('user', array('id_user' => $datas['id_user']));
			}
		}
	}

	public function login()
	{
		if ($this->session->userdata('role') == 'user') {
			redirect(base_url('Cposting'));
		}
		if ($this->session->userdata('role') == 'admin') {
			redirect(base_url('admin/Cadmin'));
		}
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
						'role' => 'user',
						'username' => $user['username'],
						'foto' => $user['foto'],
						'email' => $user['email'],
						'id_user' => $user['id_user'],
						'telp' => $user['telp']
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
					'role' => 'admin',
					'id_admin' => $admin['id_admin'],
					'nama_admin' => $admin['nama_admin'],
					'email_admin' => $admin['email_admin'],
					'foto_admin' => $admin['foto_admin']
				];
				$this->session->set_userdata($data);
				redirect(base_url('Admin/Cadmin'));
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata Sandi Salah</div>');
				redirect(base_url('Cauth/login'));
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nama Pengguna tidak ditemukan</div>');
			redirect(base_url('Cauth/login'));
		}
	}

	public function register()
	{
		if ($this->session->userdata('role') == 'user') {
			redirect(base_url('Cposting'));
		}
		if ($this->session->userdata('role') == 'admin') {
			redirect(base_url('admin/Cadmin'));
		}
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
				'foto' => 'asset/foto_profile/no_profile.jpg',
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

		if (empty($data['kode'])) {
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
		}else {
			$this->email->subject("Lupa Password");
			$this->email->message("Kode :".$data['kode']);

			if ($this->email->send()) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kode telah dikirim ke email</div>');
				$kode =[
					'kode'=>$this->encryption->encrypt($data['kode']),
					'email' => $data['email']
				];
				redirect(base_url('Cauth/changePassword'). '?' . http_build_query($kode));
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal kirim kode, coba lagi</div>');
				redirect(base_url('Cauth/lupapassword'));
			}
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

	public function changePassword() {

		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|max_length[20]', [
			'min_length' => 'Password minimal 3 kata',
			'max_length' => 'Password maximal 20 kata',
			'required' => 'Password Harus diisi'
		]);
		$this->form_validation->set_rules('kode', 'Kode', 'required|trim', [
			'required' => 'kode harus diisi'
		]);

		$data['kode_hash'] = $this->input->get('kode', TRUE);
		$data['email'] = $this->input->get('email', TRUE);
		if ($this->input->post('kode_hash')) {
			$data['kode_hash'] = $this->input->post('kode_hash');
			$data['email'] = $this->input->post('email');
		}

		$user = $this->db->get_where('user', ['email' => $data['email']])->row_array();

		if (!$user) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User tidak ditemukan</div>');
			redirect(base_url('Cauth/lupapassword'));
		}

		if ($this->form_validation->run() == false) {
			$this->load->view('Authentication/change_Password',$data);
		}else {
			$kode_hash = $this->encryption->decrypt($data['kode_hash']);
			$kode = $this->input->post('kode');
			if ($kode_hash == $kode) {
				$datas = array(
					'password'=> $this->encryption->encrypt($this->input->post('password'))
				);
				$this->db->where('email', $data['email']);
				$this->db->update('user', $datas);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">password berhasil diubah</div>');
				redirect(base_url('Cauth/login'));
			}else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kode Tidak Cocok, coba lagi</div>');
				redirect(base_url('Cauth/lupapassword'));
			}
		}
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
			$data = [
				'kode'=> $this->generate_kode(),
				'email'=> $this->input->post('email')
			];
			$this->sendMail($data);
		}
	}
	
	public function generate_kode() {
		$kode ="";
		for ($i=1; $i <= 5; $i++) { 
			$kode .= rand(0, 9);
		}
		return $kode;
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
		$array_items = array('username', 'email','foto','nama_admin');
		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();
		redirect(base_url('Cauth/login'));
	}
}
