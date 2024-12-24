<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Content extends CI_Model
{

    // Fungsi untuk mengambil konten berdasarkan menu_id
    public function getContentByMenuId($menu_id)
    {
        $this->db->select('content_id, content_body, menu_id');
        $this->db->from('content');
        $this->db->where('menu_id', $menu_id);
        $query = $this->db->get();
        return $query->row_array(); // Mengembalikan konten pertama yang ditemukan
    }

    // Fungsi untuk mengambil konten berdasarkan fasyankes_kode dan menu_type (jika menu adalah "content")
    public function getContentByFasyankes($fasyankes_kode)
    {
        $this->db->select('menu_id, menu_nm, menu_type, menu_link');
        $this->db->from('menu');
        $this->db->where('fasyankes_kode', $fasyankes_kode);
        $this->db->where('menu_type', 'content'); // Memastikan hanya menu dengan tipe content yang diambil
        $this->db->order_by('menu_order', 'ASC'); // Urutkan berdasarkan menu_order
        $query = $this->db->get();
        return $query->result_array(); // Mengembalikan semua menu yang tipe "content"
    }

    // Fungsi untuk mengambil submenu (dropdown) berdasarkan parent menu_id
    public function getSubmenuByParentId($parent_id)
    {
        $this->db->select('menu_id, menu_nm, menu_type, menu_link');
        $this->db->from('menu');
        $this->db->where('menu_parent_id', $parent_id);
        $this->db->where('active_st', 1); // Pastikan hanya menu yang aktif
        $this->db->order_by('menu_order', 'ASC'); // Urutkan berdasarkan menu_order
        $query = $this->db->get();
        return $query->result_array(); // Mengembalikan semua submenu untuk parent_id
    }

    // Fungsi untuk menambahkan konten baru
    public function addContent($data)
    {
        $this->db->insert('content', $data);
        return $this->db->insert_id(); // Mengembalikan ID konten yang baru dimasukkan
    }

    // Fungsi untuk mengupdate konten berdasarkan content_id
    public function updateContent($content_id, $data)
    {
        $this->db->where('content_id', $content_id);
        return $this->db->update('content', $data); // Mengupdate konten dengan content_id yang sesuai
    }

    // Fungsi untuk menghapus konten berdasarkan content_id
    public function deleteContent($content_id)
    {
        $this->db->where('content_id', $content_id);
        return $this->db->delete('content'); // Menghapus konten dengan content_id yang sesuai
    }
}
