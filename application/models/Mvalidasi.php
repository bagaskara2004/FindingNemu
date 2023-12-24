<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mvalidasi extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function save_data($data)
    {
        $this->db->insert('Validasi', $data);
    }
    
}
