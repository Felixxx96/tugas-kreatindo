<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        $this->load->model('m_role');
        $this->load->model('m_jabatan');
        $this->user_login->cek_login();
        if (
            $this->session->userdata('id_role') != '1' &&
            $this->session->userdata('nama_role') != 'Super Admin' &&
            $this->session->userdata('role') != 'Super Admin'
        ) {
            redirect('admin');
        }
    }

    public function index()
    {
        $id_jabatan = $this->input->get('jabatan');

        $data = array(
            'title'            => 'SMKN 1 LUMAJANG',
            'title2'           => 'Master User',
            'user'             => $this->m_user->list($id_jabatan),
            'jabatan'          => $this->m_jabatan->list(),
            'selected_jabatan' => $id_jabatan,
            'isi'              => 'admin/user/v_list'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_user', 'Nama User', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tbl_user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('id_role', 'Role', 'required');
        $this->form_validation->set_rules('id_jabatan', 'Jabatan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'   => 'SMKN 1 LUMAJANG',
                'title2'  => 'Tambah Data User',
                'role'    => $this->m_role->list(),
                'jabatan' => $this->m_jabatan->list(),
                'isi'     => 'admin/user/v_add'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'nama_user'  => $this->input->post('nama_user'),
                'username'   => $this->input->post('username'),
                'password'   => $this->input->post('password'),
                'id_role'    => $this->input->post('id_role'),
                'id_jabatan' => $this->input->post('id_jabatan')
            );
            $this->m_user->add($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!');
            redirect('user');
        }
    }

    public function edit($id_user)
    {
        $this->form_validation->set_rules('nama_user', 'Nama User', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('id_role', 'Role', 'required');
        $this->form_validation->set_rules('id_jabatan', 'Jabatan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'   => 'SMKN 1 LUMAJANG',
                'title2'  => 'Edit Data User',
                'user'    => $this->m_user->detail($id_user),
                'role'    => $this->m_role->list(),
                'jabatan' => $this->m_jabatan->list(),
                'isi'     => 'admin/user/v_edit'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'id_user'    => $id_user,
                'nama_user'  => $this->input->post('nama_user'),
                'username'   => $this->input->post('username'),
                'password'   => $this->input->post('password'),
                'id_role'    => $this->input->post('id_role'),
                'id_jabatan' => $this->input->post('id_jabatan')
            );
            $this->m_user->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit!');
            redirect('user');
        }
    }

    public function delete($id_user)
    {
        $data = array(
            'id_user' => $id_user
        );
        $this->m_user->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');
        redirect('user');
    }
}