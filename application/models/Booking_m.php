<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking_m extends CI_Model
{
    public function getAlldata()
    {
        $this->db->select('booking.*, ruangmeeting.nama, jammeeting.jam');
        $this->db->from('booking');
        $this->db->join('ruangmeeting', 'ruangmeeting.id = booking.ruangan');
        $this->db->join('jammeeting', 'jammeeting.id = booking.id_jam');
        $query = $this->db->order_by('booking.id', 'DESC')->get();
        return $query; // atau ->result_array() jika ingin array
    }
    public function getData($tanggal, $ruang)
    {
        // $this->db->select('booking.*');
        // $this->db->from('booking');
        // $this->db->join('ruangmeeting', 'ruangmeeting.id = booking.ruangan');
        // $this->db->join('jammeeting', 'jammeeting.id = booking.id_jam');
        // $this->db->where('booking.tanggal', $tanggal);
        // $this->db->where('booking.ruangan', $ruang);
        // $query = $this->db->get();
        // return $query; // atau ->result_array() jika ingin array
        $this->db->select('id_jam');
        $this->db->where('tanggal', $tanggal);
        $this->db->where('ruangan', $ruang);
        return $this->db->get('booking');
    }
    public function getJam()
    {
        return  $this->db->get('jammeeting');
    }
    public function getEvent()
    {
        return $this->db->order_by('ruangan', 'ASC')->get('booking');
    }
    public function getRbesar($keyTanggal)
    {
        $today = tanggals();
        $this->db->where('ruangan', 1);
        $this->db->where('tanggal', $keyTanggal);
        return $this->db->order_by('id_jam', 'ASC')->get('booking');
    }
    public function getRkecil($keyTanggal)
    {
        $today = tanggals();
        $this->db->where('ruangan', 2);
        $this->db->where('tanggal', $keyTanggal);
        return $this->db->order_by('id_jam', 'ASC')->get('booking');
    }
    public function getRMb($keyTanggal)
    {
        $today = tanggals();
        $this->db->where('ruangan', 3);
        $this->db->where('tanggal', $keyTanggal);
        return $this->db->order_by('id_jam', 'ASC')->get('booking');
    }
    public function getDataBookuser()
    {
        $this->db->where('namaPic', $this->session->userdata['id']);
        return $this->db->order_by('id', 'DESC')->get('Booking')->result_array();
        $this->uri->segment(2);
    }
}
