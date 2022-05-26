<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Pembayaran extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        is_logged_in();


        $this->load->model('Pembayaran_model');
        $this->load->helper('path');
    }




    public function index()
    {

        $data['title'] = 'Pembayaran Siswa';
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
        $data['siswa'] = $this->Pembayaran_model->get_siswa();
        $data['periode'] = $this->Pembayaran_model->get_periode();

        $data['noinvoice'] = $this->Pembayaran_model->get_invoicenumber();
        $data['pembayaran'] = $this->Pembayaran_model->data();


        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php', $data);
        $this->load->view('templates/topbar.php', $data);
        $this->load->view('pembayaran/index.php', $data);
        $this->load->view('templates/footer.php');
    }

    /**     public function addpembayaran()
    {
        $addpembayaran = $this->Pembayaran_model;
        $addpembayaran->save();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
            Data Berhasil Ditambahkan
            </div>');
        redirect('pembayaran/index');
    }

    public function editpembayaran($no_invoice = Null)
    {
        $data['title'] = 'Edit Data Pembayaran';

        if (!isset($no_invoice)) redirect('pembayaran');
        $pembayaran = $this->Pembayaran_model;

        if ($this->form_validation->run() == true) {

            $pembayaran->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
            Data Berhasil Diubah
            </div>');
            redirect('pembayaran/');
        }

        $data["pembayaran"] = $pembayaran->get_pembayaran($no_invoice);


        //Get Username
        if ($this->session->userdata('role_id') == '13') {
            $tabel = 'siswa';
            $field = 'siswa.nis';
            $select = 'siswa.*';
        } else if ($this->session->userdata('role_id') == '11') {
            $tabel = 'guru';
            $field = 'guru.nip';
            $select = 'guru.*';
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
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php', $data);
        $this->load->view('templates/topbar.php', $data);
        $this->load->view('pembayaran/editpembayaran', $data);
        $this->load->view('templates/footer.php');
    }*/

    public function editpembayaran($no_invoice = Null)
    {
        $data['title'] = 'Edit Data Pembayaran';
        if (!isset($no_invoice)) redirect('pembayaran');
        $membayar = $this->Pembayaran_model;

        if ($this->form_validation->run() == true) {

            $membayar->update1();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
            Data Berhasil Diubah
            </div>');
            redirect('pembayaran');
        }

        $data["pembayaran"] = $membayar->getByInvoice($no_invoice);
        if (!$data["pembayaran"]) show_404();

        //Get Username
        if ($this->session->userdata('role_id') == '13') {
            $tabel = 'siswa';
            $field = 'siswa.nis';
            $select = 'siswa.*';
        } else if ($this->session->userdata('role_id') == '11') {
            $tabel = 'guru';
            $field = 'guru.nip';
            $select = 'guru.*';
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
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php', $data);
        $this->load->view('templates/topbar.php', $data);
        $this->load->view('pembayaran/EDIT_PEMBAYARAN1', $data);
        $this->load->view('templates/footer.php');
    }
}
