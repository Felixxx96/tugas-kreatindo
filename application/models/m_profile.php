<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profile extends CI_Model
{
    private $table = 'tbl_user';

    public function get_user($id_user)
    {
        return $this->db->get_where($this->table, ['id_user' => $id_user])->row();
    }

    public function update_user($id_user, $data)
    {
        $this->db->where('id_user', $id_user);
        return $this->db->update($this->table, $data);
    }
}