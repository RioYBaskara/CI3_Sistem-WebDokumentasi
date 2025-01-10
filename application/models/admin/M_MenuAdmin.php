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

        // Mengurutkan berdasarkan menu_order dan parent_id
        $this->db->order_by('menu.menu_parent_id', 'ASC');
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

    public function getMenuByUrl($menu_url, $fasyankes_kode)
    {
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->where('menu_link', $menu_url);
        $this->db->where('fasyankes_kode', $fasyankes_kode);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function getFasyankesByFasyankesKode($fasyankes_kode)
    {
        $this->db->select('*');
        $this->db->from('fasyankes');
        $this->db->where('fasyankes_kode', $fasyankes_kode);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function getMenuBreadcrumb($menu_id)
    {
        $breadcrumb = [];
        while ($menu_id) {
            $this->db->select('menu_id, menu_nm, menu_link, menu_parent_id');
            $this->db->from('menu');
            $this->db->where('menu_id', $menu_id);
            $menu = $this->db->get()->row_array();

            if ($menu) {
                $breadcrumb[] = $menu;
                $menu_id = $menu['menu_parent_id'];
            } else {
                break;
            }
        }

        // Urutkan breadcrumb dari root ke child
        return array_reverse($breadcrumb);
    }

    public function getFirstMenuContentByFasyankesKode($fasyankes_kode)
    {
        // Ambil menu pertama berdasarkan fasyankes_kode dan urutan menu
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->where('fasyankes_kode', $fasyankes_kode);
        $this->db->where('menu_type', 'content');
        $this->db->order_by('menu_order', 'ASC'); // Mengurutkan berdasarkan menu_order
        $this->db->limit(1); // Ambil hanya 1 menu pertama

        $query = $this->db->get();
        return $query->row_array(); // Mengembalikan data menu pertama
    }

    public function getParentMenus($fasyankes_kode)
    {
        return $this->db->table('menu')
            ->where('menu_parent_id', null)
            ->where('fasyankes_kode', $fasyankes_kode)
            ->get()
            ->getResultArray();
    }

    public function searchMenuByFasyankes($keyword, $fasyankes_kode)
    {
        $this->db->select('menu_id, menu_nm, menu_link');
        $this->db->from('menu');
        $this->db->where('fasyankes_kode', $fasyankes_kode);
        $this->db->where("menu_nm ILIKE '%" . $this->db->escape_like_str($keyword) . "%'", NULL, FALSE);
        $this->db->where('active_st', 1);
        $this->db->where('menu_type', 'content');
        $query = $this->db->get();

        return $query->result_array();
    }

    // menu order last
    public function getLastMenuOrder($menu_parent_id, $fasyankes_kode)
    {
        $this->db->select_max('menu_order');
        $this->db->where('fasyankes_kode', $fasyankes_kode);

        if (empty($menu_parent_id) || $menu_parent_id === null) {
            $this->db->where('menu_parent_id IS NULL');
        } else {
            $this->db->where('menu_parent_id', $menu_parent_id);
        }

        $query = $this->db->get('menu');
        $result = $query->row_array();

        return isset($result['menu_order']) ? $result['menu_order'] : 0;
    }

    // Method untuk menambah menu
    public function insertMenu($data)
    {
        $this->db->insert('menu', $data);
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
