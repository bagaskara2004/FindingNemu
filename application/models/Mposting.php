<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mposting extends CI_Model {

	public function search($key,$loc)
	{
        if ($key != "") {
            return $this->db->select('*')->from('item')->like('judul', $key)->where('status', $loc)->where('id_konfirmasi',3)->get();
        }
        return $this->db->select('*')->from('item')->where('status',$loc)->get();
	}
}