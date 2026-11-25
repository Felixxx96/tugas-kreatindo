<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User_login
{
    protected $CI;
    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->model('m_login');
    }
    
    public function login($username, $password)
    {
        $cek = $this->CI->m_login->login($username, $password);
        if ($cek) {
            $id_user     = $cek->id_user;
            $username    = $cek->username;
            $nama_user   = $cek->nama_user;
            $id_role     = $cek->id_role; 
            $id_jabatan  = $cek->id_jabatan;
            
            // TAMBAHAN BARU: Ambil nama_role
            $nama_role   = $cek->nama_role; 

            $this->CI->session->set_userdata('id_user', $id_user);
            $this->CI->session->set_userdata('username', $username);
            $this->CI->session->set_userdata('nama_user', $nama_user);
            $this->CI->session->set_userdata('id_role', $id_role);
            $this->CI->session->set_userdata('id_jabatan', $id_jabatan);
            
            // TAMBAHAN BARU: Simpan ke session
            $this->CI->session->set_userdata('nama_role', $nama_role); 
            
            redirect('admin');
        }else{
            $this->CI->session->set_flashdata('pesan', 'username atau password salah');
            redirect('login');
        }
    }
    
    public function cek_login()
    {
        if ($this->CI->session->userdata('username') == '') {
            $this->CI->session->set_flashdata('pesan', 'Anda belum login');
            redirect('login');
        }
    }
    
    public function logout()
    {
        $this->CI->session->unset_userdata('id_user');
        $this->CI->session->unset_userdata('username');
        $this->CI->session->unset_userdata('nama_user');
        $this->CI->session->unset_userdata('id_role');
        $this->CI->session->unset_userdata('id_jabatan');
        
        // TAMBAHAN BARU: Hapus session nama_role saat logout
        $this->CI->session->unset_userdata('nama_role'); 
        
        $this->CI->session->set_flashdata('pesan', 'Anda berhasil logout');
        redirect('login');
    }
}