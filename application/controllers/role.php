<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load model M_role
        $this->load->model('m_role');
        // Pastikan user sudah login sebelum akses menu ini
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
        $data = array(
            'title' => 'SMKN 1 LUMAJANG',
            'title2' => 'Master Role',
            'role' => $this->m_role->list(),
            'isi' => 'admin/role/v_list'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_role', 'Nama Role', 'required', array(
            'required' => '%s Harus Diisi!'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'SMKN 1 LUMAJANG',
                'title2' => 'Tambah Data Role',
                'isi' => 'admin/role/v_add'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'nama_role' => $this->input->post('nama_role')
            );
            $this->m_role->add($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!');
            redirect('role');
        }
    }

    public function edit($id_role)
    {
        $this->form_validation->set_rules('nama_role', 'Nama Role', 'required', array(
            'required' => '%s Harus Diisi!'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'SMKN 1 LUMAJANG',
                'title2' => 'Edit Data Role',
                'role' => $this->m_role->detail($id_role),
                'isi' => 'admin/role/v_edit'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'id_role' => $id_role,
                'nama_role' => $this->input->post('nama_role')
            );
            $this->m_role->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit!');
            redirect('role');
        }
    }

    public function delete($id_role)
    {
        $data = array(
            'id_role' => $id_role
        );
        $this->m_role->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');
        redirect('role');
    }
}