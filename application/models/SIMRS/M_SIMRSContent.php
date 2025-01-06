<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_SIMRSContent extends CI_Model
{
    // Mendapatkan konten berdasarkan content_id
    public function getContentById($content_id)
    {
        $this->db->select('*');
        $this->db->from('content');
        $this->db->where('content_id', $content_id);
        $query = $this->db->get();

        return $query->row_array();
    }

    // Mendapatkan konten berdasarkan menu_id (opsional jika perlu)
    public function getContentByMenuId($menu_id)
    {
        $this->db->select('*');
        $this->db->from('content');
        $this->db->where('menu_id', $menu_id);
        $query = $this->db->get();

        return $query->row_array();
    }
}
