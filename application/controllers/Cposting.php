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
		$this->load->view('index.php');
	}

	public function detail() {
		$data["id_posting"] = $this->input->post("id_posting");
		$this->load->view('Home/detail', $data);
	}

	public function search() {
		$key = $this->input->post("cari");
		$loc = $this->input->post("lokasi");
		$output = $this->Mposting->searching($key,$loc);
		echo $output;
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
