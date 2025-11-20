<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Approval extends CI_Controller
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
		$config["base_url"] = "http://localhost/NewSistemDispo/Approval/index";

		$this->db->where("status", "2");
		$this->db->where("checker", "1");
		$this->db->where("signer", "1");
		$this->db->from("dokumen");
		$config["total_rows"] = $this->db->count_all_results(); // ini untuk menghitung semua pencarian terakhir

		$config["per_page"] = 12;
		$this->pagination->initialize($config);
		//akhir pagination

		$data["total_rows"] = $config["total_rows"];
		$data["start"] = $this->uri->segment(3);
		$data["dataDok"] = $this->Tulis_m->dataApproval(
			"dokumen",
			$config["per_page"],
			$data["start"]
		);

		$this->cPagination();

		$data["title"] = "Approval";
		$data["judul"] = "Approval";

		$this->load->view("template/header", $data);
		$this->load->view("template/sidebar", $data);
		$this->load->view("Approval/index", $data);
		$this->load->view("template/footer", $data);
	}
	public function pengajuan()
	{
		$data["title"] = "Draft";
		$data["judul"] = "Dalam Pengajuan";
		$data["dataDok"] = $this->Tulis_m->dataPengajuan();
		$this->load->view("template/header", $data);
		$this->load->view("template/sidebar", $data);
		$this->load->view("Draft/pengajuan", $data);
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
	public function preview()
	{
		$data["title"] = "Approval";
		$data["judul"] = "cekPengajuan";
		$id = $this->uri->segment(3);
		$data["dataDok"] = $this->Tulis_m->tampilDok($id);
		$this->load->view("template/header", $data);
		$this->load->view("template/sidebar", $data);
		$this->load->view("Approval/preview", $data);
		$this->load->view("template/footer", $data);
	}
	public function preview_signer()
	{
		$data["title"] = "Approval";
		$data["judul"] = "Approval";
		$id = $this->uri->segment(3);
		$data["dataDok"] = $this->Tulis_m->tampilDok($id);
		$this->load->view("template/header", $data);
		$this->load->view("template/sidebar", $data);
		$this->load->view("Approval/preview", $data);
		$this->load->view("template/footer", $data);
	}
	public function updateData()
	{
		$id_karyawan = htmlspecialchars($this->input->post("checker"));
		$id_dok = htmlspecialchars($this->input->post("id_dok"));
		$status = htmlspecialchars($this->input->post("statusId"));
		$signer = htmlspecialchars($this->input->post("signer"));
		$keterangan = htmlspecialchars($this->input->post("inputKeterangan"));

		$this->db->where("id_dokumen", $id_dok);
		$this->db->update("dokumen", ["status" => $status]);

		$dataSigner = [
			"id_dok" => $id_dok,
			"approval" => $id_karyawan,
			"status_approval" => $status,
			"tanggal" => tanggal(),
			"keterangan" => $keterangan
		];

		$this->db->insert("approval_checker", $dataSigner);
		if ($status == 3) {
			$inputHis = [
				"id_dok_his" => $id_dok,
				"id_karyawan" => $id_karyawan,
				"status_approval" => $status,
				"tanggal" => tanggal(),
				"keterangan" => $keterangan
			];
			$this->db->insert("history_pengajuan", $inputHis);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata([
				"toast_type" => "success",
				"toast_message" => "Data berhasil disimpan."
			]);
		} else {
			$this->session->set_flashdata([
				"toast_type" => "error",
				"toast_message" => "Gagal menyimpan data."
			]);
		}
		redirect("Approval/cekPengajuan");
	}
	public function updateDatasigner()
	{
		$id_karyawan = htmlspecialchars($this->input->post("checker"));
		$id_dok = htmlspecialchars($this->input->post("id_dok"));
		$status = htmlspecialchars($this->input->post("statusId"));
		$keterangan = htmlspecialchars($this->input->post("inputKeterangan"));

		if ($status == 3) {
			$this->db->where("id_dokumen", $id_dok);
			$this->db->update("dokumen", ["status" => $status]);
		} else {
			$this->db->where("id_dokumen", $id_dok);
			$this->db->update("dokumen", ["status" => 4]);
		}

		$dataSigner = [
			"id_dok" => $id_dok,
			"approval" => $id_karyawan,
			"status_approval" => $status,
			"tanggal" => tanggal(),
			"keterangan" => $keterangan
		];

		$this->db->insert("approval_signer", $dataSigner);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata([
				"toast_type" => "success",
				"toast_message" => "Data berhasil disimpan."
			]);
		} else {
			$this->session->set_flashdata([
				"toast_type" => "error",
				"toast_message" => "Gagal menyimpan data."
			]);
		}
		redirect("Approval");
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
	public function kirimData($id)
	{
		$data = [
			"status" => "2"
		];
		$this->db->where("id_dokumen", $id);
		$this->db->update("dokumen", $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata([
				"toast_type" => "success",
				"toast_message" => "Data berhasil disimpan."
			]);
		} else {
			$this->session->set_flashdata([
				"toast_type" => "error",
				"toast_message" => "Gagal menyimpan data."
			]);
		}
		redirect("Draft");
	}
	public function batal($id)
	{
		$data = [
			"status" => "1"
		];
		$this->db->where("id_dokumen", $id);
		$this->db->update("dokumen", $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata([
				"toast_type" => "success",
				"toast_message" => "Data berhasil disimpan."
			]);
		} else {
			$this->session->set_flashdata([
				"toast_type" => "error",
				"toast_message" => "Gagal menyimpan data."
			]);
		}
		redirect("Draft");
	}
	public function cekPengajuan()
	{
		//pagination
		$config["base_url"] = "http://localhost/NewSistemDispo/Approval/index";

		$this->db->where("status", "2");
		$this->db->where("checker", "1");
		$this->db->where("signer", "1");
		$this->db->from("dokumen");
		$config["total_rows"] = $this->db->count_all_results(); // ini untuk menghitung semua pencarian terakhir

		$config["per_page"] = 12;
		$this->pagination->initialize($config);
		//akhir pagination

		$data["total_rows"] = $config["total_rows"];
		$data["start"] = $this->uri->segment(3);
		$data["dataDok"] = $this->Tulis_m->cekApproval(
			"dokumen",
			$config["per_page"],
			$data["start"]
		);

		$this->cPagination();

		$data["title"] = "Approval";
		$data["judul"] = "cekPengajuan";

		$this->load->view("template/header", $data);
		$this->load->view("template/sidebar", $data);
		$this->load->view("Approval/cekPengajuan", $data);
		$this->load->view("template/footer", $data);
	}
}
