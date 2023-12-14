<?php
	class Mdaftar extends CI_Model
	{			
		function simpandaftar()
		{
			$NamaLengkap=$this->input->post('username');
			$password=md5($this->input->post('password'));
			$Email=$this->input->post('email');
			$Telp=$this->input->post('telp');	
			
			$data=array(
				'username'=>$NamaLengkap,
				'password'=>$password,
				'email'=>$Email,
				'telp'=>$Telp
			);
			
			$this->db->insert('user',$data);
			echo "<script>alert('Data sudah disimpan');</script>";
			redirect('Cauth/login','refresh');
		}	
	}
?>