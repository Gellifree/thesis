<?php

/*
* @author Kovács Norbert
*/

class Institution_model extends CI_Model {
    public function __construct() {
        parent::__construct();

        $this->load->database();
    }

    public function get_list() {
        $this->db->select('i.id, i.megnevezes, i.megye, i.telefon');
        $this->db->from('institution i');
        $this->db->where('i.aktiv', 1);
        $this->db->order_by('i.megnevezes', 'asc');

        return $this->db->get()->result();
    }
}
