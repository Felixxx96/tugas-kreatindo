<?php
defined('BASEPATH') or exit('No direct script access allowed');
class m_kelas extends CI_Model
{
    public function list()
    {
        $this->db->select('*');
        $this->db->from('tbl_kelas');
        $this->db->order_by('id_kelas', 'ASC');
        return $this->db->get()->result();
    }

    public function add($data)
    {
        $this->db->insert('tbl_kelas', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_kelas', $data['id_kelas']);
        $this->db->update('tbl_kelas', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_kelas', $data['id_kelas']);
        $this->db->delete('tbl_kelas', $data);
    }

    public function detail($id_kelas)
    {
        $this->db->select('*');
        $this->db->from('tbl_kelas');
        $this->db->where('id_kelas', $id_kelas);
        return $this->db->get()->row();
    }
}