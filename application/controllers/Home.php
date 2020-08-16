<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Karyawan_model');
    }

    public function daftarKaryawan()
    {
        $data['karyawan'] = $this->Karyawan_model->tampilSemuaKaryawan();

        $this->load->view('templates/header');
        $this->load->view('karyawan/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambahKaryawan()
    {
        if (!isset($_POST['submit'])) {
            $this->load->view('templates/header');
            $this->load->view('karyawan/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Karyawan_model->tambahDataKaryawan();
            redirect('home/daftarkaryawan');
        }
    }

    public function ubahKaryawan($id)
    {
        if (!isset($_POST['submit'])) {
            $data['karyawan'] = $this->Karyawan_model->pilihKaryawan($id);
            $this->load->view('templates/header');
            $this->load->view('karyawan/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Karyawan_model->ubahDataKaryawan();
            redirect('home/daftarKaryawan');
        }
    }

    public function hapusKaryawan($id)
    {
        $this->Karyawan_model->hapusKaryawan($id);
        redirect('home/daftarKaryawan');
    }

    public function waktu()
    {
        $this->load->view('templates/header');
        $this->load->view('home/waktu');
        $this->load->view('templates/footer');
    }

    public function npp()
    {
        $this->load->view('templates/header');
        $this->load->view('home/npp');
        $this->load->view('templates/footer');
    }

    public function punctuality()
    {
        $this->load->view('templates/header');
        $this->load->view('home/punc_npp');
        $this->load->view('templates/footer');
    }

    public function comparison()
    {
        $this->load->view('templates/header');
        $this->load->view('home/compare_npp');
        $this->load->view('templates/footer');
    }

    public function tigametode()
    {
        $this->load->view('templates/header');
        $this->load->view('home/tigametode_npp');
        $this->load->view('templates/footer');
    }
}
