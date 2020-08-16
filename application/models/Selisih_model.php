<?php

class Selisih_model extends CI_Model
{
    public function getData()
    {
        $this->db->select('*');
        $this->db->from('manual_table');

        $query = $this->db->get();
        return $query->result_array();
    }
}
