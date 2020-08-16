<?php

class Euclidean_model extends CI_Model
{
    public function getLokasi($tanggal, $jam)
    {
        // return $this->db->get('lokasi')->result_array();
        $this->db->select('*');
        $this->db->from('lokasi_table');
        $this->db->where('tanggal', $tanggal);
        $this->db->like('waktu', $jam);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getLokasi2($tanggal, $npp)
    {
        // return $this->db->get('lokasi')->result_array();
        $this->db->select('*');
        $this->db->from('lokasi_table');
        $this->db->where('tanggal', $tanggal);
        $this->db->like('npp', $npp);
        $query = $this->db->get();

        return $query->result_array();
    }
}
