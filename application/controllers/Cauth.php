<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cauth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function login()
	{	
		$this->form_validation->set_rules('username','Username','required|trim');
		$this->form_validation->set_rules('password','Password','required|trim');
		if ($this->form_validation->run() == FALSE) {
		$data['title'] = 'FendingNemu | Login';
		$this->load->view('Authentication/login.php',$data);
		}else{
		$this->_login();
		}
		
	}
	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user',['username'=> $username])->row_array();
		
		//jika usernya ada
		if($user){
		//cek user
			if($user['verifikasi']== 1){
				//cek password
				if($password == $user['password']){
					$data = [
						'username' => $user['username']
					];
					$this->session->set_userdata($data);
					redirect('user');
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">kata sandi salah!</div>');
				redirect('Cauth/login');
				}

			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">nama pengguna ini belum diaktifkan</div>');
				redirect('Cauth/login');
			}
		
		}else{
		$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Data Belum Di Register</div>');
		redirect('Cauth/login');
		}
	}

    public function register()
	{
		$this->form_validation->set_rules('username','Username','required|trim',[
			'required' => 'Username harus diisi'
		]);
		$this->form_validation->set_rules('password','Password','required|trim|min_length[3]',[
			'min_length' => 'Password manimal 3 kata',
			'required' => 'Password Haru diisi'
		]);
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]',[
			'required' => 'Email harus diisi',
			'valid_email' => 'Email valid!',
			'is_unique' => 'Email Sudah Ada'
		]);
		$this->form_validation->set_rules('telp','Telp','required|trim',[
			'required' => 'Telepon harus diisi'
		]);
		
		if ($this->form_validation->run() == FALSE){
		$data['title'] = 'FendingNemu | Registration';
		$this->load->view('Authentication/register.php',$data);
		}else{
			$data =[
				'username' =>htmlentities($this->input->post('username',true)),
				'password' => $this->input->post('password'),
				'email' => htmlentities($this->input->post('email',true)),
				'verifikasi' => 1,
				'foto' => 'default.jpg',
				'tanggal' => date(),
				'telp' => $this->input->post('telp')
			];
			$this->db->insert('user',$data);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Selamat! data kamu sudah berhasil.Mohon Login</div>');
			redirect('Cauth/login');
		}
	}
}
