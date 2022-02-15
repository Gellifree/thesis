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
    $this->db->select('e.id, e.nev, e.idopont, e.allapot, e.iskola');
    $this->db->from('eloadas e');
    $this->db->order_by('e.nev', 'asc');

    return $this->db->get()->result();
  }

  public function get_one($id) {
    $this->db->select('e.id, e.nev, e.idopont, e.allapot, e.iskola, i.nev intezmeny_nev');
    $this->db->from('eloadas e');
    $this->db->join('intezmeny i', 'i.id = e.iskola', 'inner');
    $this->db->where('e.id', $id);

    return $this->db->get()->row();
  }

  public function insert($nev, $idopont, $allapot, $iskola) {
    $record = [
      'nev'           => $nev,
      'idopont'       => $idopont,
      'allapot'       => $allapot,
      'iskola'        => $iskola
    ];

    $this->db->insert('eloadas', $record);
    return $this->db->insert_id();
  }

  public function update($id, $nev, $idopont, $allapot, $iskola) {
    $record = [
      'nev'           => $nev,
      'idopont'       => $idopont,
      'allapot'       => $allapot,
      'iskola'        => $iskola
    ];

    $this->db->where('id', $id);
    return $this->db->update('eloadas', $record);
  }

  public function delete($id) {
      $this->db->where('id', $id);
      return $this->db->delete('eloadas');
  }

}
