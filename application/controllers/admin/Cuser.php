<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cuser extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Muser');
		$this->load->helper('form');
        if ($this->session->userdata('nama_admin') == '') {
            redirect('Cauth/login', 'refresh');
        }
    }
    public function index()
    {



        $this->load->view('Admin/navbar');
        $this->load->view('Admin/user');
        $this->load->view('Admin/footer');
    }
    public function user()
    {
        $resault = $this->Muser->tampildata();
        echo json_encode($resault);
    }
    public function delete_user()
    {
        $id_user = $this->input->post('id_user');
        $this->Muser->delete_user($id_user);

        echo json_encode(array('status' => 'success', 'message' => 'Data berhasil dihapus'));
    }
}
