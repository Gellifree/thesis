<?php

/*
* @author Kovács Norbert
*/
class Holds_model extends CI_Model {
  public function __construct() {
      parent::__construct();

      $this->load->database();
  }

  public function get_presentation_list($member_id) {
    $this->db->select('t.eloadas, t.tag, e.nev eloadas_nev');
    $this->db->from('tartja t');
    $this->db->join('eloadas e', 'e.id = t.eloadas', 'inner');
    $this->db->where('t.tag', $member_id);
    //orderby
    return $this->db->get()->result();
  }
}
