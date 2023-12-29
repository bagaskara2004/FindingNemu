<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mvalidasi extends CI_Model
{

    function tampildata()
    {

        $this->db->select('validasi.id_posting');
        $this->db->from('validasi');
        $this->db->join('admin', 'validasi.id_admin = admin.id_admin', 'left');

        $query = $this->db->get();

        return $query->result();
    }
    public function simpanData($data)
    {

        $this->db->insert('validasi', $data);
        return $this->db->insert_id();
    }
    function simpanPosting($data)
    {
        $this->db->insert('validasi', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Form Berhasil di kirim, Segera konfirmasi ke admin</div>');
        redirect(base_url('admin/Coverview/detail', $data));
    }
}
