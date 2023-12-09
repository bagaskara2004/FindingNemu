<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cvalidasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mvalidasi');
        $this->load->library('form_validation');
    }

    public function simpan()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('telp', 'No Telephone', 'numeric');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('foto', 'Foto', 'callback_validate_file');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('jika_gagal');
        } else {

            $data = array(
                'nama' => $this->input->post('nama'),
                'telp' => $this->input->post('telp'),
                'tanggal' => $this->input->post('tanggal'),
                'id_admin' => $this->session->userdata('id_admin'),
                'id_postingan' => $this->session->userdata('id_postingan'),
            );

            $this->Mvalidasi->save_data($data);
            redirect('berhasil');
        }
    }

    // Castem falidaasi file di sini
    public function validate_file($file)
    {
        $file_extension = pathinfo($file, PATHINFO_EXTENSION);
        $allowed_extensions = array('jpg', 'jpeg', 'png');

        if (!in_array($file_extension, $allowed_extensions)) {
            $this->form_validation->set_message('validate_file', 'File harus berupa JPG, JPEG, atau PNG.');
            return FALSE;
        }

        $file_size_kb = filesize($file) / 1024;

        $max_size_kb = 51200;

        if ($file_size_kb > $max_size_kb) {
            $this->form_validation->set_message('validate_file', 'Ukuran file maksimum adalah 50 MB.');
            return FALSE;
        }

        return TRUE;
    }
}
