<?php
defined('BASEPATH') or exit('No direct script access allowed');
class m_siswa extends CI_Model
{
    public function list()
    {
       $this->db->select('*');
       $this->db->from('tbl_siswa');
       $this->db->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left');
       $this->db->join('tbl_tahun_akademik', 'tbl_tahun_akademik.id_tahun_akademik = tbl_siswa.id_tahun_akademik', 'left');
       $this->db->order_by('id_siswa', 'desc');
       return $this->db->get()->result();
    }

    public function detail($id_siswa)
    {
        $this->db->select('*');
        $this->db->from('tbl_siswa');
        $this->db->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left');
        $this->db->join('tbl_tahun_akademik', 'tbl_tahun_akademik.id_tahun_akademik = tbl_siswa.id_tahun_akademik', 'left');
        $this->db->where('id_siswa', $id_siswa);
        return $this->db->get()->row();
    }

    public function add($data)
    {
        $this->db->insert('tbl_siswa', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_siswa', $data['id_siswa']);
        $this->db->update('tbl_siswa', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_siswa', $data['id_siswa']);
        $this->db->delete('tbl_siswa',$data);
    }
}