<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_MenuAdmin extends CI_Model
{
    // Mengambil menu berdasarkan fasyankes_kode
    public function getMenuByFasyankesKode($fasyankes_kode)
    {
        // Memilih semua kolom dari tabel menu
        $this->db->select('menu.*, parent.menu_nm as nama_parent');
        $this->db->from('menu');

        // Bergabung dengan tabel menu itu sendiri untuk mendapatkan nama parent berdasarkan menu_parent_id
        $this->db->join('menu as parent', 'parent.menu_id = menu.menu_parent_id', 'left');

        // Menambahkan filter untuk fasyankes_kode dan hanya memilih menu yang aktif
        $this->db->where('menu.fasyankes_kode', $fasyankes_kode);

        // Mengurutkan berdasarkan menu_order
        $this->db->order_by('menu.menu_order', 'ASC');

        // Eksekusi query
        $query = $this->db->get();

        // Mengambil hasil query
        $result = $query->result_array();

        // Menambahkan fasyankes_kode ke setiap item hasil query
        foreach ($result as &$menu) {
            $menu['fasyankes_kode'] = $fasyankes_kode; // Menambahkan fasyankes_kode ke setiap menu
        }

        // Mengembalikan hasil query dalam bentuk array
        return $result;
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

    // Method untuk menambah menu
    public function insertMenu($data)
    {
        $this->db->insert('menu', $data);
    }

    public function getParentMenus($fasyankes_kode)
    {
        return $this->db->table('menu')
            ->where('menu_parent_id', null)
            ->where('fasyankes_kode', $fasyankes_kode)
            ->get()
            ->getResultArray();
    }


    // Method untuk mengedit menu
    public function editMenu($data)
    {
        // Mengupdate data menu berdasarkan menu_id
        $this->db->where('menu_id', $data['menu_id']);
        $this->db->update('menu', $data);
    }

    // Method untuk menghapus menu
    public function deleteMenu($menu_id)
    {
        // Menghapus menu berdasarkan menu_id
        $this->db->where('menu_id', $menu_id);
        $this->db->delete('menu');
    }
}
