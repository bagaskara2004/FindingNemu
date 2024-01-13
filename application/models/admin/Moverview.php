<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Moverview extends CI_Model
{

	function tampildata()
	{

		$this->db->select('posting.*, kategori.kategori');
		$this->db->from('posting');
		$this->db->join('kategori', 'posting.id_kategori = kategori.id_kategori', 'left');

		$query = $this->db->get();

		return $query->result();
	}
	public function getPostingDetail($id_posting)
    {
        $query = $this->db->select('posting.id_posting, 
                                   posting.judul, 
                                   posting.deskripsi, 
                                   posting.foto, 
                                   posting.status, 
                                   kategori.kategori, 
                                   user.foto as foto_user, 
                                   user.username')
                          ->from('posting')
                          ->join('kategori', 'kategori.id_kategori = posting.id_kategori', 'left')
                          ->join('user', 'user.id_user = posting.id_user', 'left')
                          ->where('posting.id_posting', $id_posting)
                          ->get();

        return $query->row_array();
    }
	public function get_kategori()
	{
		$query = $this->db->get('kategori');
		return $query->result();
	}
	function simpanPosting($data)
	{
		$this->db->insert('posting', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Form Berhasil di kirim, Segera konfirmasi ke admin</div>');
		redirect(base_url('admin/Coverview'));
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
	public function simpan_data($data)
	{
		$this->db->insert('posting', $data);
	}
	public function update_posting($id_posting, $data)
	{
		$this->db->where('id_posting', $id_posting);
		$this->db->update('posting', $data);
	}

	public function delete_posting($id_posting)
	{
		
		$this->db->where('id_posting', $id_posting);
		$this->db->delete('posting');
	}
}
