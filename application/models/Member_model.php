<?php

/*
* @author Kovács Norbert
*/

class Member_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function get_list()
    {
        $this->db->select('t.id, t.nev, t.statusz, s.nev statusz_nev, t.osztondij');
        $this->db->from('tag t');
        $this->db->join('statusz s', 's.id = t.statusz', 'inner');
        $this->db->order_by('t.nev', 'asc');

        return $this->db->get()->result();
    }

    public function get_one($id)
    {
        $this->db->select('t.id, t.nev, t.statusz, t.osztondij, t.e_mail, t.tagsag_kezdete, t.aktiv, s.nev statusz_nev');
        $this->db->from('tag t');
        $this->db->join('statusz s', 's.id = t.statusz', 'inner');
        $this->db->where('t.id', $id);

        return $this->db->get()->row();
    }

    public function insert($nev, $osztondij, $email, $tagsag_kezdete, $status_id, $aktiv)
    {
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

    public function update($id, $nev, $osztondij, $email, $tagsag_kezdete, $status_id, $aktiv)
    {
        $record = [
      'nev'             => $nev,
      'osztondij'       => $osztondij,
      'e_mail'          => $email,
      'tagsag_kezdete'  => $tagsag_kezdete,
      'statusz'         => $status_id,
      'aktiv'           => $aktiv
    ];

        $this->db->where('id', $id);
        return $this->db->update('tag', $record);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('tag');
    }
}
