<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Muser extends CI_Model
{

    function tampildata()
	{

		$this->db->from('user');

		$query = $this->db->get();

		return $query->result();
	}
    public function delete_user($id_user)
	{
		
		$this->db->where('id_user', $id_user);
		$this->db->delete('user');
	}
}
