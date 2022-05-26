<?php
class History_model extends CI_Model
{


    public function data()
    {

        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->join('siswa', 'siswa.nis = pembayaran.nis');
        $this->db->join('periode', 'periode.id_periode = pembayaran.id_periode');
        $this->db->where(['pembayaran.nis' => $this->session->userdata('no_induk')]);
        $this->db->group_by('pembayaran.no_invoice');
        $query = $this->db->get();
        return $query->result();
    }

    public function datanilai()
    {

        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->join('guru', 'guru.nip = nilai.nip');
        $this->db->join('periode', 'periode.id_periode = nilai.id_periode');
        $this->db->join('siswa', 'siswa.nis = nilai.nis');
        $this->db->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran = nilai.id_mata_pelajaran');
        $this->db->where(['siswa.nis' => $this->session->userdata('no_induk')]);
        $this->db->group_by('nilai.id_nilai');
        $query = $this->db->get();
        return $query->result();
    }
}
