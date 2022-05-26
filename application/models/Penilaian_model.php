<?php
class Penilaian_model extends CI_Model
{

    private $_siswa = "siswa";
    private $_periode = "periode";
    private $_mata_pelajaran = "mata_pelajaran";

    function get_siswa()
    {
        return $this->db->get($this->_siswa)->result();
    }

    function get_periode()
    {
        return $this->db->get($this->_periode)->result();
    }

    function get_mapel()
    {
        return $this->db->get($this->_mata_pelajaran)->result();
    }


    public function data()
    {

        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->join('guru', 'guru.nip = nilai.nip');
        $this->db->join('periode', 'periode.id_periode = nilai.id_periode');
        $this->db->join('siswa', 'siswa.nis = nilai.nis');
        $this->db->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran = nilai.id_mata_pelajaran');
         
        $this->db->where(['nilai.nip' => $this->session->userdata('no_induk')]);
        $this->db->group_by('nilai.id_nilai');
        $query = $this->db->get();
        return $query->result();
    }
    public function data2()
    {

        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->join('guru', 'guru.nip = nilai.nip');
        $this->db->join('periode', 'periode.id_periode = nilai.id_periode');
        $this->db->join('siswa', 'siswa.nis = nilai.nis');
        $this->db->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran = nilai.id_mata_pelajaran');
        $this->db->group_by('nilai.id_nilai');
        $query = $this->db->get();
        return $query->result();
    }

    function save()
    {
        $data = [
            'nis' => $this->input->post('nis'),
            'id_mata_pelajaran' => $this->input->post('id_mata_pelajaran'),
            'id_periode' => $this->input->post('id_periode'),
            'nip' => $this->input->post('nip'),
            'nilai' => $this->input->post('nilai'),
        ];

        $this->db->insert('nilai', $data);
    }
}
