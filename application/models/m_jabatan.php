<?php
defined('BASEPATH') or exit('No direct script access allowed');
class m_jabatan extends CI_Model
{
    public function list()
    {
        $this->db->select('*');
        $this->db->from('tbl_jabatan');
        $this->db->order_by('id_jabatan', 'ASC');
        return $this->db->get()->result();
    }

    public function add($data)
    {
        $this->db->insert('tbl_jabatan', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_jabatan', $data['id_jabatan']);
        $this->db->update('tbl_jabatan', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_jabatan', $data['id_jabatan']);
        $this->db->delete('tbl_jabatan', $data);
    }

    public function detail($id_jabatan)
    {
        $this->db->select('*');
        $this->db->from('tbl_jabatan');
        $this->db->where('id_jabatan', $id_jabatan);
        return $this->db->get()->row();
    }
}