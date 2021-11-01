<?php

/*
* @author Kovács Norbert
*/

class Presentation_model extends CI_Model {
  public function __construct() {
    parent::__construct();

    $this->load->database();
  }

  public function get_list() {
    $this->db->select('e.id, e.nev, e.idopont, e.egyeztetett, e.iskola');
    $this->db->from('eloadas e');
    $this->db->order_by('e.nev', 'asc');

    return $this->db->get()->result();
  }
}
