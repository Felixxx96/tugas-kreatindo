<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_profile');
        $this->load->library('form_validation');

        if (!$this->session->userdata('username') && !$this->session->userdata('id_user')) {
            $this->session->set_flashdata('pesan', 'Anda belum login');
            redirect('login');
        }
    }

    private function _current_user_id()
    {
        if ($this->session->userdata('id_user')) {
            return $this->session->userdata('id_user');
        }

        $username = $this->session->userdata('username');
        $row = $this->db->get_where('tbl_user', ['username' => $username])->row();
        return $row ? $row->id_user : null;
    }

    public function index()
    {
        $id_user = $this->_current_user_id();
        $user    = $this->m_profile->get_user($id_user);

        $data = [
            'title'  => 'Profile User',
            'title2' => 'Profile User',
            'user'   => $user,
            'isi'    => 'admin/profile/v_index'
        ];
        $this->load->view('admin/layout/v_wrapper', $data);
    }

    public function update()
    {
        $id_user = $this->_current_user_id();
        $user    = $this->m_profile->get_user($id_user);

        if (!$user) {
            $this->session->set_flashdata('error', 'Data pengguna tidak ditemukan.');
            redirect('profile');
        }

        $this->form_validation->set_rules('nama_user', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors(' ', ' '));
            redirect('profile');
        }

        $data_update = [
            'nama_user' => $this->input->post('nama_user', TRUE),
            'username'  => $this->input->post('username', TRUE),
        ];

        if ($this->m_profile->update_user($id_user, $data_update)) {
            $this->session->set_userdata([
                'nama_user' => $data_update['nama_user'],
                'username'  => $data_update['username'],
            ]);
            $this->session->set_flashdata('pesan', 'Profil berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui profil.');
        }

        redirect('profile');
    }

    public function ganti_password()
    {
        $id_user = $this->_current_user_id();
        $user    = $this->m_profile->get_user($id_user);

        if (!$user) {
            $this->session->set_flashdata('error', 'Data pengguna tidak ditemukan.');
            redirect('profile');
        }

        $this->form_validation->set_rules('current_password', 'Password Lama', 'required');
        $this->form_validation->set_rules('new_password', 'Password Baru', 'required|min_length[3]');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors(' ', ' '));
            redirect('profile');
        }

        $current_pass = $this->input->post('current_password', TRUE);
        $new_pass     = $this->input->post('new_password', TRUE);

        $is_valid = ($user->password === $current_pass) || password_verify($current_pass, $user->password);

        if (!$is_valid) {
            $this->session->set_flashdata('error', 'Password lama salah.');
            redirect('profile');
        }

        if ($this->m_profile->update_user($id_user, ['password' => $new_pass])) {
            $this->session->set_flashdata('pesan', 'Password berhasil diganti.');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengganti password.');
        }

        redirect('profile');
    }
}