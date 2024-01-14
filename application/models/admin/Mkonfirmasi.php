<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mkonfirmasi extends CI_Model
{

    public function get_posting($id_konfirmasi)
    {

        $this->db->select('posting.*, kategori.kategori');
        $this->db->from('posting');
        $this->db->join('kategori', 'kategori.id_kategori = posting.id_kategori', 'left');
        $this->db->where('posting.id_konfirmasi', $id_konfirmasi);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function update_konfirmasi($id_posting, $id_konfirmasi)
    {
        $this->db->where('id_posting', $id_posting);
        return $this->db->update('posting', array('id_konfirmasi' => $id_konfirmasi));
    }
}
