<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
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
        $data['menu'] = $this->db->get('user_menu')->result_array();


        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebar.php', $data);
            $this->load->view('templates/topbar.php', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer.php');
        } else {

            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert"> 
            New Menu added
            </div>');
            redirect('menu');
        }
    }


    public function submenu()

    {

        $data['title'] = 'Submenu Management';
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
        $this->load->model('Menu_model', 'menu');
        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebar.php', $data);
            $this->load->view('templates/topbar.php', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer.php');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active'),
            ];

            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert">New Submenu added! </div>');
            redirect('menu/submenu');
        }
    }
}
