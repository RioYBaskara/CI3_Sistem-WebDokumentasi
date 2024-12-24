<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Menu extends CI_Model
{
    // Mengambil menu berdasarkan fasyankes_kode
    public function getMenuByFasyankesKode($fasyankes_kode)
    {
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->where('fasyankes_kode', $fasyankes_kode);
        $this->db->where('active_st', 1); // Hanya yang aktif
        $this->db->order_by('menu_order', 'ASC'); // Urutkan berdasarkan menu_order
        $query = $this->db->get();
        return $query->result_array();
    }

    // Mengambil konten berdasarkan submenu dan fasyankes_kode
    public function getContentBySubmenu($submenu, $fasyankes_kode)
    {
        $this->db->select('content_body');
        $this->db->from('content');
        $this->db->join('menu', 'menu.menu_id = content.menu_id');
        $this->db->where('menu.menu_nm', $submenu);
        $this->db->where('menu.fasyankes_kode', $fasyankes_kode);
        $this->db->where('menu.active_st', 1);
        $query = $this->db->get();
        return $query->row_array();
    }
}
