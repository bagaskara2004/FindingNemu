<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ckonfirmasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('nama_admin') == '') {
			redirect('Cauth/login', 'refresh');
		}
		$this->load->helper('form');
        $this->load->model('admin/Mkonfirmasi');
    }

    public function index() {
       
        $this->load->view('Admin/navbar');
        $this->load->view('Admin/konfirmasi');
        $this->load->view('Admin/footer');
    }

  
    public function get_posting($id_konfirmasi) {
        $data['posting'] = $this->Mkonfirmasi->get_posting($id_konfirmasi);
        echo json_encode($data['posting']);
    }

  
    public function update_konfirmasi() {
        $id_posting = $this->input->post('id_posting');
        $id_konfirmasi = $this->input->post('id_konfirmasi');

        $result = $this->Mkonfirmasi->update_konfirmasi($id_posting, $id_konfirmasi);

        echo json_encode($result);
    }
}
