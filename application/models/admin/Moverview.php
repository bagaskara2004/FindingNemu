<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Moverview extends CI_Model
{

    public function get_all_postings()
    {

        $this->db->select('posting.*, kategori.*');
        $this->db->from('posting');
        $this->db->join('kategori', 'posting.id_kategori = kategori.id_kategori', 'left');

        $query = $this->db->get();

        return $query->result_array();
    }
    public function get_data_by_id($id_posting)
    {
        $this->db->select('posting.*, kategori.kategori, user.username');
        $this->db->from('posting');
        $this->db->where('posting.id_posting', $id_posting);
        $this->db->join('kategori', 'posting.id_kategori = kategori.id_kategori', 'left');
        $this->db->join('user', 'posting.id_user = user.id_user', 'left');

        $query = $this->db->get();

        return $query->row_array();
    }
}
