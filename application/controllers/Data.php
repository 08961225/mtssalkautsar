<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Data_model');
        $this->load->helper('path');

        $this->form_validation->set_rules('name', 'name', 'required|trim');
    }

    public function index()
    {
        $data['title'] = 'Siswa';
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
        $data['kelas'] = $this->Data_model->get_kelas();
        $data['periode'] = $this->Data_model->get_periode();
        $data['nis'] = $this->Data_model->get_username();
        $data['siswa'] = $this->Data_model->getAll();


        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php', $data);
        $this->load->view('templates/topbar.php', $data);
        $this->load->view('master/index', $data);
        $this->load->view('templates/footer.php');
    }

    public function addsiswa()
    {
        $addsiswa = $this->Data_model;
        $addsiswa->save();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
            Data Berhasil Ditambahkan
            </div>');
        redirect('data');
    }

    public function delete($username)
    {

        $this->Data_model->deletesiswa($username);
        $this->Data_model->deleteuser($username);


        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
            Data Berhasil Didelete
            </div>');
        redirect('data');
    }


    public function deleteguru($username)
    {

        $this->Data_model->deleteguru($username);
        $this->Data_model->deleteuser($username);


        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
            Data Berhasil Didelete
            </div>');
        redirect('data/guru');
    }

    public function editsiswa($nis = Null)
    {
        $data['title'] = 'Edit Data Siswa';
        if (!isset($nis)) redirect('data');
        $siswa = $this->Data_model;

        if ($this->form_validation->run() == true) {

            $siswa->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
            Data Berhasil Diubah
            </div>');
            redirect('data');
        }

        $data["siswa"] = $siswa->getByusername($nis);
        if (!$data["siswa"]) show_404();
        $data['kelas'] = $this->Data_model->get_kelas();
        $data['periode'] = $this->Data_model->get_periode();



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
        $this->load->view('master/editsiswa', $data);
        $this->load->view('templates/footer.php');
    }


    public function guru()
    {
        $data['title'] = 'Guru';

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
        $data['guru'] = $this->Data_model->getAllguru();
        $data['nip'] = $this->Data_model->get_userguru();


        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php', $data);
        $this->load->view('templates/topbar.php', $data);
        $this->load->view('master/guru', $data);
        $this->load->view('templates/footer.php');
    }

    public function addguru()
    {
        $addguru = $this->Data_model;
        $addguru->saveguru();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
            Data Berhasil Ditambahkan
            </div>');
        redirect('data/guru');
    }

    public function editguru($nip = Null)
    {
        $data['title'] = 'Edit Data Guru';
        if (!isset($nip)) redirect('data');
        $guru = $this->Data_model;

        if ($this->form_validation->run() == true) {

            $guru->update1();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
            Data Berhasil Diubah
            </div>');
            redirect('data');
        }

        $data["guru"] = $guru->getBynip($nip);
        if (!$data["guru"]) show_404();

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
        $this->load->view('master/editguru', $data);
        $this->load->view('templates/footer.php');
    }

    public function periode()
    {
        $data['title'] = 'Periode';
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
        $data['periode'] = $this->Data_model->get_periode();

        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php', $data);
        $this->load->view('templates/topbar.php', $data);
        $this->load->view('master/periode', $data);
        $this->load->view('templates/footer.php');
    }

    public function addperiode()
    {
        $addperiode = $this->Data_model;
        $addperiode->saveperiode();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
            Data Berhasil Ditambahkan
            </div>');
        redirect('data/periode');
    }


    public function pegawai()
    {

        $data['title'] = 'Pegawai';
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
            $select = 'pegawai.* , pegawai.nama_pegawai as name';
        }
        $this->db->select('user.*,' . $select);
        $this->db->from('user');
        $this->db->join($tabel, $field . ' = user.no_induk');
        $this->db->where('no_induk', $this->session->userdata('no_induk'));

        $data['user']  = $this->db->get()->row_array();
        $data['nip'] = $this->Data_model->get_userpegawai();
        $data['pegawai'] = $this->Data_model->getAllpegawai();

        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php', $data);
        $this->load->view('templates/topbar.php', $data);
        $this->load->view('master/pegawai', $data);
        $this->load->view('templates/footer.php');
    }
}
