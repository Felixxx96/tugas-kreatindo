<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{
    public function login($username, $password)
    {
        $username = trim((string) $username);
        $password = (string) $password;

        $this->db->select('tbl_user.*, tbl_role.nama_role, tbl_jabatan.nama_jabatan');
        $this->db->from('tbl_user');
        $this->db->join('tbl_role', 'tbl_role.id_role = tbl_user.id_role', 'left');
        $this->db->join('tbl_jabatan', 'tbl_jabatan.id_jabatan = tbl_user.id_jabatan', 'left');
        $this->db->where('tbl_user.username', $username);
        $user = $this->db->get()->row();

        if (!$user) {
            return null;
        }

        $db_pass = (string) $user->password;

        $is_bcrypt_valid = (strpos($db_pass, '$2y$') === 0 || strpos($db_pass, '$2a$') === 0)
            && password_verify($password, $db_pass);

        if (
            $is_bcrypt_valid ||
            hash_equals(md5($password), strtolower($db_pass)) ||
            hash_equals($password, $db_pass)
        ) {
            return $user;
        }

        return null;
    }
}