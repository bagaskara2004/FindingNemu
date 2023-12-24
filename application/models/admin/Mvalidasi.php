<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mvalidasi extends CI_Model
{

    function tampildata()
    {

        $this->db->select('validasi.*, admin.nama_admin');
        $this->db->from('validasi');
        $this->db->join('admin', 'validasi.id_admin = admin.id_admin', 'left');

        $query = $this->db->get();

        return $query->result();
    }
    public function get_all_data($id_posting)
    {
        $this->db->select('posting.id_posting');
        $this->db->from('posting');
        $this->db->where('posting.id_posting', $id_posting);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function get_all_validasi()
    {

        $this->db->select('posting.*');
        $this->db->from('posting');

        $query = $this->db->get();

        return $query->result_array();
    }

    public function simpan_data($data)
    {

        $this->db->insert('validasi', $data);
    }

    public function get_data_by_id($id_validasi)
    {

        $this->db->where('id_validasi', $id_validasi);
        $query = $this->db->get('validasi');

        return $query->row_array();
    }

    public function update_data($id_validasi, $data)
    {

        $this->db->where('id_validasi', $id_validasi);
        $this->db->update('nama_tabel', $data);
    }
}
