<?php

class Punctuality extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Lokasi_model');
    }

    public function eksekusi($tanggal, $npp)
    {
        $data['karyawan'] = $this->Lokasi_model->getLokasi2($tanggal, $npp);
        $data['npp'] = $npp;
        $data['tanggal'] = $tanggal;

        $this->load->view('templates/header');
        $this->load->view('punctuality/eksekusi', $data);
        $this->load->view('templates/footer');
    }

    public function excel($tanggal, $npp)
    {
        $data['karyawan'] = $this->Lokasi_model->getLokasi2($tanggal, $npp);
        $data['npp'] = $npp;
        $data['tanggal'] = $tanggal;
        $this->load->view('punctuality/excel', $data);
    }
}
