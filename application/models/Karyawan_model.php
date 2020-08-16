<?php

class Karyawan_model extends CI_Model
{
    public function tampilSemuaKaryawan()
    {
        return $this->db->get('user_table')->result_array();
    }

    public function tambahDataKaryawan()
    {
        $data = [
            'npp' => $this->input->post('npp'),
            'name' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('pw'), PASSWORD_DEFAULT)
        ];

        $this->db->insert('user_table', $data);
    }

    public function pilihKaryawan($id)
    {
        return $this->db->get_where('user_table', ['id' => $id])->row_array();
    }

    public function ubahDataKaryawan()
    {
        $data = [
            'id' => $this->input->post('id'),
            'npp' => $this->input->post('npp'),
            'name' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('pw'), PASSWORD_DEFAULT)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_table', $data);
    }

    public function hapusKaryawan($id)
    {
        $this->db->delete('user_table', ['id' => $id]);
    }
}
