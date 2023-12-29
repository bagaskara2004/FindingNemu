<?php
	class Muserprofile extends CI_Model
	{
		function editprofile($id_user, $data): void
		{
			$this->db->where('id_user', $id_user);
			$this->db->update('user', $data);
		}

		function editusername($id_user, $data): void
		{
			$this->db->where('id_user', $id_user);
			$this->db->update('user', $data);
		}

		function editemail($id_user, $data): void
		{
			$this->db->where('id_user', $id_user);
			$this->db->update('user', $data);
		}

	}
