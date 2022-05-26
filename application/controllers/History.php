<?php
defined('BASEPATH') or exit('No direct script access allowed');



class History extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->helper('path');
        $this->load->model('History_model');
    }


    public function index()
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
        $data['title'] = 'Transaksi Pembayaran';
		$this->db->select('user.*,'.$select);
		$this->db->from('user');
		$this->db->join($tabel, $field.' = user.no_induk');
		$this->db->where('no_induk',$this->session->userdata('no_induk'));
		$data['user']  = $this->db->get()->row_array();
        $data['pembayaran'] = $this->History_model->data();
//		print_r($data['pembayaran']);
//		return;
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php', $data);
        $this->load->view('templates/topbar.php', $data);
        $this->load->view('history/index.php', $data);
        $this->load->view('templates/footer.php');
    }


    public function nilai()
    {
        $data['title'] = 'Nilai';
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
		$this->db->select('user.*,'.$select);
		$this->db->from('user');
		$this->db->join($tabel, $field.' = user.no_induk');
		$this->db->where('no_induk',$this->session->userdata('no_induk'));
		$data['user']  = $this->db->get()->row_array();

        $data['nilai'] = $this->History_model->datanilai();

        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/sidebar.php', $data);
        $this->load->view('templates/topbar.php', $data);
        $this->load->view('history/nilai.php', $data);
        $this->load->view('templates/footer.php');
    }
}
