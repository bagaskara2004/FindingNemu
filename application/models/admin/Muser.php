<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Muser extends CI_Model
{

    public function get_all_user()
    {


        $this->db->from('user');

        $query = $this->db->get();

        return $query->result_array();
    }
}
