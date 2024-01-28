<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Coverview extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('nama_admin') == '') {
			redirect('Cauth/login', 'refresh');
		}
		$this->load->model('admin/Moverview');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}

	public function index()
	{
		$data['kategori'] = $this->Moverview->get_kategori();
		$this->load->view('Admin/navbar');
		$this->load->view('Admin/overview', $data);
		$this->load->view('Admin/footer');
	}

	public function overview()
	{
		$resault = $this->Moverview->tampildata();
		echo json_encode($resault);
	}
	public function simpan_data()
	{

		$config['upload_path']          = './asset/foto_posting';
		$config['allowed_types']        = 'jpeg|jpg|png';
		$config['max_size']             = 100000;
		$config['max_width']            = 10000;
		$config['max_height']           = 10000;
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('foto')) {
			$foto = $this->upload->data();
			$foto = 'asset/foto_posting/' . $foto['file_name'];
		} else {
			$name = $this->upload->data()['file_name'];
			if (empty($name)) {
				$foto = 'asset/foto_posting/default.jpg';
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Form gagal di kirim, Pastikan format foto dan size foto sesuai</div>');
				redirect(base_url('admin/Coverview'));
			}
		}


		$data = array(
			'id_user' => 1,
			'id_kategori' => $this->input->post('kategori'),
			'id_konfirmasi' => 3,
			'status' => $this->input->post('status'),
			'judul' => $this->input->post('judul'),
			'deskripsi' => $this->input->post('deskripsi'),
			'tanggal' => date("Y-m-d"),
			'foto' => $foto
		);

		$this->Moverview->simpanPosting($data);
	}


	public function detail($id_posting)
	{
		$data['data'] = $this->Moverview->getPostingDetail($id_posting);

		$data['status'] = ($data['data']['status'] == 1) ? 'Temuan' : 'Kehilangan';

		$this->load->view('Admin/navbar');
		$this->load->view('Admin/tombol', $data);
		$this->load->view('Admin/detail', $data);
		$this->load->view('Admin/footer');
	}
	public function update_data()
	{
		$id_posting = $this->input->post('id_posting');
		$data = array(
			'judul' => $this->input->post('judul'),
			'id_kategori' => $this->input->post('kategori'),
			'status' => $this->input->post('status'),
			'deskripsi' => $this->input->post('deskripsi')
		);

		if (!empty($_FILES['foto']['name'])) {
			$config['upload_path']          = './asset/foto_posting';
			$config['allowed_types']        = 'jpeg|jpg|png';
			$config['max_size']             = 10000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto')) {
				$data['foto'] = 'asset/foto_posting/' . $this->upload->data('file_name');
			} else {
				echo json_encode(array('status' => 'error', 'message' => $this->upload->display_errors()));
				return;
			}
		}

		$this->Moverview->update_posting($id_posting, $data);

		echo json_encode(array('status' => 'success', 'message' => 'Data berhasil diperbarui'));
	}

	public function delete_data()
	{
		$id_posting = $this->input->post('id_posting');
		$this->Moverview->delete_posting($id_posting);

		echo json_encode(array('status' => 'success', 'message' => 'Data berhasil dihapus'));
	}
}
