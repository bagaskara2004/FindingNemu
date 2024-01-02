<?php
class Cadmin extends CI_Controller
{
    function index()
    {
        if ($this->session->userdata('nama_admin') == '') {
            redirect('Cauth/login', 'refresh');
        }
        $this->load->view('Admin/navbar');
        $this->load->view('Admin/homepageAdmin');
        $this->load->view('Admin/footer');
    }
    public function search()
    {
        $key = $this->input->post("cari");
        $loc = $this->input->post("lokasi");
        $output = $this->Mposting->searching($key, $loc);
        echo $output;
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect('Cauth/login', 'refresh');
    }
}
