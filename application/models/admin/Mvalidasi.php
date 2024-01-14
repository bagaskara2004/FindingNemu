<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mvalidasi extends CI_Model
{

    function tampildata()
    {

        $this->db->select(
            'validasi.*,admin.*'
        );
        $this->db->from('validasi');
        $this->db->join('admin', 'validasi.id_admin = admin.id_admin', 'left');

        $query = $this->db->get();

        return $query->result();
    }

    public function simpan_data($data)
    {
        $this->db->insert('validasi', $data);
    }
    public function update_validasi($id_validasi, $data)
    {
        $this->db->where('id_validasi', $id_validasi);
        $this->db->update('validasi', $data);
    }

    public function delete_posting($id_validasi)
    {

        $this->db->where('id_validasi', $id_validasi);
        $this->db->delete('validasi');
    }
    public function getDetail($id_validasi)
    {
        $this->db->select('validasi.*, admin.nama_admin, admin.foto_admin, posting.judul');
        $this->db->from('validasi');
        $this->db->join('admin', 'validasi.id_admin = admin.id_admin', 'left');
        $this->db->join('posting', 'validasi.id_posting = posting.id_posting', 'left');
        $this->db->where('validasi.id_validasi', $id_validasi);
        $query = $this->db->get();
        return $query->row_array();
    }
}
