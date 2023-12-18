<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cuser extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Muser');
    }
    public function index()
    {

        $data['user'] = $this->Muser->get_all_user();

        $this->load->view('Admin/navbar');
        $this->load->view('Admin/user', $data);
        $this->load->view('Admin/footer');
    }
}
