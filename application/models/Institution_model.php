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
        $this->db->select('i.id, i.nev, i.megye, i.telefon, m.nev megye_nev');
        $this->db->from('intezmeny i');
        $this->db->join('megye m', 'm.id = i.id', 'inner');
        $this->db->order_by('i.nev', 'asc');

        return $this->db->get()->result();

        // TODO: Listázó nézettel valami gond van, adatbázis lekérdezésnél
    }

    public function get_one($id) {
        $this->db->select('i.id, i.nev, i.megye, i.cim, i.igazgato_neve, i.e_mail, i.telefon, i.weboldal, i.aktiv');
        $this->db->from('intezmeny i');
        $this->db->where('id', $id);

        return $this->db->get()->row();
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('intezmeny');
    }

    public function insert($nev, $megye, $cim, $igazgato_neve, $email, $telefon, $weboldal) {
      $record = [
        'nev'             => $nev,
        'megye'           => $megye,
        'cim'             => $cim,
        'igazgato_neve'   => $igazgato_neve,
        'e_mail'          => $email,
        'weboldal'        => $weboldal,
        'aktiv'           => $aktiv,
        'telefon'         => $telefon,
        'aktiv'           => 1
      ];

      $this->db->insert('intezmeny', $record);
      return $this->db->insert_id();
    }
}
