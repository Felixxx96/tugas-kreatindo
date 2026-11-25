<?php
defined('BASEPATH') or exit('No direct script access allowed');
class jabatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
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
        $data = array(
            'title' => 'SMK 1 Lumajang',
            'title2' => 'Master Jabatan',
            'jabatan' => $this->m_jabatan->list(),
            'isi' => 'admin/jabatan/v_list'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        $data = array(
            'nama_jabatan' => $this->input->post('nama_jabatan'),
        );
        $this->m_jabatan->add($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
        redirect('jabatan');
    }

     public function edit($id_jabatan)
    {
        $data = array(
            'id_jabatan' => $id_jabatan,
            'nama_jabatan' => $this->input->post('nama_jabatan'),
        );
        $this->m_jabatan->edit($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
        redirect('jabatan');
    }

    public function delete($id_jabatan)
    {
        $data = array(
            'id_jabatan' => $id_jabatan,
        );
        $this->m_jabatan->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
        redirect('jabatan');
    }
}