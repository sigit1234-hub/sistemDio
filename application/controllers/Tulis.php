<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tulis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Tulis_m');
        $this->load->database();
    }
    public function index()
    {
        $data['title'] = 'Tulis';
        $data['judul'] = 'Tulis';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('tulis/index', $data);
        $this->load->view('template/footer', $data);
    }
    public function notaDinas()
    {
        $data['title'] = 'Tulis';
        $data['judul'] = 'Nota Dinas';
        $data['departemen'] = $this->db->get('departemen')->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('tulis/notaDinas', $data);
        $this->load->view('template/footer', $data);
    }
    public function simpan()
    {
        $penerima = htmlspecialchars($this->input->post('penerima', true));
        $idKaryawan = htmlspecialchars($this->input->post('id_karyawan', true));
        $checker = htmlspecialchars($this->input->post('checker', true));
        $approval = htmlspecialchars($this->input->post('approval', true));
        $perihal = htmlspecialchars($this->input->post('perihal', true));
        $tanggal = htmlspecialchars($this->input->post('tanggal', true));
        $isi = $this->input->post('isi', false);
        $jenis_dok = htmlspecialchars($this->input->post('jenis_dok', true));

        $data = [
            'id_karyawan' => $idKaryawan,
            'tanggal_input' => $tanggal,
            'id_jenis_dokumen' => $jenis_dok,
            'kepada' => $penerima,
            'kode_pengajuan' => '',
            'isi_dokumen' => $isi,
            'lampiran' => '',
            'perihal' => $perihal,
            'checker' => $checker,
            'signer' => $approval,
            'status' => '1',
            'keterangan' => ''
        ];
        $this->db->insert('dokumen', $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata([
                'toast_type' => 'success',
                'toast_message' => 'Data berhasil disimpan.'
            ]);
        } else {
            // Ambil error dari database
            $db_error = $this->db->error();

            // Cek apakah ada pesan error dari DB
            if (!empty($db_error['message'])) {
                $error_message = 'Gagal menyimpan data: ' . $db_error['message'];
            } else {
                $error_message = 'Gagal menyimpan data (tidak diketahui).';
            }

            $this->session->set_flashdata([
                'toast_type' => 'error',
                'toast_message' => $error_message
            ]);
        }
        redirect('Draft');
        // }
    }
}
