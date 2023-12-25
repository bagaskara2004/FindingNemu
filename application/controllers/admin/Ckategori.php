<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ckategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Mkategori');
    }
    public function index()
    {
        $this->load->view('Admin/navbar');
        $this->load->view('Admin/kategori');
        $this->load->view('Admin/footer');
    }

    public function get_kategori()
    {
        $kategori = $this->Mkategori->get_all_kategori();
        $data = array();

        foreach ($kategori as $k) {
            $jumlah = $this->Mkategori->get_jumlah_kategori($k->id_kategori);
            $data[] = array(
                'kategori' => $k->kategori,
                'jumlah' => $jumlah
            );
        }

        echo json_encode($data);
    }
}
