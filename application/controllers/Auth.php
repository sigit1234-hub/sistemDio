<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// is_logged_in();
		// $this->load->model('Booking_m');
	}

	public function index()
	{
        if($this->session->userdata('id_karyawan')){
            
               $this->session->set_flashdata([
                    'toast_type' => 'success',
                    'toast_message' => 'Anda Sudah Login'
                ]);
                redirect('Home');
        }else {
            
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
			$data['judul'] = 'Login';
			$this->load->view('login/index', $data);
        } else {
            $this->_login();
        }
        }
	}
	 private function _login()
    {
        //mengambil data yang diinput user
        $email = htmlspecialchars($this->input->post('email'));
        $password = htmlspecialchars($this->input->post('password'));
        $user = $this->db->get_where('karyawan	', ['email' => $email])->row_array();
        //jika usernya ada
        if ($user) {
            //jika usernya aktif
            if ($user['is_active'] == 1) {
                //cek password
                // if (password_verify($password, $user['password'])) {
                if ($user['password'] == $password) {
                    $data = [
                        'id_karyawan' => $user['id_karyawan'],
                        'email' => $user['email'],
                    ];
                    $this->session->set_userdata($data);
                    if ($this->session->userdata('link')) {
                        $link = $this->session->userdata('link');
                        $url = explode("/", $link);
                        $juml = count($url);
                        $direct = '';
                        for ($a = 4; $a < $juml; $a++) {
                            $direct .= $url[$a] . "/";
                        }
                        
                        $this->session->unset_userdata('link');
                        redirect($direct);
                    } else {
                            redirect('Home');
                    }
                } else {
                    $this->session->set_flashdata([
                    'toast_type' => 'danger',
                    'toast_message' => 'Password salah!'
                ]);
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata([
                    'toast_type' => 'Warning',
                    'toast_message' => 'Email tidak ada.'
                ]);
                redirect('Auth');
            }
        } else {
           $this->session->set_flashdata([
                    'toast_type' => 'danger',
                    'toast_message' => 'Email tidak ada.'
                ]);
            redirect('Auth');
        }
    }
    public function Logout(){
        
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_karyawan');
        redirect('Auth');
    }
}