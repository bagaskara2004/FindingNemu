<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Coverview extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin/Moverview');
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

		$id_user = $this->db->get_where('admin', ['nama_admin' => $this->session->userdata('nama_admin')])->row_array();
		$data = array(
			'id_user' => $id_user['id_admin'],
			'id_kategori' => $this->input->post('kategori'),
			'id_konfirmasi' => 1,
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
		$datas['data'] = $this->db->get_where('posting', ['id_posting' => $id_posting])->row_array();
		$datas['pelapor'] = $this->db->get_where('user', ['id_user' => $datas['data']['id_user']])->row_array();
		$datas['kategori'] = $this->db->get_where('kategori', ['id_kategori' => $datas['data']['id_kategori']])->row_array();
		$datas['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		if ($datas['data']['status'] > 0) {
			$datas['status'] = 'Temuan';
		} else {
			$datas['status'] = 'Kehilangan';
		}

		$this->load->view('Admin/navbar');
		$this->load->view('posting/detail', $datas);
		$this->load->view('Admin/tombol');
		$this->load->view('Admin/footer');
	}
	public function pengajuan()
	{
		$data['kategori'] = $this->db->select('*')->from('kategori')->get();

		$this->load->view('Admin/navbar');
		$this->load->view('Posting/pengajuan', $data);
		$this->load->view('Admin/footer');
	}
	function tampil()
	{
		$data['hasil'] = $this->Moverview->tampildata();
		$this->load->view('Admin/navbar');
		$this->load->view('Admin/overview', $data, TRUE);
		$this->load->view('Admin/footer');
	}
	function simpanprodi()
	{
		$this->Moverview->simpandaftar();
	}
	function hapusdata($KodeProdi)
	{
		$this->Moverview->hapusdata($KodeProdi);
	}
	function editdata($KodeProdi)
	{
		$this->Moverview->editdata($KodeProdi);
	}
}
