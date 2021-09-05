<?php

/*
* @author Kovács Norbert
*/

class County_model extends CI_Model {
    public function __construct() {
        parent::__construct();

        $this->load->database();
    }

    public function get_list() {
        $this->db->select('m.id, m.megnevezes');
        $this->db->from('megye m');
        $this->db->order_by('m.megnevezes', 'asc');

        return $this->db->get()->result();
    }

    public function get_one($id) {
        $this->db->select('m.id, m.megnevezes');
        $this->db->from('megye m');
        $this->db->where('id', $id);

        return $this->db->get()->row();
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('megye');
    }
}
