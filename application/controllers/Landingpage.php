<?php
defined('BASEPATH') or exit('No direct script access allowed');

class landingpage extends CI_Controller
{
    public function index()
    {
        $this->load->view('Landingpage/index');
    }
}
