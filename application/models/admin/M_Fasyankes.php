<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Fasyankes extends CI_Model
{
    public function insertFasyankes($data)
    {
        return $this->db->insert('fasyankes', $data);
    }

    public function updateFasyankes($fasyankes_kode, $data)
    {
        $this->db->where('fasyankes_kode', $fasyankes_kode);
        return $this->db->update('fasyankes', $data);
    }

    public function getCountFasyankes()
    {
        $this->db->where('deleted_st', 0);
        $query = $this->db->get('fasyankes');
        return $query->num_rows();
    }

    public function getAllFasyankes($limit, $offset)
    {
        $this->db->where('deleted_st', 0);
        $this->db->order_by('created_at', 'ASC');
        $query = $this->db->get('fasyankes', $limit, $offset);
        return $query->result_array();
    }

    public function getFasyankesByKode($kode)
    {
        return $this->db->get_where('fasyankes', ['fasyankes_kode' => $kode, 'deleted_st' => 0])->row_array();
    }
}
