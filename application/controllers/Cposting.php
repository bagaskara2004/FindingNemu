<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cposting extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mposting');
		$this->load->library('form_validation');
		$this->load->helper('date');
		$this->cekKonfirmasi();
	}

	public function cekKonfirmasi(){
		for ($i=1; $i <= 3; $i++) { 
			$data = $this->db->select('*')->from('posting')->where('id_konfirmasi',$i)->get();
			if ($i == 1) {
				$kadaluarsa = 3;
			}else {
				$kadaluarsa = 90;
			}
			foreach ($data->result_array() as $datas) {
				$tanggal = date("d", strtotime($datas['tanggal']));
				$bulan = date("m", strtotime($datas['tanggal']));
				$tahun = date("Y", strtotime($datas['tanggal']));
				$tglHapus = $tanggal + $kadaluarsa;
				$jmlHari = days_in_month($bulan, $tahun);
				if ($tglHapus > $jmlHari) {
					$tglHapus = $tglHapus - $jmlHari;
					if ($bulan == 12) {
						$bulan = 01;
						$tahun += 1;
					}else {
						$bulan +=1;
					}
				}
				if ($tglHapus <= date('d') && $bulan <= date('m') && $tahun <= date('Y')) {
					$this->db->delete('posting', array('id_posting' => $datas['id_posting']));
				}
			}
		}
	}

	public function index()
	{
		$data['lokasi'] = "home";
		$this->load->view('Posting/navbar.php', $data);
		$this->load->view('index.php');
		$this->load->view('Posting/footer.php');
	}

	public function detail()
	{
		$datas['data'] = $this->db->get_where('posting', ['id_posting' => $this->input->post("id_posting")])->row_array();
		$datas['pelapor'] = $this->db->get_where('user', ['id_user' => $datas['data']['id_user']])->row_array();
		$datas['kategori'] = $this->db->get_where('kategori', ['id_kategori' => $datas['data']['id_kategori']])->row_array();
		$datas['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		if ($datas['data']['status'] > 0) {
			$datas['status'] = 'Temuan';
		} else {
			$datas['status'] = 'Kehilangan';
		}
		$data['lokasi'] = "detail";
		$this->load->view('Posting/navbar.php', $data);
		$this->load->view('Posting/detail', $datas);
		$this->load->view('Posting/footer.php');
	}

	public function search()
	{
		$key = $this->input->post("cari");
		$loc = $this->input->post("lokasi");
		$output = $this->Mposting->searching($key, $loc);
		echo $output;
	}

	public function pengajuan()
	{
		if (!$this->session->userdata('username')) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tidak bisa mengakses halaman pengajuan</div>');
			redirect(base_url('Cauth/login'));
		}
		$data['kategori'] = $this->db->select('*')->from('kategori')->get();
		$data['lokasi'] = "form";
		$this->load->view('Posting/navbar.php', $data);
		$this->load->view('Posting/pengajuan', $data);
		$this->load->view('Posting/footer.php');
	}

	public function addPostingan()
	{
		$this->form_validation->set_rules('judul', 'Judul', 'required|trim|min_length[2]|max_length[20]');
		if ($this->form_validation->run()) {
			$config['upload_path']          = './asset/foto_posting';
			$config['allowed_types']        = 'jpeg|jpg|png';
			$config['max_size']             = 10000;
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
					redirect(base_url('Cposting/pengajuan'));
				}
			}

			$id_user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
			$data = array(
				'id_user' => $id_user['id_user'],
				'id_kategori' => $this->input->post('kategori'),
				'id_konfirmasi' => 1,
				'status' => $this->input->post('status'),
				'judul' => $this->input->post('judul'),
				'deskripsi' => $this->input->post('deskripsi'),
				'tanggal' => date("Y-m-d"),
				'foto' => $foto
			);
			$this->Mposting->simpanPosting($data);
		} else {
			$this->pengajuan();
		}
	}
	public function comment()
	{
		$keyword = $this->input->post('keyword');
		$id_user = $this->input->post('id_user');
		$id_posting = $this->input->post('id_posting');
		$output = $this->Mposting->comment($keyword, $id_user, $id_posting);
		echo $output;
	}
	public function prosedur()
	{
		if (!$this->session->userdata('username')) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tidak bisa mengakses halaman prosedur</div>');
			redirect(base_url('Cauth/login'));
		}
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "Prosedur_FindingNemu.pdf";
		$this->pdf->load_view('Posting/prosedur');
	}
}
