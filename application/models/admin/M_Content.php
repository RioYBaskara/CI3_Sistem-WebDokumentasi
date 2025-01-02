<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Content extends CI_Model
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

    // add content baru
    public function insertContent($data)
    {
        return $this->db->insert('content', $data);
    }

    // update content
    public function updateContent($content_id, $data)
    {
        $this->db->where('content_id', $content_id);
        return $this->db->update('content', $data);
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
