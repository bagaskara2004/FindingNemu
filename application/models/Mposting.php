<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mposting extends CI_Model {

	function simpanPosting($data)
	{
		$this->db->insert('posting', $data);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Form Berhasil di kirim, Segera konfirmasi ke admin</div>');
		redirect(base_url('Cposting/pengajuan'));
	}

	function hapusPosting($id_posting)
	{
		$sql = "delete from posting where id_posting ='" . $id_posting . "'";
		$this->db->query($sql);
		redirect('');
	}

	public function comment($keyword,$id_user,$id_posting) {
		if ($keyword != "") {
			$input = array(
				'id_user' => $id_user,
				'id_posting' => $id_posting,
				'komentar' => htmlspecialchars($keyword)
			);
			$this->db->insert('comment',$input);
		}
		$data = $this->db->select('*')->from('comment')->where('id_posting',$id_posting)->get();
		$output = "";
		if ($data->num_rows() > 0) {
			foreach ($data->result_array() as $datas) {
				$user = $this->db->get_where('user',['id_user' => $datas['id_user']])->row_array();
				$output .='
				<div class="d-flex fs-7 text-light background-blue3 py-1 align-items-center mb-1 overflow-auto px-2 ">
					<img src="'.base_url($user['foto']).'" style="width:30px;"class="img-fluid me-2 rounded-circle" >
					<div class="border-start px-2"><span class="fw-bold text-center pe-2">'.$user['username'].'</span>'.$datas['komentar'].'</div>
				</div>
				';
			}
		}else {
			$output .= '<div class="fs-7 text-light d-flex align-items-center justify-content-center" style="height:300px;">tidak ada komentar</div>';
		}
		return $output;
	}
	public function searching($key,$loc)
	{
        if ($key != "") {
            $data = $this->db->select('*')->from('posting')->like('judul', $key)->where('status', $loc)->where('id_konfirmasi',3)->get();
        }else {
            $data = $this->db->select('*')->from('posting')->where('status',$loc)->where('id_konfirmasi',3)->get();
        }
		if ($data->num_rows() > 0 ) {
			$output = "";
			foreach ($data->result_array() as $datas) {
				$validasi = $this->db->select('*')->from('validasi')->where('id_posting',$datas["id_posting"])->get();
				$background = "";
				$text = "";
				if ($validasi->num_rows() > 0) {
					$background = "bg-success";
					$text = "text-light";
				}
				$output .= '
				<div class="card '.$background.'">
					<div class="card-header text-center fw-bold '.$text.'">'.$datas["judul"].'</div>
					<img src="'.base_url($datas["foto"]).'" class="card-img-top px-3 pt-3">
					<form action="'.base_url("Cposting/detail").'" method="post" class="card-body d-flex">
                        <input type="hidden" name="id_posting" value="'.$datas["id_posting"].'">
						<button class="button text-light p-2 w-100 background-yellow fw-bold fs-6 rounded mt-auto border-none" >DETAIL</button>
                    </form>
				</div>';
			}
			return $output;
		}else if ($key != "") {
			return '<div class="text-center text-light fs-7 my-5">"'.htmlspecialchars($key).'"  tidak ditemukan</div>';
		}else {
			return '<div class="text-center text-light fs-7 my-5">Tidak ada postingan</div>';
		}
	}
}