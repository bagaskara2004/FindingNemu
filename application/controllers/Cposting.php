<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cposting extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Mposting');
    }

	public function index()
	{
		$this->load->view('Posting/navbar.php');
		$this->load->view('index.php');
		$this->load->view('Posting/footer.php');
	}

	public function detail() {
		$datas['data'] = $this->db->get_where('posting',['id_posting' => $this->input->post("id_posting")])->row_array();
		$datas['pelapor'] = $this->db->get_where('user',['id_user' => $datas['data']['id_user']])->row_array();
		$datas['kategori'] = $this->db->get_where('kategori',['id_kategori' => $datas['data']['id_kategori']])->row_array();
		if ($datas['data']['status'] > 0) {
			$datas['status'] = 'Temuan';
		}else {
			$datas['status'] = 'Kehilangan';
		}
		$this->load->view('Posting/navbar.php');
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
		$this->load->view('Posting/navbar.php');
		$this->load->view('Posting/pengajuan',$data);
		$this->load->view('Posting/footer.php');
	}
	function simpan()
    {
        $this->Mposting->simpanPosting();
    }

    function hapus($idItem)
    {
        $this->Mposting->hapusPosting($idItem);
    }
}
