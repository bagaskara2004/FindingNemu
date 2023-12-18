<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Coverview extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin/Moverview');
	}

	public function overview()
	{

		$data['postings'] = $this->Moverview->get_all_postings();

		$this->load->view('Admin/navbar');
		$this->load->view('Admin/overview', $data);
		$this->load->view('Admin/footer');
	}
	public function detail($id_posting)
	{

		$data['data'] = $this->Moverview->get_data_by_id($id_posting);

		$this->load->view('detail', $data);
	}

	public function detaill()
	{
		$datas['data'] = $this->db->get_where('posting', ['id_posting' => $this->input->post("id_posting")])->row_array();
		$datas['pelapor'] = $this->db->get_where('user', ['id_user' => $datas['data']['id_user']])->row_array();
		$datas['kategori'] = $this->db->get_where('kategori', ['id_kategori' => $datas['data']['id_kategori']])->row_array();
		if ($datas['data']['status'] > 0) {
			$datas['status'] = 'Temuan';
		} else {
			$datas['status'] = 'Kehilangan';
		}
		$this->load->view('Posting/navbar.php');
		$this->load->view('Posting/detail', $datas);
		$this->load->view('Posting/footer.php');
	}
}
