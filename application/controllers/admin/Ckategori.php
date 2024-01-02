<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ckategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('nama_admin') == '') {
			redirect('Cauth/login', 'refresh');
		}
        $this->load->model('admin/Mkategori');
		$this->load->helper('form');
    }
    public function index()
    {
        $this->load->view('Admin/navbar');
        $this->load->view('Admin/kategori');
        $this->load->view('Admin/footer');
    }

    public function get_kategori()
    {
        $kategori = $this->Mkategori->get_kategori();
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
    public function tambah_kategori()
    {
        $kategori = $this->input->post('kategori');
        $this->Mkategori->tambah_kategori($kategori);

        $kategoriData = $this->Mkategori->get_kategori();
        echo json_encode($kategoriData);
    }
}
