<?php
	class Muserprofile extends CI_Model
	{
		function editprofile($id_user, $data)
		{
			$this->db->where('id_user', $id_user);
			$this->db->update('user', $data);
		}

		function editusername($id_user, $data)
		{
			$this->db->where('id_user', $id_user);
			$this->db->update('user', $data);
		}

		function editemail($id_user, $data)
		{
			$this->db->where('id_user', $id_user);
			$this->db->update('user', $data);
		}

		function getDataTable($id_user)
		{
			$this->db->select(
				'posting.*, konfirmasi.id_konfirmasi, konfirmasi.info'
			);
			$this->db->from('posting');
			$this->db->join('konfirmasi', 'posting.id_konfirmasi = konfirmasi.id_konfirmasi', 'left');
			$this->db->where('id_user', $id_user);

			$query = $this->db->get();

			return $query->result();
		}
	}
