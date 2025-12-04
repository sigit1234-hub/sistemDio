<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('User_m');
		$this->load->database();
	}

	public function cPagination()
	{
		// Tambahkan config untuk styling pagination agar sesuai template
		$config['full_tag_open'] = '<ul class="pagination justify-content-end mt-5">'; // container pagination
		$config['full_tag_close'] = '</ul>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['attributes'] = ['class' => 'page-link'];
		$this->pagination->initialize($config);
	}
	public function index()
	{
		//pagination
		$config['base_url'] = 'http://localhost/NewSistemDispo/User/index';

		$this->db->where('status', '2');
		$this->db->where('checker', '1');
		$this->db->where('signer', '1');
		$this->db->from('dokumen');
		$config['total_rows'] = $this->db->count_all_results(); // ini untuk menghitung semua pencarian terakhir

		$config['per_page'] = 12;
		$this->pagination->initialize($config);
		//akhir pagination

		$data['total_rows'] = $config['total_rows'];
		$data['start'] = $this->uri->segment(3);
		$data['dataUser'] = $this->User_m->getUser('karyawan', $config['per_page'], $data['start']);

		$this->cPagination();

		$data['title'] = 'User';
		$data['judul'] = 'Users';

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('template/footer', $data);
	}
	public function tambahUser()
	{
		$data['title'] = 'User';
		$data['judul'] = 'Tambah User';

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('template/footer', $data);
	}
	public function simpanData() {}
	public function qrcode()
	{
		$this->load->library('ciqrcode');

		// Folder penyimpanan QR
		$qr_dir = FCPATH . 'assets/qrcode/';

		// Pastikan folder ada
		if (!is_dir($qr_dir)) {
			mkdir($qr_dir, 0777, true);
		}

		// Konfigurasi QR Code
		$config['cacheable'] = true;
		$config['cachedir'] = $qr_dir;
		$config['errorlog'] = $qr_dir;
		$config['imagedir'] = $qr_dir;
		$config['quality'] = true;
		$config['size'] = 1024;
		$config['black'] = [224, 255, 255];
		$config['white'] = [70, 130, 180];

		$this->ciqrcode->initialize($config);

		// Nama file QR
		$image_name = 'Bambang adi saputra.png';

		// Parameter data QR
		$params['data'] = 'Bambang adi saputra';
		$params['level'] = 'H';
		$params['size'] = 10;
		$params['savename'] = $qr_dir . $image_name;

		// Generate QR Code
		$this->ciqrcode->generate($params);

		// Tampilkan ke browser
		echo 'QR Code berhasil dibuat: <br>';
		echo "<img src='" . base_url('assets/qrcode/' . $image_name) . "'>";
	}
}
