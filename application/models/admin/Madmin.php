<?php
	class Madmin extends CI_Model
	{
		function executeedit($id_admin, $data): void
		{
			$this->db->where('id_admin', $id_admin);
			$this->db->update('admin', $data);
		}
	}
