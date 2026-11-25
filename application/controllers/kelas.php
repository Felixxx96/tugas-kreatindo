<?php
defined('BASEPATH') or exit('No direct script access allowed');
class kelas extends CI_Controller
{
   public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kelas');
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
            'title2' => 'Master kelas',
            'kelas' => $this->m_kelas->list(),
            'isi' => 'admin/kelas/v_list'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        $data = array(
            'nama_kelas' => $this->input->post('nama_kelas'),
        );
        $this->m_kelas->add($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
        redirect('kelas');
    }

     public function edit($id_kelas)
    {
        $data = array(
            'id_kelas' => $id_kelas,
            'nama_kelas' => $this->input->post('nama_kelas'),
        );
        $this->m_kelas->edit($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
        redirect('kelas');
    }

    public function delete($id_kelas)
    {
        $data = array(
            'id_kelas' => $id_kelas,
        );
        $this->m_kelas->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
        redirect('kelas');
    }
}