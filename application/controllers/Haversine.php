<?php

class Haversine extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Haversine_model');
    }

    public function hitung($tanggal, $jam, $metode)
    {
        $data['lokasi'] = $this->Haversine_model->getLokasi($tanggal, $jam);
        $data['tanggal'] = $tanggal;
        $data['jam'] = $jam;
        $data['metode'] = $metode;

        $this->load->view('templates/header');
        $this->load->view('haversine/hitung', $data);
        $this->load->view('templates/footer');
    }

    public function hitung2($tanggal, $npp, $metode)
    {
        $data['lokasi'] = $this->Haversine_model->getLokasi2($tanggal, $npp);
        $data['tanggal'] = $tanggal;
        $data['npp'] = $npp;
        $data['metode'] = $metode;

        $this->load->view('templates/header');
        $this->load->view('haversine/hitung2', $data);
        $this->load->view('templates/footer');
    }
}
