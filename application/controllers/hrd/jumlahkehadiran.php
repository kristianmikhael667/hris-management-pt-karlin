<?php

class Jumlahkehadiran extends CI_Controller{

    public function index()
    {
        $this->load->view('template_hrd/header');
        $this->load->view('template_hrd/sidebar');
        $this->load->view('hrd/jumlah_kehadiran');
        $this->load->view('template_hrd/footer');
    }
}