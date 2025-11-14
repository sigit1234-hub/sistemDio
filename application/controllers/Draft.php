<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Draft extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model("Tulis_m");
		$this->load->database();
	}
	public function cPagination()
	{
		// Tambahkan config untuk styling pagination agar sesuai template
		$config["full_tag_open"] =
			'<ul class="pagination justify-content-end mt-5">'; // container pagination
		$config["full_tag_close"] = "</ul>";

		$config["num_tag_open"] = '<li class="page-item">';
		$config["num_tag_close"] = "</li>";

		$config["cur_tag_open"] =
			'<li class="page-item active"><a class="page-link" href="#">';
		$config["cur_tag_close"] = "</a></li>";

		$config["next_tag_open"] = '<li class="page-item">';
		$config["next_tag_close"] = "</li>";

		$config["prev_tag_open"] = '<li class="page-item">';
		$config["prev_tag_close"] = "</li>";

		$config["first_tag_open"] = '<li class="page-item">';
		$config["first_tag_close"] = "</li>";

		$config["last_tag_open"] = '<li class="page-item">';
		$config["last_tag_close"] = "</li>";

		$config["attributes"] = ["class" => "page-link"];
		$this->pagination->initialize($config);
	}
	public function index()
	{
		//pagination
		$config["base_url"] = "http://localhost/NewSistemDispo/Draft/index";

		// $this->db->like('', $data['keyword']);
		// $this->db->or_like('email', $data['keyword']);
		// $this->db->or_like('alamat', $data['keyword']);
		// $this->db->or_like('role_id', $data['keyword']);
		// $this->db->or_like('tlp', $data['keyword']);
		$this->db->from("dokumen");
		$config["total_rows"] = $this->db->count_all_results(); // ini untuk menghitung semua pencarian terakhir

		$config["per_page"] = 12;
		$this->pagination->initialize($config);
		//akhir pagination

		$data["total_rows"] = $config["total_rows"];
		$data["start"] = $this->uri->segment(3);
		$data["dataDok"] = $this->Tulis_m->dataDraft(
			"dokumen",
			$config["per_page"],
			$data["start"],
		);

		$this->cPagination();

		$data["title"] = "Draft";
		$data["judul"] = "Draft";
		// $data['dataDok'] = $this->Tulis_m->dataDraft();
		$this->load->view("template/header", $data);
		$this->load->view("template/sidebar", $data);
		$this->load->view("Draft/index", $data);
		$this->load->view("template/footer", $data);
	}
	public function pengajuan()
	{
		//pagination
		$this->db->where("status", "2");
		$this->db->from("dokumen");
		$config["total_rows"] = $this->db->count_all_results(); // ini untuk menghitung semua pencarian terakhir

		$config["base_url"] = "http://localhost/NewSistemDispo/Draft/Pengajuan";

		$config["per_page"] = 12;
		$this->pagination->initialize($config);
		//akhir pagination

		$data["total_rows"] = $config["total_rows"];
		$data["start"] = $this->uri->segment(3);
		$data["dataDok"] = $this->Tulis_m->dataPengajuan(
			"dokumen",
			$config["per_page"],
			$data["start"],
		);

		$this->cPagination();

		$data["title"] = "Draft";
		$data["judul"] = "Dalam Pengajuan";
		$this->load->view("template/header", $data);
		$this->load->view("template/sidebar", $data);
		$this->load->view("Draft/pengajuan", $data);
		$this->load->view("template/footer", $data);
	}
	public function diTolak()
	{
		//pagination
		$this->db->where("status", "3");
		$this->db->from("dokumen");
		$config["total_rows"] = $this->db->count_all_results(); // ini untuk menghitung semua pencarian terakhir

		$config["base_url"] = "http://localhost/NewSistemDispo/Draft/Pengajuan";

		$config["per_page"] = 12;
		$this->pagination->initialize($config);
		//akhir pagination

		$data["total_rows"] = $config["total_rows"];
		$data["start"] = $this->uri->segment(3);
		$data["dataDok"] = $this->Tulis_m->dataDitolak(
			"dokumen",
			$config["per_page"],
			$data["start"],
		);

		$this->cPagination();

		$data["title"] = "Draft";
		$data["judul"] = "diTolak";
		$this->load->view("template/header", $data);
		$this->load->view("template/sidebar", $data);
		$this->load->view("Draft/diTolak", $data);
		$this->load->view("template/footer", $data);
	}
	public function dalamPengajuan()
	{
		$data["title"] = "Draft";
		$data["judul"] = "Dalam Pengajuan";
		$id = $this->uri->segment(3);
		$data["dataDok"] = $this->Tulis_m->tampilDok($id);
		$this->load->view("template/header", $data);
		$this->load->view("template/sidebar", $data);
		$this->load->view("Draft/dalamPengajuan", $data);
		$this->load->view("template/footer", $data);
	}
	public function dataDitolak()
	{
		$data["title"] = "Draft";
		$data["judul"] = "diTolak";
		$id = $this->uri->segment(3);
		$data["dataDok"] = $this->Tulis_m->tampilDok($id);
		$data["dataCatatan"] = $this->Tulis_m->catatan($id);
		$this->load->view("template/header", $data);
		$this->load->view("template/sidebar", $data);
		$this->load->view("Draft/dataDitolak", $data);
		$this->load->view("template/footer", $data);
	}
	public function preview()
	{
		$data["title"] = "Draft";
		$data["judul"] = "Draft";
		$id = $this->uri->segment(3);
		$data["dataDok"] = $this->Tulis_m->tampilDok($id);
		$this->load->view("template/header", $data);
		$this->load->view("template/sidebar", $data);
		$this->load->view("Draft/preview", $data);
		$this->load->view("template/footer", $data);
	}
	public function updateData()
	{
		$id = $this->input->post("id");
		$penerima = htmlspecialchars($this->input->post("penerima", true));
		$checker = htmlspecialchars($this->input->post("checker", true));
		$approval = htmlspecialchars($this->input->post("approval", true));
		$perihal = htmlspecialchars($this->input->post("perihal", true));
		$tanggal = htmlspecialchars($this->input->post("tanggal", true));
		$isi = $this->input->post("isi", false);

		$data = [
			"tanggal_input" => $tanggal,
			"kepada" => $penerima,
			"isi_dokumen" => $isi,
			"perihal" => $perihal,
			"checker" => $checker,
			"signer" => $approval,
			"status" => "1",
			"keterangan" => "",
		];
		$this->db->where("id_dokumen", $id);
		$this->db->update("dokumen", $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata([
				"toast_type" => "success",
				"toast_message" => "Data berhasil disimpan.",
			]);
		} else {
			$this->session->set_flashdata([
				"toast_type" => "error",
				"toast_message" => "Gagal menyimpan data.",
			]);
		}
		redirect("Draft");
	}
	public function Edit()
	{
		$data["title"] = "Draft";
		$data["judul"] = "Edit Dokumen";
		$id = $this->uri->segment(3);
		$data["dataDok"] = $this->Tulis_m->tampilDok($id);
		$this->load->view("template/header", $data);
		$this->load->view("template/sidebar", $data);
		$this->load->view("Draft/edit", $data);
		$this->load->view("template/footer", $data);
	}
	public function kirimData($id, $checker, $signer)
	{
		$dataChekcek = [
			"id_dok" => $id,
			"role" => "1",
			"approval" => $checker,
			"status_approval" => 1,
			"keterangan_approval" => "",
		];
		$this->db->insert("approval", $dataChekcek);

		// $dataSigner = [
		// 	'id_dok' => $id,
		// 	'role' => '2',
		// 	'approval' => $signer,
		// 	'status_approval' => 1,
		// 	'keterangan_approval' => ''
		// ];
		// $this->db->insert('approval', $dataSigner);

		$data = [
			"status" => "2",
		];
		$this->db->where("id_dokumen", $id);
		$this->db->update("dokumen", $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata([
				"toast_type" => "success",
				"toast_message" => "Data berhasil disimpan.",
			]);
		} else {
			$this->session->set_flashdata([
				"toast_type" => "error",
				"toast_message" => "Gagal menyimpan data.",
			]);
		}
		redirect("Draft");
	}
	public function batal($id)
	{
		$data = [
			"status" => "1",
		];
		$this->db->where("id_dokumen", $id);
		$this->db->update("dokumen", $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata([
				"toast_type" => "success",
				"toast_message" => "Data berhasil disimpan.",
			]);
		} else {
			$this->session->set_flashdata([
				"toast_type" => "error",
				"toast_message" => "Gagal menyimpan data.",
			]);
		}
		redirect("Draft");
	}
	public function hapus($id)
	{
		$this->db->where("id_dokumen", $id);
		$this->db->delete("dokumen");
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata([
				"toast_type" => "success",
				"toast_message" => "Data berhasil disimpan.",
			]);
		} else {
			// Ambil error dari database
			$db_error = $this->db->error();

			// Cek apakah ada pesan error dari DB
			if (!empty($db_error["message"])) {
				$error_message =
					"Gagal menyimpan data: " . $db_error["message"];
			} else {
				$error_message = "Gagal menyimpan data (tidak diketahui).";
			}

			$this->session->set_flashdata([
				"toast_type" => "error",
				"toast_message" => $error_message,
			]);
		}
		redirect("Draft/diTolak");
	}
}
