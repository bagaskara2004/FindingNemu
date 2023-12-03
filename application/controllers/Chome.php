<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chome extends CI_Controller {

	public function index()
	{
		$this->load->view('index.php');
	}
	public function detail() {
		$data["id_item"] = $this->input->post("id_item");
		$this->load->view('Home/detail', $data);
	}
	public function item() {
		$key = $this->input->post("cari");
		$loc = $this->input->post("lokasi");
		$output = "";
		$this->load->model('Mposting');
		$data = $this->Mposting->search($key,$loc);
		if ($data->num_rows() > 0 ) {
			foreach ($data->result_array() as $datas) {
				$output .= '
				<div class="card">
					<div class="card-header text-center fw-bold">'.$datas["judul"].'</div>
					<img src="'.$datas["foto"].'" class="card-img-top px-3 pt-3">
					<form action="Chome/detail" method="post" class="card-body d-flex">
                        <input type="hidden" name="id_item" value="'.$datas["id_item"].'">
						<button class="button text-light p-2 w-100 background-yellow fw-bold fs-6 rounded mt-auto border-none" >DETAIL</button>
                    </form>
				</div>';
			}
		}else if ($key != "") {
			$output .='<div class="text-center text-light fs-7 my-5">"'.$key.'"  tidak ditemukan</div>';
		}else {
			$output .='<div class="text-center text-light fs-7 my-5">Tidak ada postingan</div>';
		}
			echo $output;
	}
}
