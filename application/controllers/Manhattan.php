<?php

class Manhattan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Manhattan_model');
    }

    public function hitung($tanggal, $jam, $metode)
    {
        $data['lokasi'] = $this->Manhattan_model->getLokasi($tanggal, $jam);
        $data['jam'] = $jam;
        $data['tanggal'] = $tanggal;
        $data['metode'] = $metode;

        $this->load->view('templates/header');
        $this->load->view('manhattan/hitung', $data);
        $this->load->view('templates/footer');
    }

    public function hitung2($tanggal, $npp, $metode)
    {
        $data['lokasi'] = $this->Manhattan_model->getLokasi2($tanggal, $npp);
        $data['npp'] = $npp;
        $data['tanggal'] = $tanggal;
        $data['metode'] = $metode;

        $this->load->view('templates/header');
        $this->load->view('manhattan/hitung2', $data);
        $this->load->view('templates/footer');
    }
}
