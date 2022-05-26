<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        if ($this->session->userdata('role_id') == '13') {
            $tabel = 'siswa';
            $field = 'siswa.nis';
            $select = 'siswa.*';
        } else if ($this->session->userdata('role_id') == '11') {
            $tabel = 'guru';
            $field = 'guru.nip';
            $select = 'guru.* , guru.nama_guru as name';
        } else {
            $tabel = 'pegawai';
            $field = 'pegawai.nip';
            $select = 'pegawai.*, pegawai.nama_pegawai as name';
        }
        $this->db->select('user.*,' . $select);
        $this->db->from('user');
        $this->db->join($tabel, $field . ' = user.no_induk');
        $this->db->where('no_induk', $this->session->userdata('no_induk'));

        $data['user']  = $this->db->get()->row_array();
        // print_r($data['user']);
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php', $data);
        $this->load->view('templates/topbar.php', $data);
        $this->load->view('user/index.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function edit()
    {
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
        $data['title'] = 'My Profile';
        $this->db->select('user.*,' . $select);
        $this->db->from('user');
        $this->db->join($tabel, $field . ' = user.no_induk');
        $this->db->where('no_induk', $this->session->userdata('no_induk'));
        $data['user']  = $this->db->get()->row_array();

        if (!isset($_POST['no_induk'])) {
            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/sidebar.php', $data);
            $this->load->view('templates/topbar.php', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer.php');
        } else {
            $name = $this->input->post('name');
            $no_induk = $this->input->post('no_induk');

            //Cek IMG
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {

                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->where('no_induk', $no_induk);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
            Your Profile has Updated
            </div>');
            redirect('user');
        }
    }
}
