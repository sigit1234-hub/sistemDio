<?php

// function ruang($id)
// {
//     $ci = get_instance();
//     $ci->db->where('id', $id);
//     $data = $ci->db->get('ruangmeeting')->result_array();
//     foreach ($data as $d) {
//         return $d['nama'];
//     }
// }
// function tampilJam($id)
// {
//     $ci = get_instance();
//     $dataJam = explode(',', $id);
//     for ($i = 0; $i < count($dataJam); $i++) {
//         $ci->db->or_where('id', $dataJam[$i]);
//     }
//     $data = $ci->db->get('jammeeting')->result_array();

//     foreach ($data as $dt) {
//         return $dt['jam'] . "<br>";
//     }
// }

function cPagination(){
    
}
function tampilNama($id)
{
    $ci = get_instance();
    $ci->db->where('id_karyawan', $id);
    $data =  $ci->db->get('karyawan')->result_array();
    foreach ($data as $nama) {
        return $nama['nama_karyawan'];
    }
}
function tampilDept($id)
{
    $ci = get_instance();
    $ci->db->where('id_dept', $id);
    $data =  $ci->db->get('departemen')->result_array();
    foreach ($data as $nama) {
        return $nama['nama_dept'];
    }
}
function departemen()
{
        $ci = get_instance();
        $data =  $ci->db->get('departemen')->result_array();
        return $data;
}
function karyawan()
{
        $ci = get_instance();
        $data =  $ci->db->get('karyawan')->result_array();
        return $data;
}
function teamLead()
{
        $ci = get_instance();
        $data = $ci->db->where('role_id !=', 5);
        $data =  $ci->db->get('karyawan')->result_array();
        return $data;
}