<?php

use LDAP\Result;

defined("BASEPATH") or exit("No direct script access allowed");

class Tulis_m extends CI_Model
{
	public function simpanData()
	{
		$id = $this->input->post("id_karyawan");
		$penerima = htmlspecialchars($this->input->post("penerima", true));
		$checker = htmlspecialchars($this->input->post("checker", true));
		$approval = htmlspecialchars($this->input->post("approval", true));
		$perihal = htmlspecialchars($this->input->post("perihal", true));
		$tanggal = htmlspecialchars($this->input->post("tanggal", true));
		$isi = htmlspecialchars($this->input->post("isi", true));
		$jenis_dok = htmlspecialchars($this->input->post("jenis_dok", true));

		$data = [
			"id_karyawan" => $id,
			"tanggal_input" => $tanggal,
			"id_jenis_dokumen" => $jenis_dok,
			"kepada" => $penerima,
			"isi_dokumen" => $isi,
			"perihal" => $perihal,
			"checker" => $checker,
			"signer" => $approval,
			"status" => "1",
			"keterangan" => ""
		];
		$this->db->insert("dokumen", $data);
	}

	public function dataDokumen()
	{
		return $this->db
			->order_by("id_dokumen", "DESC")
			->get("dokumen")
			->result_array();
	}

	public function tampilDok($id)
	{
		$this->db->where("id_dokumen", $id);
		return $this->db->get("dokumen")->result_array();
	}
	public function dataDraft($table, $limit, $start)
	{
		$this->db->where("status", 1);
		return $this->db->get($table, $limit, $start)->result_array();
	}
	public function dataPengajuan($table, $limit, $start)
	{
		$this->db->where("status", "2");
		return $this->db
			->order_by("id_dokumen", "DESC")
			->get($table, $limit, $start)
			->result_array();
	}
	public function dataDitolak($table, $limit, $start)
	{
		$this->db->where(
			"id_karyawan",
			$this->session->userdata("id_karyawan")
		);
		$this->db->where("status", "3");
		return $this->db
			->order_by("id_dokumen", "DESC")
			->get($table, $limit, $start)
			->result_array();
	}
	public function dataApproval($table, $limit, $start)
	{
		$id = $this->session->userdata("id_karyawan");
		$this->db->where("signer", $id);
		$this->db->where("status", 1);
		return $this->db
			->order_by("id_dokumen", "DESC")
			->get($table, $limit, $start)
			->result_array();
	}
	public function cekApproval($table, $limit, $start)
	{
		$id = $this->session->userdata("id_karyawan");
		$this->db->where("checker", $id);
		$this->db->where("status", 2);
		return $this->db
			->order_by("id_dokumen", "DESC")
			->get($table, $limit, $start)
			->result_array();
	}
	public function catatan($id)
	{
		$this->db->where("id_dok_his", $id);
		return $this->db
			->order_by("tanggal", "DESC")
			->get("history_pengajuan")
			->result_array();
	}
}
