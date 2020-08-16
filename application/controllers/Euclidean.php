<?php

class Euclidean extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Euclidean_model');
    }

    public function hitung($tanggal, $jam, $metode)
    {
        $data['lokasi'] = $this->Euclidean_model->getLokasi($tanggal, $jam);
        $data['jam'] = $jam;
        $data['tanggal'] = $tanggal;
        $data['metode'] = $metode;
        $this->load->view('templates/header');
        $this->load->view('euclidean/hitung', $data);
        $this->load->view('templates/footer');
    }

    public function hitung2($tanggal, $npp, $metode)
    {
        $data['lokasi'] = $this->Euclidean_model->getLokasi2($tanggal, $npp);
        $data['npp'] = $npp;
        $data['tanggal'] = $tanggal;
        $data['metode'] = $metode;
        $this->load->view('templates/header');
        $this->load->view('euclidean/hitung2', $data);
        $this->load->view('templates/footer');
    }
}
