<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function list($id_jabatan = null)
    {
        // JOIN 3 Tabel: User, Role, Jabatan
        $this->db->select('tbl_user.*, tbl_role.nama_role, tbl_jabatan.nama_jabatan');
        $this->db->from('tbl_user');
        $this->db->join('tbl_role', 'tbl_role.id_role = tbl_user.id_role', 'left');
        $this->db->join('tbl_jabatan', 'tbl_jabatan.id_jabatan = tbl_user.id_jabatan', 'left');

        // Filter berdasarkan jabatan jika dipilih
        if (!empty($id_jabatan)) {
            $this->db->where('tbl_user.id_jabatan', $id_jabatan);
        }

        $this->db->order_by('id_user', 'DESC');
        return $this->db->get()->result();
    }

    public function detail($id_user)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('id_user', $id_user);
        return $this->db->get()->row();
    }

    public function add($data)
    {
        $this->db->insert('tbl_user', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('tbl_user', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->delete('tbl_user');
    }
}