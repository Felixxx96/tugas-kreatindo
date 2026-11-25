<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_role extends CI_Model
{
    public function list()
    {
        $this->db->select('*');
        $this->db->from('tbl_role');
        $this->db->order_by('id_role', 'ASC');
        return $this->db->get()->result();
    }

    public function detail($id_role)
    {
        $this->db->select('*');
        $this->db->from('tbl_role');
        $this->db->where('id_role', $id_role);
        return $this->db->get()->row();
    }

    public function add($data)
    {
        $this->db->insert('tbl_role', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_role', $data['id_role']);
        $this->db->update('tbl_role', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_role', $data['id_role']);
        $this->db->delete('tbl_role');
    }
}