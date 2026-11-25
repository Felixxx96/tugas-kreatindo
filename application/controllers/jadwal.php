<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
    private $edit_id = null;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_jadwal');
        $this->load->model('m_kelas');
        $this->load->model('m_tahun_akademik');
        $this->load->model('m_guru');
        $this->load->model('m_mapel');
        $this->user_login->cek_login();
    }

    public function index()
    {
        $data = array(
            'title'  => 'SMKN 1 LUMAJANG',
            'title2' => 'Jadwal Pelajaran',
            'jadwal' => $this->m_jadwal->list(),
            'isi'    => 'admin/jadwal/v_list'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        $this->form_validation->set_rules('hari', 'Hari', 'required');
        $this->form_validation->set_rules('jam', 'Jam', 'required');
        $this->form_validation->set_rules('id_kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('id_tahun_akademik', 'Tahun Akademik', 'required');
        $this->form_validation->set_rules('id_guru', 'Guru', 'required|callback_cek_batas_mengajar');
        $this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'          => 'SMKN 1 LUMAJANG',
                'title2'         => 'Tambah Jadwal Pelajaran',
                'kelas'          => $this->m_kelas->list(),
                'tahun_akademik' => $this->m_tahun_akademik->list(),
                'guru'           => $this->m_guru->list(),
                'mapel'          => $this->m_mapel->list(),
                'isi'            => 'admin/jadwal/v_add'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'hari'              => $this->input->post('hari'),
                'jam'               => $this->input->post('jam'),
                'id_kelas'          => $this->input->post('id_kelas'),
                'id_tahun_akademik' => $this->input->post('id_tahun_akademik'),
                'id_guru'           => $this->input->post('id_guru'),
                'id_mapel'          => $this->input->post('id_mapel')
            );
            $this->m_jadwal->add($data);
            $this->session->set_flashdata('pesan', 'Jadwal Pelajaran Berhasil Ditambahkan!');
            redirect('jadwal');
        }
    }

    public function edit($id_jadwal)
    {
        $this->edit_id = $id_jadwal;

        $this->form_validation->set_rules('hari', 'Hari', 'required');
        $this->form_validation->set_rules('jam', 'Jam', 'required');
        $this->form_validation->set_rules('id_kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('id_tahun_akademik', 'Tahun Akademik', 'required');
        $this->form_validation->set_rules('id_guru', 'Guru', 'required|callback_cek_batas_mengajar');
        $this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'          => 'SMKN 1 LUMAJANG',
                'title2'         => 'Edit Jadwal Pelajaran',
                'jadwal'         => $this->m_jadwal->detail($id_jadwal),
                'kelas'          => $this->m_kelas->list(),
                'tahun_akademik' => $this->m_tahun_akademik->list(),
                'guru'           => $this->m_guru->list(),
                'mapel'          => $this->m_mapel->list(),
                'isi'            => 'admin/jadwal/v_edit'
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                'id_jadwal'         => $id_jadwal,
                'hari'              => $this->input->post('hari'),
                'jam'               => $this->input->post('jam'),
                'id_kelas'          => $this->input->post('id_kelas'),
                'id_tahun_akademik' => $this->input->post('id_tahun_akademik'),
                'id_guru'           => $this->input->post('id_guru'),
                'id_mapel'          => $this->input->post('id_mapel')
            );
            $this->m_jadwal->edit($data);
            $this->session->set_flashdata('pesan', 'Jadwal Pelajaran Berhasil Diedit!');
            redirect('jadwal');
        }
    }

   public function cek_batas_mengajar($id_guru)
{
    $hari = $this->input->post('hari');

    if (empty($id_guru) || empty($hari)) {
        return TRUE;
    }

    $jumlah = $this->m_jadwal->hitung_mengajar_harian($id_guru, $hari, $this->edit_id);

    if ($jumlah >= 3) {
        $this->form_validation->set_message('cek_batas_mengajar', 'Guru ini sudah lebih dari 3x mengajar pada hari ini.');
        return FALSE;
    }

    return TRUE;
}
    public function delete($id_jadwal)
    {
        $data = array('id_jadwal' => $id_jadwal);
        $this->m_jadwal->delete($data);
        $this->session->set_flashdata('pesan', 'Jadwal Pelajaran Berhasil Dihapus!');
        redirect('jadwal');
    }
}