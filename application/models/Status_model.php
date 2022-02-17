<?php

/*
* @author Kovács Norbert
*/

class Status_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function get_list()
    {
        $this->db->select('s.id, s.nev');
        $this->db->from('statusz s');
        $this->db->order_by('s.nev', 'asc');

        return $this->db->get()->result();
    }

    public function get_one($id)
    {
        $this->db->select('s.id, s.nev');
        $this->db->from('statusz s');
        $this->db->where('id', $id);

        return $this->db->get()->row();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('statusz');
    }

    public function insert($status_name)
    {
        $record = [
      'nev' => $status_name
    ];

        $this->db->insert('statusz', $record);
    }

    public function update($id, $nev)
    {
        $record = [
      'nev' => $nev
    ];

        $this->db->where('id', $id);
        return $this->db->update('statusz', $record);
    }
}
