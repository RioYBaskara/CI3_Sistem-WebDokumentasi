<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tesdata extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_Tesdata');
    }

    public function index()
    {

        $data['mobil'] = $this->M_Tesdata->GetMobil();

        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        die;

        $this->load->view('tes', $data);
    }
}
