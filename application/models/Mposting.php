<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mposting extends CI_Model {

	function simpanPosting()
	{
		$data = $_POST;
		$this->db->insert('item', $data);
		// $this->session->set_flashdata('pesan', 'Data sudah disimpan...');
		redirect('');
	}

	function hapusPosting($id_posting)
	{
		$sql = "delete from posting where id_posting ='" . $id_posting . "'";
		$this->db->query($sql);
		redirect('');
	}

	public function searching($key,$loc)
	{
        if ($key != "") {
            $data = $this->db->select('*')->from('posting')->like('judul', $key)->where('status', $loc)->where('id_konfirmasi',3)->get();
        }else {
            $data = $this->db->select('*')->from('posting')->where('status',$loc)->where('id_konfirmasi',3)->get();
        }
		if ($data->num_rows() > 0 ) {
			foreach ($data->result_array() as $datas) {
				return '
				<div class="card">
					<div class="card-header text-center fw-bold">'.$datas["judul"].'</div>
					<img src="'.$datas["foto"].'" class="card-img-top px-3 pt-3">
					<form action="Cposting/detail" method="post" class="card-body d-flex">
                        <input type="hidden" name="id_posting" value="'.$datas["id_posting"].'">
						<button class="button text-light p-2 w-100 background-yellow fw-bold fs-6 rounded mt-auto border-none" >DETAIL</button>
                    </form>
				</div>';
			}
		}else if ($key != "") {
			return '<div class="text-center text-light fs-7 my-5">"'.$key.'"  tidak ditemukan</div>';
		}else {
			return '<div class="text-center text-light fs-7 my-5">Tidak ada postingan</div>';
		}
	}
}