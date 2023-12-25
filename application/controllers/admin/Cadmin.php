<?php
class Cadmin extends CI_Controller
{
    function index()
    {
        $this->load->view('Admin/navbar');
        $this->load->view('Admin/homepageAdmin');
        $this->load->view('Admin/footer');
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect('Chalaman/view', 'refresh');
    }
}
