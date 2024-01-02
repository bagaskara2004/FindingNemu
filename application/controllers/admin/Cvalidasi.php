<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cvalidasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('nama_admin') == '') {
            redirect('Cauth/login', 'refresh');
        }
        $this->load->model('Admin/Mvalidasi');
        $this->load->library('form_validation');
        $this->load->helper('form');
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

    public function simpan()
    {
        $id_admin = $this->session->userdata('id_admin');
        $data = array(
            'id_posting' => $this->input->post('id_posting'),
            'id_admin' => $this->session->userdata('id_admin'),
            'nama' => $this->input->post('nama'),
            'tanggal' => $this->input->post('tanggal'),
            'telp' => $this->input->post('telp')
        );

        $config['upload_path'] = './asset/foto_validasi';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = 100000;
        $config['max_width'] = 10000;
        $config['max_height'] = 10000;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {

            $data['foto'] = 'asset/foto_validasi/' . $this->upload->data('file_name');
            $this->Mvalidasi->simpan_data($data);
            $response = array('status' => 'success', 'message' => 'Data berhasil disimpan.');
        } else {

            $response = array('status' => 'error', 'message' => $this->upload->display_errors());
        }

        echo json_encode($response);
    }

    public function update_data()
    {
        $id_validasi = $this->input->post('id_validasi_edit');
        $data = array(
            'id_admin' => $this->session->userdata('id_admin'),
            'nama' => $this->input->post('nama'),
            'tanggal' => $this->input->post('tanggal'),
            'telp' => $this->input->post('telp')
        );

        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path'] = './asset/foto_validasi';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = 100000;
            $config['max_width'] = 10000;
            $config['max_height'] = 10000;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $data['foto'] = 'asset/foto_validasi/' . $this->upload->data('file_name');
            } else {
                $result = array('status' => 'error', 'message' => $this->upload->display_errors());
                echo json_encode($result);
                return;
            }
        }

        $this->Mvalidasi->update_validasi($id_validasi, $data);

        $result = array('status' => 'success', 'message' => 'Data berhasil diperbarui.');

        echo json_encode($result);
    }
    public function delete_data()
    {
        $id_validasi = $this->input->post('id_validasi');
        $this->Mvalidasi->delete_posting($id_validasi);

        echo json_encode(array('status' => 'success', 'message' => 'Data berhasil dihapus'));
    }
}
