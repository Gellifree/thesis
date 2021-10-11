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
    $this->db->select('t.id, t.nev, t.statusz, s.nev statusz_nev, t.osztondij');
    $this->db->from('tag t');
    $this->db->join('statusz s', 's.id = t.statusz', 'inner');
    $this->db->order_by('t.nev', 'asc');

    return $this->db->get()->result();
  }

  public function insert($nev, $osztondij, $email, $tagsag_kezdete, $status_id, $aktiv) {
    $record = [
      'nev'             => $nev,
      'osztondij'       => $osztondij,
      'e_mail'          => $email,
      'tagsag_kezdete'  => $tagsag_kezdete,
      'statusz'         => $status_id,
      'aktiv'           => $aktiv
    ];

    $this->db->insert('tag', $record);
    return $this->db->insert_id();
  }

}
