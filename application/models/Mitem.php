<?php
class Mitem extends CI_Model
{

	function simpandaftar()
	{
		$data = $_POST;

		$this->db->insert('item', $data);
		// $this->session->set_flashdata('pesan', 'Data sudah disimpan...');
		redirect('');
	}
	function tampildata()
	{
		$sql = "select * from item";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$hasil[] = $row;
			}
		} else {
			$hasil = "";
		}
		return $hasil;
	}
	function hapusdata($idItem)
	{
		$sql = "delete from item where id_item ='" . $idItem . "'";
		$this->db->query($sql);
		redirect('');
	}
}

