<?php

class Tigametode extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Lokasi_model');
        $this->load->model('Manual_model');
        $this->load->model('Selisih_model');
    }


    public function hitung($tanggal, $npp)
    {
        $data['lokasi'] = $this->Lokasi_model->getLokasi2($tanggal, $npp);
        $data['npp'] = $npp;
        $data['tanggal'] = $tanggal;
        $this->load->view('templates/header');
        $this->load->view('tigametode/hitung', $data);
        $this->load->view('templates/footer');
    }

    public function excel($tanggal, $npp)
    {
        $data['karyawan'] = $this->Lokasi_model->getLokasi2($tanggal, $npp);
        $data['npp'] = $npp;
        $data['tanggal'] = $tanggal;
        $this->load->view('tigametode/excel', $data);
    }

    public function hasilManual()
    {
        $data['manual'] = $this->Manual_model->getHasil();
        $this->load->view('templates/header');
        $this->load->view('tigametode/hasil_manual', $data);
        $this->load->view('templates/footer');
    }

    public function hasilManualExcel()
    {
        $data['manual'] = $this->Manual_model->getHasil();
        $this->load->view('tigametode/hasil_manual_excel', $data);
    }

    public function selisih()
    {
        $data['selisih'] = $this->Selisih_model->getData();
        $this->load->view('templates/header');
        $this->load->view('tigametode/selisih', $data);
        $this->load->view('templates/footer');
    }
}
