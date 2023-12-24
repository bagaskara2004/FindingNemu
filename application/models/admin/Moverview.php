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
	public function get_kategori()
	{
		$query = $this->db->get('kategori');
		return $query->result();
	}
	function simpanPosting($data)
	{
		$this->db->insert('posting', $data);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Form Berhasil di kirim, Segera konfirmasi ke admin</div>');
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
	function simpandaftar()
	{
		$data = $_POST;
		$KodeProdi = $data['KodeProdi'];
		if ($KodeProdi == "") {
			//simpan
			$this->db->insert('tbprodi', $data);
			$this->session->set_flashdata('pesan', 'Data sudah disimpan...');
			redirect('cprodi/tampil', 'refresh');
		} else {
			//edit	
			$update = array(
				'KodeProdi' => $KodeProdi
			);
			$this->db->where($update);
			$this->db->update('tbprodi', $data);
			$this->session->set_flashdata('pesan', 'Data sudah diedit...');
			redirect('cprodi/tampil', 'refresh');
		}
	}


	function hapusdata($KodeProdi)
	{
		$sql = "delete from tbprodi where KodeProdi='" . $KodeProdi . "'";
		$this->db->query($sql);
		redirect('cprodi/tampil', 'refresh');
	}

	function editdata($KodeProdi)
	{
		$sql = "select * from tbprodi where KodeProdi='" . $KodeProdi . "'";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			$data = $query->row();
			echo "<script>$('#KodeProdi').val('" . $data->KodeProdi . "')</script>";
			echo "<script>$('#NomerProdi').val('" . $data->NomerProdi . "')</script>";
			echo "<script>$('#NamaProdi').val('" . $data->NamaProdi . "')</script>";
			echo "<script>$('#Jenjang').val('" . $data->Jenjang . "')</script>";
			echo "<script>$('#Jurusan').val('" . $data->Jurusan . "')</script>";
			echo "<script>$('#KaProdi').val('" . $data->KaProdi . "')</script>";
			echo "<script>$('#SKProdi').val('" . $data->SKProdi . "')</script>";
			echo "<script>$('#Keterangan').val('" . $data->Keterangan . "')</script>";
		}
	}
}
