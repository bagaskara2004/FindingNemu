<?php
class Cadmin extends CI_Controller
{
    function index()
    {
        $this->load->view('Admin/navbar');
        $this->load->view('Admin/homepageAdmin.php');
        $this->load->view('Admin/footer');
    }
}
