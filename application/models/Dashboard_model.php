<?php

class Dashboard_model extends CI_Model
{
    private $_table = "dashboard";

    public $id;
    public $link;

    public function save()
    {
        $date = date("mdY");
        $post = $this->input->post();
        $this->id =  str_shuffle($date);
        $this->link =  $post["link"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id =  $post["id"];
        $this->link =  $post["link"];
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ['id' => $id])->row();
    }
}
