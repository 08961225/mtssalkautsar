<?php
class Data_model extends CI_Model
{


    private $_kelas = "kelas";
    private $_user = "user";
    private $_periode = "periode";
    private $_siswa = "siswa";
    private $_guru = "guru";
    private $_pegawai = "pegawai";


    public function __construct()
    {
        parent::__construct();
    }


    public function getByusername($nis)
    {
        return $this->db->get_where($this->_siswa, ['nis' => $nis])->row();
    }

    public function getBynip($nip)
    {
        return $this->db->get_where($this->_guru, ['nip' => $nip])->row();
    }

    public function getPegawai($nip)
    {
        return $this->db->get_where($this->_pegawai, ['nip' => $nip])->row();
    }

    public function deletesiswa($nis)
    {
        return $this->db->delete($this->_siswa, array('nis' => $nis));
    }


    public function deleteguru($nip)
    {
        return $this->db->delete($this->_guru, array('nip' => $nip));
    }


    public function deleteuser($nip)
    {
        return $this->db->delete($this->_user, array('no_induk' => $nip));
    }

    function getAll()
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('user', 'user.no_induk = siswa.nis');
        $this->db->join('periode', 'periode.id_periode = siswa.id_periode');
        $this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
        $this->db->group_by('siswa.nis');
        $query = $this->db->get();
        return $query->result();
    }

    function getAllguru()
    {
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->join('user', 'user.no_induk = guru.nip');
        $query = $this->db->get();
        return $query->result();
    }

    function getAllpegawai()
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->join('user', 'user.no_induk = pegawai.nip');
        $query = $this->db->get();
        return $query->result();
    }


    function get_username()
    {
        $q = $this->db->query("SELECT MAX(nis) AS id_max FROM siswa ");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->id_max) + 1;
                $kd = sprintf("%02s", $tmp);
            }
        } else {
            $kd = "01";
        }
        date_default_timezone_set('Asia/Jakarta');
        return $kd;
    }

    function get_userguru()
    {
        $q = $this->db->query("SELECT MAX(nip) AS id_max FROM guru ");
        $kd = "";
        $p = "G";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->id_max) + 1;
                $kd = sprintf("%02s", $tmp);
            }
        } else {
            $kd = "01";
        }
        date_default_timezone_set('Asia/Jakarta');
        return $kd;
    }

    function get_userpegawai()
    {
        $q = $this->db->query("SELECT MAX(nip) AS id_max FROM pegawai");
        $kd = "";
        $p = "P";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->id_max) + 1;
                $kd = sprintf("%02s", $tmp);
            }
        } else {
            $kd = "01";
        }
        return $kd;
    }

    function get_kelas()
    {
        return $this->db->get($this->_kelas)->result();
    }

    function get_periode()
    {
        return $this->db->get($this->_periode)->result();
    }

    function get_pegawai()
    {
        return $this->db->get($this->_pegawai)->result();
    }

    function save()
    {
        $data1 = [
            'no_induk' => $this->input->post('nis'),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'image' => 'default.jpg',
            'role_id' => 13,
            'is_active' => 1,
            'date_created' => time()

        ];
        $this->db->insert('user', $data1);

        $data2 = [
            'nis' => $this->input->post('nis'),
            'id_periode' => $this->input->post('periode'),
            'name' => $this->input->post('name'),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'alamat' => $this->input->post('alamat'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'agama' => $this->input->post('agama'),
            'no_hp' => $this->input->post('no_hp'),
            'motto' => $this->input->post('motto'),
            'id_kelas' => $this->input->post('id_kelas'),

        ];
        $this->db->insert('siswa', $data2);
    }


    function saveguru()
    {
        $data1 = [
            'no_induk' => $this->input->post('nip'),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'image' => 'default.jpg',
            'role_id' => 11,
            'is_active' => 1,
            'date_created' => time()

        ];
        $this->db->insert('user', $data1);

        $data2 = [
            'nip' => $this->input->post('nip'),
            'nuptk' => $this->input->post('nuptk'),
            'nama_guru' => htmlspecialchars($this->input->post('nama_guru', true)),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'agama' => $this->input->post('agama'),
            'no_hp' => $this->input->post('no_hp'),
            'motto' => $this->input->post('motto'),
            'motivasi' => $this->input->post('motivasi'),

        ];
        $this->db->insert('guru', $data2);
    }

    public function update()
    {

        $post = $this->input->post();
        $this->nis = $post["nis"];
        $this->id_periode =  $post["id_periode"];
        $this->name = $post["name"];
        $this->email = $post["email"];
        $this->alamat = $post["alamat"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->tempat_lahir = $post["tempat_lahir"];
        $this->tanggal_lahir = $post["tanggal_lahir"];
        $this->agama = $post["agama"];
        $this->no_hp = $post["no_hp"];
        $this->motto = $post["motto"];
        $this->id_kelas = $post["id_kelas"];

        $this->db->update($this->_siswa, $this, array('nis' => $post['nis']));
    }

    public function update1()
    {

        $post = $this->input->post();
        $this->nip = $post["nip"];
        $this->nuptk = $post["nuptk"];
        $this->nama_guru = $post["nama_guru"];
        $this->email = $post["email"];
        $this->alamat = $post["alamat"];
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->tempat_lahir = $post["tempat_lahir"];
        $this->tanggal_lahir = $post["tanggal_lahir"];
        $this->agama = $post["agama"];
        $this->no_hp = $post["no_hp"];
        $this->motto = $post["motto"];

        $this->db->update($this->_guru, $this, array('nip' => $post['nip']));
    }

    function saveperiode()
    {
        $data1 = [
            'tahun_ajaran' => $this->input->post('tahun_ajaran'),
            'biaya' => $this->input->post('biaya'),
        ];
        $this->db->insert('periode', $data1);
    }
}
