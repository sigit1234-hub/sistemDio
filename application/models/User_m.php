<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
	public function getUser($table, $limit, $start)
	{
		return $this->db->limit($limit, $start)->get($table)->result();
		// return $this->db->order_by('id_karyawan', 'DESC')->get($table, $limit, $start)->result_array();
	}
}
