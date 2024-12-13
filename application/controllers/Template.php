<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Template extends CI_Controller
{
    public function index()
    {
        $this->load->view('Template/header');
        $this->load->view('Template/sidebar');
        $this->load->view('Template/navbar');
        $this->load->view('Template/wrapper');
        $this->load->view('Template/modal');
        $this->load->view('Template/footer');
    }
}
