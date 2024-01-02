<?php
class Cadmin extends CI_Controller
{
    function index()
    {
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
    function validasi()
    {
        
        if ($this->session->userdata('nama_admin') == '') {
            $response = array('status' => 'error', 'message' => 'Silakan login terlebih dahulu.' );
        }else{
            $response = array('status' => 'success');
        }
        echo json_encode($response);
        
    }
}
