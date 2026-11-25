<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tahun_akademik extends CI_Model
{
    // Fungsi untuk mengambil semua data dari tabel tbl_tahun_akademik
    public function list()
    {
        $this->db->select('*');
        $this->db->from('tbl_tahun_akademik');
        $this->db->order_by('id_tahun_akademik', 'DESC');
        return $this->db->get()->result_array();
    }

    // Fungsi untuk menambah data (Untuk Tugas 6 nanti)
    public function add($data)
    {
        $this->db->insert('tbl_tahun_akademik', $data);
    }

    // Fungsi untuk mengambil 1 data spesifik (Untuk edit)
    public function detail($id_tahun_akademik)
    {
        $this->db->select('*');
        $this->db->from('tbl_tahun_akademik');
        $this->db->where('id_tahun_akademik', $id_tahun_akademik);
        return $this->db->get()->row_array();
    }

    // Fungsi untuk update data
    public function edit($data)
    {
        $this->db->where('id_tahun_akademik', $data['id_tahun_akademik']);
        $this->db->update('tbl_tahun_akademik', $data);
    }

    // Fungsi untuk menghapus data
    public function delete($data)
    {
        $this->db->where('id_tahun_akademik', $data['id_tahun_akademik']);
        $this->db->delete('tbl_tahun_akademik');
    }
}