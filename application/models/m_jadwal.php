<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_jadwal extends CI_Model
{
    public function list()
    {
        $this->db->select('tbl_jadwal.*, tbl_kelas.nama_kelas, tbl_tahun_akademik.tahun_akademik, tbl_guru.nama_guru, tbl_mapel.nama_mapel');
        $this->db->from('tbl_jadwal');
        $this->db->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_jadwal.id_kelas', 'left');
        $this->db->join('tbl_tahun_akademik', 'tbl_tahun_akademik.id_tahun_akademik = tbl_jadwal.id_tahun_akademik', 'left');
        $this->db->join('tbl_guru', 'tbl_guru.id_guru = tbl_jadwal.id_guru', 'left');
        $this->db->join('tbl_mapel', 'tbl_mapel.id_mapel = tbl_jadwal.id_mapel', 'left');
        $this->db->order_by('tbl_jadwal.id_jadwal', 'DESC');
        return $this->db->get()->result_array();
    }

    public function detail($id_jadwal)
    {
        $this->db->select('*');
        $this->db->from('tbl_jadwal');
        $this->db->where('id_jadwal', $id_jadwal);
        return $this->db->get()->row_array();
    }

    public function hitung_mengajar_harian($id_guru, $hari, $exclude_id_jadwal = null)
{
    $this->db->from('tbl_jadwal');
    $this->db->where('id_guru', $id_guru);
    $this->db->where('hari', $hari);

    if (!empty($exclude_id_jadwal)) {
        $this->db->where('id_jadwal !=', $exclude_id_jadwal);
    }

    return $this->db->count_all_results();
}

    public function add($data)
    {
        $this->db->insert('tbl_jadwal', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_jadwal', $data['id_jadwal']);
        $this->db->update('tbl_jadwal', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_jadwal', $data['id_jadwal']);
        $this->db->delete('tbl_jadwal');
    }
}