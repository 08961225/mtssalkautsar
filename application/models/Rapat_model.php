<?php

class Rapat_model extends CI_Model
{

    private $_table = "mom_rapat";


    public $id;
    public $pic;
    public $date_created;
    public $start;
    public $finish;
    public $agenda;
    public $supplier;
    public $hasil;
    public $file = "default.jpeg";
    public $attendes1;
    public $attendes2;
    public $keterangan;

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ['id' => $id])->row();
    }

    private function _uploadImage()
    {
        $date = date("mdY");
        $config['upload_path']          = './assets/file/rapat/';
        $config['allowed_types']        = 'pdf';
        $config['file_name']            = $this->id;
        $config['overwrite']            = true;
        $config['max_size']             = 10024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            return $this->upload->data("file_name");
        }

        return "default.jpeg";
    }

    public function save()
    {

        $date = date("mdY");
        $post = $this->input->post();
        $this->id =  str_shuffle($date);
        $this->pic = $post["pic"];
        $this->date_created = time();
        $this->start = $post["start"];
        $this->finish = $post["finish"];
        $this->agenda = $post["agenda"];
        $this->supplier = $post["supplier"];
        $this->hasil = $post["hasil"];
        $this->file = $this->_uploadImage();
        $this->attendes1 = $post["attendes1"];
        $this->attendes2 = $post["attendes2"];
        $this->keterangan = $post["keterangan"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id =  $post["id"];
        $this->pic = $post["pic"];
        $this->date_created = ["date_created"];
        $this->start = $post["start"];
        $this->finish = $post["finish"];
        $this->agenda = $post["agenda"];
        $this->supplier = $post["supplier"];
        $this->hasil = $post["hasil"];



        if (!empty($_FILES["file"]["name"])) {
            $this->file = $this->_uploadImage();
        } else {
            $this->file = $post["old_image"];
        }

        $this->attendes1 = $post["attendes1"];
        $this->attendes2 = $post["attendes2"];
        $this->keterangan = $post["keterangan"];
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array('id' => $id));
    }


    private function _deleteImage($id)
    {
        $list = $this->getById($id);
        if ($list->file != "default.jpeg") {
            $filename = explode(".", $list->file)[0];
            return array_map('unlink', glob(FCPATH . "assets/file/rapat/$filename.*"));
        }
    }

    public function download($id)
    {
        $query = $this->db->get_where('mom_rapat', array('id' => $id));
        return $query->row_array();
    }

    public function pdf($id)
    {
        $query = $this->db->get_where('mom_rapat', array('id' => $id));
        return $query->row_array();
    }
}
