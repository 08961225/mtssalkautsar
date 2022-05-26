<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('dashboard_model');
        $this->form_validation->set_rules('link', 'LINK', 'required|trim');
    }

    public function index()
    {

        $data['dashboards'] = $this->dashboard_model->getAll();
        $data['title'] = 'Power BI';
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

        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php', $data);
        $this->load->view('templates/topbar.php', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer.php');
    }

    public function add()
    {

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Power BI';

            //Get Username
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

            //Get User Role
            $data['role'] = $this->db->get_where('user', ['role_id' =>
            $this->session->userdata('role_id')])->row_array();
            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebar.php', $data);
            $this->load->view('templates/topbar.php', $data);
            $this->load->view('dashboard/add', $data);
            $this->load->view('templates/footer.php');
        } else {
            $dashboard = $this->dashboard_model;
            $dashboard->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
        Data Berhasil Ditambahkan
        </div>');
            redirect('dashboard/index');
        }
    }

    public function edit($id = Null)
    {

        $encode = base64_encode($id);
        $decode = base64_decode($encode);
        if (!isset($id)) redirect('dashboard/index');
        $dashboard = $this->dashboard_model;
        if ($this->form_validation->run() == true) {
            $dashboard->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
            Data Berhasil Diubah
            </div>');
            redirect('dashboard/index');
        }


        $data["dashboard"] = $dashboard->getById($id);
        if (!$data["dashboard"]) show_404();

        $data['title'] = 'Power BI';
        //Get Username
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

        //Get User Role
        $data['role'] = $this->db->get_where('user', ['role_id' =>
        $this->session->userdata('role_id')])->row_array();
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php', $data);
        $this->load->view('templates/topbar.php', $data);
        $this->load->view('dashboard/edit', $data);
        $this->load->view('templates/footer.php');
    }
}
