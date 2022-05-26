<?php
class Pembayaran_model extends CI_Model
{

    private $_siswa = "siswa";
    private $_periode = "periode";
    private $_kelas = "kelas";
    private $_pembayaran = "pembayaran";


    public function __construct()
    {
        parent::__construct();
    }

    public function getByInvoice($no_invoice)
    {
        return $this->db->get_where($this->_pembayaran, ['no_invoice' => $no_invoice])->row();
    }

    function get_siswa()
    {
        return $this->db->get($this->_siswa)->result();
    }

    function get_periode()
    {
        return $this->db->get($this->_periode)->result();
    }

    function get_kelas()
    {
        return $this->db->get($this->_kelas)->result();
    }

    function get_pembayaran($no_invoice)
    {
        return $this->db->get_where($this->_pembayaran, ['no_invoice' => $no_invoice])->row();
    }

    public function data()
    {

        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->join('siswa', 'siswa.nis = pembayaran.nis');
        $this->db->join('periode', 'periode.id_periode = pembayaran.id_periode');
        $this->db->join('kelas', 'kelas.id_periode = periode.id_periode');
        $this->db->group_by('pembayaran.no_invoice');
        $query = $this->db->get();
        return $query->result();
    }


    function get_invoicenumber()
    {
        $q = $this->db->query("SELECT MAX(no_invoice) AS id_max FROM pembayaran ");
        $kd = "";
        $p = "INV";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->id_max) + 1;
                $kd = sprintf("%02s", $tmp);
            }
        } else {
            $kd = "01";
        }
        date_default_timezone_set('Asia/Jakarta');
        return $p . date('Y') . $kd;
    }

    function save()
    {

        $data = [
            'no_invoice' => $this->input->post('no_invoice'),
            'nis' => $this->input->post('nis'),
            'id_periode' => $this->input->post('id_periode'),
            'nama_bulan' => $this->input->post('nama_bulan'),
            'nama_bendahara' => $this->input->post('nama_bendahara'),
            'tanggal_pembayaran' => date('y-m-d'),
            'jumlah_pembayaran' => $this->input->post('jumlah_pembayaran'),
            'status_pembayaran' => $this->input->post('status_pembayaran'),
        ];

        $this->db->insert('pembayaran', $data);
    }

    public function update()
    {

        $post = $this->input->post();
        $this->no_invoice = $post["no_invoice"];
        $this->tanggal_pembayaran =  $post["tanggal_pembayaran"];
        $this->nama_bendahara = $post["nama_bendahara"];
        $this->status_pembayaran = $post["status_pembayaran"];

        $this->db->update($this->_pembayaran, $this, array('no_invoice' => $post['no_invoice']));
    }

    public function update1()
    {

        $post = $this->input->post();
        $this->no_invoice = $post["no_invoice"];
        $this->tanggal_pembayaran =  $post["tanggal_pembayaran"];
        $this->nama_bendahara = $post["nama_bendahara"];
        $this->status_pembayaran = $post["status_pembayaran"];

        $this->db->update($this->_pembayaran, $this, array('no_invoice' => $post['no_invoice']));
    }
}
