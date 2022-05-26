<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        if ($this->session->userdata('role_id') == '13') {
            $tabel = 'siswa';
            $field = 'siswa.nis';
            $select = 'siswa.*';
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
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php', $data);
        $this->load->view('templates/topbar.php', $data);
        $this->load->view('admin/index.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function role()
    {

        $data['title'] = 'Role';
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
        $data['role'] = $this->db->get('user_role')->result_array();
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php', $data);
        $this->load->view('templates/topbar.php', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer.php');
    }

    public function roleAccess($role_id)
    {

        $data['title'] = 'Role Access';
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

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php', $data);
        $this->load->view('templates/topbar.php', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer.php');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
        Access Changed!
        </div>');
    }
}
