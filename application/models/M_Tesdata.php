<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Tesdata extends CI_Model
{

    public function GetMobil()
    {

        $sql = "SELECT * FROM cars";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}
