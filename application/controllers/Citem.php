<?php
class Citem extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mitem');
    }
    function tampil()
    {
        $tampildata['hasil'] = $this->Mitem->tampildata();
        // $data['konten'] = $this->load->view('prodi', '', TRUE);
        // $data['table'] = $this->load->view('prodi_table', $tampildata, TRUE);
        // $this->load->view('halaman_admin', $data);
    }
    function simpanprodi()
    {
        $this->Mitem->simpandaftar();
    }
    function hapusdata($idItem)
    {
        $this->Mitem->hapusdata($idItem);
    }
}