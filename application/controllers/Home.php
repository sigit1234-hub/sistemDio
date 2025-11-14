<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		// $this->load->model('Booking_m');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['judul'] = 'Dashboard';
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('home/index', $data);
		$this->load->view('template/footer', $data);
	}
}