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
        $this->db->select('i.id, i.nev, i.megye, i.telefon');
        $this->db->from('intezmeny i');
        $this->db->where('i.aktiv', 1);
        $this->db->order_by('i.nev', 'asc');

        return $this->db->get()->result();
    }

    public function get_one($id) {
        $this->db->select('i.id, i.nev, i.megye, i.cím, i.igazgató_neve, i.e_mail, i.telefon, i.weboldal, i.aktiv');
        $this->db->from('intezmeny i');
        $this->db->where('id', $id);
        $this->db->where('aktiv', 1);

        return $this->db->get()->row();
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->where('aktiv', 1);
        return $this->db->delete('intezmeny');
    }
}
