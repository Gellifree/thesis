<?php

/*
* @author Kovács Norbert
*/

class Institution_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function get_list()
    {
        $this->db->select('i.id, i.nev, i.megye, i.telefon, m.nev megye_nev');
        $this->db->from('intezmeny i');
        $this->db->join('megye m', 'm.id = i.megye', 'inner');
        $this->db->order_by('i.nev', 'asc');

        return $this->db->get()->result();
    }

    public function get_one($id)
    {
        $this->db->select('i.id, i.nev, i.megye, i.cim, i.igazgato_neve, i.e_mail, i.telefon, i.weboldal, i.aktiv, m.nev megye_nev');
        $this->db->from('intezmeny i');
        $this->db->join('megye m', 'i.megye = m.id', 'inner');
        $this->db->where('i.id', $id);

        return $this->db->get()->row();
    }

    public function get_presentations($institution_id)
    {
        $this->db->select('i.id, e.id eloadas_id, e.nev eloadas_nev');
        $this->db->from('intezmeny i');
        $this->db->join('eloadas e', 'i.id = e.iskola', 'inner');
        $this->db->where('i.id', $institution_id);

        return $this->db->get()->result();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('intezmeny');
    }

    public function insert($nev, $megye, $cim, $igazgato_neve, $email, $telefon, $weboldal)
    {
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


    public function update($id, $nev, $megye, $cim, $igazgato_neve, $email, $telefon, $weboldal)
    {
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

        $this->db->where('id', $id);
        return $this->db->update('intezmeny', $record);
    }
}
