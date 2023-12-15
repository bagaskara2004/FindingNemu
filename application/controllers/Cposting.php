<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cposting extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Mposting');
		$this->load->library('form_validation');
    }

	public function index()
	{
		$data['lokasi'] = "home";
		$this->load->view('Posting/navbar.php',$data);
		$this->load->view('index.php');
		$this->load->view('Posting/footer.php');
	}

	public function detail() {
		$datas['data'] = $this->db->get_where('posting',['id_posting' => $this->input->post("id_posting")])->row_array();
		$datas['pelapor'] = $this->db->get_where('user',['id_user' => $datas['data']['id_user']])->row_array();
		$datas['kategori'] = $this->db->get_where('kategori',['id_kategori' => $datas['data']['id_kategori']])->row_array();
		$datas['user'] = $this->db->get_where('user',['username' => $this->session->userdata('username')])->row_array();
		if ($datas['data']['status'] > 0) {
			$datas['status'] = 'Temuan';
		}else {
			$datas['status'] = 'Kehilangan';
		}
		$data['lokasi'] = "detail";
		$this->load->view('Posting/navbar.php',$data);
		$this->load->view('Posting/detail', $datas);
		$this->load->view('Posting/footer.php');
	}

	public function search() {
		$key = $this->input->post("cari");
		$loc = $this->input->post("lokasi");
		$output = $this->Mposting->searching($key,$loc);
		echo $output;
	}

	public function pengajuan(){
		$data['kategori'] = $this->db->select('*')->from('kategori')->get();
		$data['lokasi'] = "form";
		$this->load->view('Posting/navbar.php',$data);
		$this->load->view('Posting/pengajuan',$data);
		$this->load->view('Posting/footer.php');
	}

	public function addPostingan() {
		$this->form_validation->set_rules('judul','Judul','required|trim|min_length[2]|max_length[20]');
		$this->form_validation->set_rules('judul','Judul','required|trim|min_length[2]|max_length[20]');
		
		
	}
	public function comment() {
		$keyword = $this->input->post('keyword');
		$id_user = $this->input->post('id_user');
		$id_posting = $this->input->post('id_posting');
		$output = $this->Mposting->comment($keyword,$id_user,$id_posting);
		echo $output;
	}
}
