<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tahun_akademik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_tahun_akademik');
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
            'title'          => 'SMKN 1 LUMAJANG',
            'title2'         => 'Master Tahun Akademik',
            'tahun_akademik' => $this->m_tahun_akademik->list(),
            'isi'            => 'admin/tahun_akademik/v_list'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        $this->form_validation->set_rules('tahun_akademik', 'Tahun Akademik', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'  => 'SMKN 1 LUMAJANG',
                'title2' => 'Tambah Tahun Akademik',
                'isi'    => 'admin/tahun_akademik/v_add'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'tahun_akademik' => $this->input->post('tahun_akademik')
            );
            $this->m_tahun_akademik->add($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!');
            redirect('tahun_akademik');
        }
    }

    public function edit($id_tahun_akademik)
    {
        $this->form_validation->set_rules('tahun_akademik', 'Tahun Akademik', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'          => 'SMKN 1 LUMAJANG',
                'title2'         => 'Edit Tahun Akademik',
                'tahun_akademik' => $this->m_tahun_akademik->detail($id_tahun_akademik),
                'isi'            => 'admin/tahun_akademik/v_edit'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'id_tahun_akademik' => $id_tahun_akademik,
                'tahun_akademik'    => $this->input->post('tahun_akademik')
            );
            $this->m_tahun_akademik->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit!');
            redirect('tahun_akademik');
        }
    }

    public function delete($id_tahun_akademik)
    {
        $data = array(
            'id_tahun_akademik' => $id_tahun_akademik
        );
        $this->m_tahun_akademik->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');
        redirect('tahun_akademik');
    }
}