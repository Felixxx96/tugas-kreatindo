<?php

defined('BASEPATH') or exit('No direct script access allowed');

class gallery extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_gallery');
    }

    public function index()
    {
        $data = array(
            'title' => 'SMKN 1 LUMAJANG',
            'title2' => 'Gallery',
            'gallery' => $this->m_gallery->list(),
            'isi' => 'admin/gallery/v_list'
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

     public function add()
    {
        $this->form_validation->set_rules('nama_gallery', 'Nama Gallery', 'required');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './sampul_gallery/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 2000;
            $this->upload->initialize($config);
            
            if ( !$this->upload->do_upload('sampul_gallery'))
            {
                
                $data = array(
                    'title'  => 'SMKN 1 Lumajang',
                    'title2' => 'Add Data Gallery',
                    'error'  => $this->upload->display_errors(),
                    'isi'    => 'admin/gallery/v_add'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            }
            else
            {

                $upload_data             = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image']  = './sampul_gallery/'.$upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'nama_gallery'  => $this->input->post('nama_gallery'),
                    'sampul_gallery' => $upload_data['uploads']['file_name'] 
                );
                $this->m_gallery->add($data);
                $this->session->set_flashdata('pesan', 'Gallery Berhasil Ditambahkan !!');
                redirect('gallery');
            }
        }
        $data = array(
            'title' => 'SMK 1 Lumajang',
            'title2' => 'Tambah Data Gallery',
            'isi' => 'admin/gallery/v_add'
        );
        $this->load->view('admin/layout/v_wrapper', $data,FALSE);
    }

      public function edit($id_gallery)
    {
        $this->form_validation->set_rules('nama_gallery', 'Nama Gallery', 'required');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './sampul_gallery/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = 20000;
            $this->upload->initialize($config);
            
            if ( !$this->upload->do_upload('sampul_gallery'))
            {
                
                $data = array(
                    'title'  => 'SMKN 1 Lumajang',
                    'title2' => 'Edit Data Gallery',
                    'error'  => $this->upload->display_errors(),
                    'gallery' => $this->m_gallery->detail($id_gallery),
                    'isi'    => 'admin/gallery/v_edit'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            }
            else
            {
                $gallery = $this->m_gallery->detail($id_gallery);
                if ($gallery->sampul_gallery != "") {
                    unlink('./sampul_gallery/'.$gallery->sampul_gallery);
                }
                $upload_data             = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image']  = './sampul_gallery/'.$upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'id_gallery' => $id_gallery,
                    'nama_gallery'  => $this->input->post('nama_gallery'),
                    'sampul_gallery' => $upload_data['uploads']['file_name'] 
                );
                $this->m_gallery->edit($data);
                $this->session->set_flashdata('pesan', 'Gallery Berhasil DiUpdate !!');
                redirect('gallery');
            }

            $data = array(
                    'id_gallery' => $id_gallery,
                    'nama_gallery'  => $this->input->post('nama_gallery')
                );
                $this->m_gallery->edit($data);
                $this->session->set_flashdata('pesan', 'Gallery Berhasil DiUpdate !!');
                redirect('gallery');
        }
        $data = array(
            'title' => 'SMK 1 Lumajang',
            'title2' => 'Edit Data Gallery',
            'isi' => 'admin/gallery/v_edit',
            'gallery' => $this->m_gallery->detail($id_gallery),
        );
        $this->load->view('admin/layout/v_wrapper', $data,FALSE);
    }

    public function delete($id_gallery)
    {
        $gallery = $this->m_gallery->detail($id_gallery);
        if ($gallery->sampul_gallery != "") {
            unlink('./sampul_gallery/'.$gallery->sampul_gallery);
        }
        
        $data = array('id_gallery' => $id_gallery);
        $this->m_gallery->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus !!');
        redirect('gallery');
    }

    public function add_foto($id_gallery)
    {
         $this->form_validation->set_rules('ket_foto', 'Keterangan Foto', 'required');
         $gallery = $this->m_gallery->detail($id_gallery);
         $foto = $this->m_gallery->list_foto($id_gallery);

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './foto/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = 2000;
            $this->upload->initialize($config);
            
            if ( !$this->upload->do_upload('foto_gallery'))
            {
                $data = array(
                    'title'  => 'SMKN 1 Lumajang',
                    'title2' => 'Add Foto Gallery : '.$gallery->nama_gallery,
                    'error'  => $this->upload->display_errors(),
                    'gallery' => $gallery,
                    'foto'   => $foto,
                    'isi'    => 'admin/gallery/v_add_foto'
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            }
            else
            {
               
                $upload_data             = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image']  = './foto/'.$upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'id_gallery' => $id_gallery,
                    'ket_foto'  => $this->input->post('ket_foto'),
                    'foto' => $upload_data['uploads']['file_name'] 
                );
                $this->m_gallery->add_foto($data);
                $this->session->set_flashdata('pesan', 'Foto Berhasil Ditambahkan !!');
                redirect('gallery/add_foto/'.$id_gallery);
            }

        } 
        
        $data = array(
            'title' => 'SMK 1 Lumajang',
            'title2' => 'Add Foto Gallery : '.$gallery->nama_gallery,
            'gallery' => $gallery,
            'foto'    => $foto,
            'isi' => 'admin/gallery/v_add_foto'
        );
        $this->load->view('admin/layout/v_wrapper', $data,FALSE);
    }

    public function delete_foto($id_gallery, $id_foto)
    {
        $foto = $this->m_gallery->detail_foto($id_foto);
        if ($foto->foto != "") {
            unlink('./foto/'.$foto->foto);
        }
        
        $data = array('id_foto' => $id_foto);
        $this->m_gallery->delete_foto($data);
        $this->session->set_flashdata('pesan', 'Foto Berhasil Di Hapus !!');
        redirect('gallery/add_foto/'.$id_gallery);
    }
}