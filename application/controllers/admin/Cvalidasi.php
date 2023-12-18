<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cvalidasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mvalidasi');
        $this->load->library('form_validation'); // Add this line
        $this->load->library('upload');
    }
    public function add($id_posting)
    {
        $data['data'] = $id_posting;
        $this->load->view('Addvalidasi', $data);
    }
    // public function simpan_validasi($id_postingan)
    // {
    //     // $data['id_postingan'] = $id_postingan;
    //     // $this->load->view('Validasi', $data);
    //     echo $id_postingan;
    // }


    public function edit($id_validasi)
    {

        $data['validasi'] = $this->Mvalidasi->get_data_by_id($id_validasi);

        $this->load->view('validasi_edit', $data);
    }

    public function simpan()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('telp', 'No Telephone', 'numeric');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        // $this->form_validation->set_rules('foto', 'Foto', 'callback_upload_check');

        if ($this->form_validation->run() == FALSE) {

            // $this->load->view('validasi');
            echo "gagal";
        } else {
            $id_admin = 1;
            $id_postingan = $this->input->post('id_postingan');
            $data = array(
                'id_posting' => $id_postingan,
                'id_admin' => $id_admin,
                'nama' => $this->input->post('nama'),
                'tanggal' => $this->input->post('tanggal'),
                'foto' => $this->upload->data('file_name'),
                'telp' => $this->input->post('telp')
            );

            $this->Mvalidasi->simpan_data($data);


            redirect('Cposting/overview');
        }
    }

    public function upload_check($str)
    {
        $allowed_types = array('jpg', 'jpeg', 'png', 'img');
        $max_size = 50000;


        $config['upload_path'] = './gambar_validasi/';
        $config['allowed_types'] = implode('|', $allowed_types);
        $config['max_size'] = $max_size;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {

            $this->form_validation->set_message('upload_check', $this->upload->display_errors());
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
