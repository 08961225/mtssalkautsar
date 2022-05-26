<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Penilaian extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->helper('path');
        $this->load->model('Penilaian_model');
    }


    public function index()
    {
        $data['title'] = 'Penilaian Siswa';
        if ($this->session->userdata('role_id') == '13') {
            $tabel = 'siswa';
            $field = 'siswa.nis';
            $select = 'siswa.name';
        } else if ($this->session->userdata('role_id') == '11') {
            $tabel = 'guru';
            $field = 'guru.nip';
            $select = 'guru.nama_guru as name';
        } else {
            $tabel = 'pegawai';
            $field = 'pegawai.nip';
            $select = 'pegawai.nama_pegawai as name';
        }
        $this->db->select('user.*,' . $select);
        $this->db->from('user');
        $this->db->join($tabel, $field . ' = user.no_induk');
        $this->db->where('no_induk', $this->session->userdata('no_induk'));
        $data['user']  = $this->db->get()->row_array();

        $data['siswa'] = $this->Penilaian_model->get_siswa();
        $data['periode'] = $this->Penilaian_model->get_periode();
        $data['mapel'] = $this->Penilaian_model->get_mapel();

        if ($this->session->userdata('role_id') == 1) {
            $data['nilai'] = $this->Penilaian_model->data2();
        } else {
            $data['nilai'] = $this->Penilaian_model->data();
        }
        // print_r($this->session->userdata('role_id'));

        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php', $data);
        $this->load->view('templates/topbar.php', $data);
        $this->load->view('penilaian/index.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function save()
    {
        $save = $this->Penilaian_model;
        $save->save();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
            Data Berhasil Ditambahkan
            </div>');
        redirect('penilaian/index');
    }
}
