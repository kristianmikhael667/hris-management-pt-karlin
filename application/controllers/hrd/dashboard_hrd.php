<?php

class Dashboard_hrd extends CI_Controller{

    public function index()
    {
        $this->load->view('template_hrd/header');
        $this->load->view('template_hrd/sidebar');
        $this->load->view('hrd/dashboard_hrd');
        $this->load->view('template_hrd/footer');
    }
}