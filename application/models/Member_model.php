<?php

/*
* @author Kovács Norbert
*/

class Member_model extends CI_Model {
  public function __construct() {
    parent::__construct();

    $this->load->database();
  }

  public function get_list() {
    $this->db->select('t.id, t.nev, t.statusz, t.osztondij');
    $this->db->from('tag t');
    $this->db->order_by('t.nev', 'asc');

    return $this->db->get()->result();
  }
}
