<?php

class Distancematrix extends CI_Controller
{

    public function distance()
    {
        $this->load->view('maps_api/distancematrix');
    }

    public function haversine()
    {
        $this->load->view('maps_api/haversine');
    }
}
