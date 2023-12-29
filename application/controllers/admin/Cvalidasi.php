<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cvalidasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Mvalidasi');
        $this->load->library('form_validation');
    }
    public function index()
    {

        $this->load->view('Admin/navbar');
        $this->load->view('Admin/Validasi');
        $this->load->view('Admin/footer');
    }
    public function validasi()
    {
        $resault = $this->Mvalidasi->tampildata();
        echo json_encode($resault);
    }
    public function add($id_posting)
    {
        $data['data'] = $id_posting;

        $this->load->view('Admin/navbar');
        $this->load->view('Admin/Addvalidasi', $data);
        $this->load->view('Admin/footer');
    }

    public function simpan()
    {


        $config['upload_path']          = './asset/foto_validasi';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 100000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            $foto = $this->upload->data();
            $foto = 'asset/foto_validasi/' . $foto['file_name'];
        } else {
            $name = $this->upload->data()['file_name'];
            if (empty($name)) {
                $foto = 'asset/foto_posting/default.jpg';
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Form gagal di kirim, Pastikan format foto dan size foto sesuai</div>');
                redirect(base_url('admin/Coverview/detsil'));
            }
        }

        $id_admin = $this->session->userdata('id_admin');
        $data = array(
            'id_posting' => $this->input->post('id_postingan'),
            'id_admin' => $id_admin,
            'nama' => $this->input->post('nama'),
            'tanggal' => $this->input->post('tanggal'),
            'telp' => $this->input->post('telp')
        );
        $insertedId = $this->Mvalidasi->simpanData($data);

        if ($insertedId) {
            redirect(base_url('admin/Coverview/detail' . $insertedId));
        } else {
            
        }
    }
}
