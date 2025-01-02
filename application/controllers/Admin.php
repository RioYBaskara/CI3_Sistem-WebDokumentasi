<?php
defined('BASEPATH') or exit('No direct script access allowed');

// intelephense error
/**
 *  @property session $session 
 *  @property input $input 
 *  @property form_validation $form_validation 
 *  @property M_User $M_User 
 *  @property M_Content $M_Content 
 *  @property M_MenuAdmin $M_MenuAdmin 
 *  @property M_Fasyankes $M_Fasyankes 
 */

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/M_Fasyankes');
        $this->load->model('admin/M_User');
        $this->load->model('admin/M_MenuAdmin');
        $this->load->model('admin/M_Content');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->IsLoggedIn();

        redirect('Admin/dashboard');
    }

    public function login()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('Admin/dashboard');
        }
        $this->load->view('admin/login_view');
    }

    public function loginProcess()
    {
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        // note:bisa diupgrade pakai db kalau mau lebih aman
        $attempts = $this->session->userdata('login_attempts') ?? 0;
        $last_attempt_time = $this->session->userdata('last_attempt_time') ?? 0;

        $cooldown_period = 300;  // 5 menit

        if ($attempts >= 5 && (time() - $last_attempt_time) < $cooldown_period) {
            $remaining_time = $cooldown_period - (time() - $last_attempt_time);
            $this->session->set_flashdata('error', 'Terlalu banyak percobaan login. Silakan coba lagi dalam ' . ceil($remaining_time / 60) . ' menit.');
            redirect('Admin/login');
        }

        if ((time() - $last_attempt_time) >= $cooldown_period) {
            $this->session->unset_userdata('login_attempts');
            $this->session->unset_userdata('last_attempt_time');
            $attempts = 0;
        }

        // login
        $user = $this->M_User->getUserByUsername($username);
        if ($user && password_verify($password, $user['user_password'])) {
            $this->session->unset_userdata('login_attempts');
            $this->session->unset_userdata('last_attempt_time');

            $this->session->set_userdata([
                'user_id' => $user['user_id'],
                'user_nm' => $user['user_nm'],
                'user_role' => $user['user_role'],
                'logged_in' => TRUE,
            ]);
            $this->session->set_flashdata('success', 'Berhasil Login, selamat datang ' . $user['user_nm'] . '!');
            redirect('Admin/dashboard');
        } else {
            $this->session->set_userdata('login_attempts', $attempts + 1);
            $this->session->set_userdata('last_attempt_time', time());

            $this->session->set_flashdata('error', 'Username atau password salah');
            redirect('Admin/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Admin/login');
    }

    public function IsLoggedIn()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('Admin/login');
        }
    }

    public function dashboard()
    {
        $this->IsLoggedIn();

        // Ambil data fasyankes dari model
        $data['fasyankes'] = $this->M_Fasyankes->getAllFasyankes();

        // var_dump($data);
        // die;
        // Load view dan passing data
        $this->load->view('admin/dashboard', $data);
    }

    // fasyankes crud
    // Method untuk tambah data fasyankes
    public function tambahFasyankes()
    {
        $this->IsLoggedIn();

        $this->form_validation->set_rules('fasyankes_kode', 'Kode Fasyankes', 'required');
        $this->form_validation->set_rules('fasyankes_tipe', 'Tipe Fasyankes', 'required');
        $this->form_validation->set_rules('fasyankes_nm', 'Nama Fasyankes', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/dashboard');
        } else {
            $data = [
                'fasyankes_kode' => $this->input->post('fasyankes_kode', true),
                'fasyankes_tipe' => $this->input->post('fasyankes_tipe', true),
                'fasyankes_nm' => $this->input->post('fasyankes_nm', true),
                'fasyankes_bpjs_kode' => $this->input->post('fasyankes_bpjs_kode', true),
                'fasyankes_alamat_lengkap' => $this->input->post('fasyankes_alamat_lengkap', true),
                'active_st' => $this->input->post('active_st', true),
                'created_at' => date('Y-m-d H:i:s')
            ];

            if ($this->M_Fasyankes->insertFasyankes($data)) {
                $this->session->set_flashdata('success', 'Fasyankes berhasil ditambahkan.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan fasyankes.');
            }

            redirect('admin/dashboard');
        }
    }

    // Method untuk edit data fasyankes
    public function editFasyankes()
    {
        $this->IsLoggedIn();

        $this->form_validation->set_rules('fasyankes_kode', 'Kode Fasyankes', 'required');
        $this->form_validation->set_rules('fasyankes_tipe', 'Tipe Fasyankes', 'required');
        $this->form_validation->set_rules('fasyankes_nm', 'Nama Fasyankes', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/dashboard');
        } else {
            $fasyankes_kode = $this->input->post('fasyankes_kode', true);
            $data = [
                'fasyankes_tipe' => $this->input->post('fasyankes_tipe', true),
                'fasyankes_nm' => $this->input->post('fasyankes_nm', true),
                'fasyankes_bpjs_kode' => $this->input->post('fasyankes_bpjs_kode', true),
                'fasyankes_alamat_lengkap' => $this->input->post('fasyankes_alamat_lengkap', true),
                'active_st' => $this->input->post('active_st', true),
                'deleted_st' => $this->input->post('deleted_st', true) ? $this->input->post('deleted_st', true) : 0,
                'updated_at' => date('Y-m-d H:i:s')
            ];

            if ($this->M_Fasyankes->updateFasyankes($fasyankes_kode, $data)) {
                $this->session->set_flashdata('success', 'Fasyankes berhasil diupdate.');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengupdate fasyankes.');
            }

            redirect('admin/dashboard');
        }
    }


    // halaman dokumentasi
    public function dokumentasi($fasyankes_kode = null, $menu_url = null)
    {
        $this->IsLoggedIn();

        // Pastikan fasyankes_kode tersedia
        if ($fasyankes_kode == null) {
            // Menangani jika fasyankes_kode tidak ditemukan
            redirect('admin/dashboard');
        }

        // Ambil data menu berdasarkan fasyankes_kode
        $menu_data = $this->M_MenuAdmin->getMenuByFasyankesKode($fasyankes_kode);

        // Jika $menu_url kosong, arahkan ke menu pertama berdasarkan urutan
        if ($menu_url == null) {
            // Cari menu pertama berdasarkan urutan
            $first_menu = $this->M_MenuAdmin->getFirstMenuByFasyankesKode($fasyankes_kode);

            if ($first_menu) {
                // Redirect ke menu pertama
                redirect('admin/dokumentasi/' . $fasyankes_kode . '/' . $first_menu['menu_link']);
            }
        }

        // Ambil data menu berdasarkan fasyankes_kode
        $menu_data = $this->M_MenuAdmin->getMenuByFasyankesKode($fasyankes_kode);

        // get konten dand detail by menu_url
        $content_data = null;
        $menu_detail = null;
        $breadcrumb = [];

        if ($menu_url != null) {
            $menu_detail = $this->M_MenuAdmin->getMenuByUrl($menu_url, $fasyankes_kode);

            if ($menu_detail) {
                $content_data = $this->M_Content->getContentByMenuId($menu_detail['menu_id']);
                $breadcrumb = $this->M_MenuAdmin->getMenuBreadcrumb($menu_detail['menu_id']);
            }
        }

        // Menyiapkan data untuk view
        $data = [
            'menu_data' => $menu_data,
            'content_data' => $content_data,
            'menu_detail' => $menu_detail,
            'breadcrumb' => $breadcrumb,
            'user_role' => $this->session->userdata('user_role'),
            'fasyankes_kode' => $fasyankes_kode,
            'menu_url' => $menu_url
        ];

        // echo '<pre>';
        // var_dump($data['breadcrumb']);
        // echo '</pre>';
        // die;

        // Load views
        $this->load->view('admin/dokumentasi/header', $data);
        $this->load->view('admin/dokumentasi/sidebar', $data);
        $this->load->view('admin/dokumentasi/navbar', $data);
        $this->load->view('admin/dokumentasi/wrapper', $data);
        $this->load->view('admin/dokumentasi/modal', $data);
        $this->load->view('admin/dokumentasi/footer', $data);
    }

    // content
    public function saveContent()
    {
        $this->IsLoggedIn();

        $content_id = $this->input->post('content_id');
        $menu_id = $this->input->post('menu_id');
        $content_body = $this->input->post('content_body');

        if (empty($content_id)) {
            $result = $this->M_Content->insertContent([
                'menu_id' => $menu_id,
                'content_body' => $content_body,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        } else {
            $result = $this->M_Content->updateContent($content_id, [
                'content_body' => $content_body,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        if ($result) {
            $this->session->set_flashdata('success', 'Konten berhasil disimpan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menyimpan konten.');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function upload_image()
    {
        // Konfigurasi upload gambar
        $config['upload_path'] = './assets/img/content/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048;  // Maksimal 2MB
        $config['file_name'] = time() . '-' . $_FILES['file']['name'];

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file')) {
            // Jika upload gagal
            echo json_encode(['success' => false, 'error' => $this->upload->display_errors()]);
        } else {
            // Jika upload berhasil
            $upload_data = $this->upload->data();
            $image_url = base_url('assets/img/content/' . $upload_data['file_name']);
            echo json_encode(['success' => true, 'image_url' => $image_url]);
        }
    }

    // menu
    // Method untuk menambah menu
    public function addMenu()
    {
        $this->IsLoggedIn();

        $this->form_validation->set_rules('menu_nm', 'Nama Menu', 'required');
        $this->form_validation->set_rules('menu_type', 'Jenis Menu', 'required|in_list[content,dropdown]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/dokumentasi/' . $this->input->post('fasyankes_kode'));
        } else {

            $menu_nm = $this->input->post('menu_nm', true);
            $menu_type = $this->input->post('menu_type', true);
            $menu_link = $this->input->post('menu_link', true) ?: '#';
            $fasyankes_kode = $this->input->post('fasyankes_kode', true);
            $menu_order = $this->input->post('menu_order', true);
            $active_st = $this->input->post('active_st', true);

            $data = [
                'menu_nm' => $menu_nm,
                'menu_type' => $menu_type,
                'menu_link' => $menu_link,
                'fasyankes_kode' => $fasyankes_kode,
                'menu_order' => $menu_order,
                'active_st' => $active_st,
                'created_at' => date('Y-m-d H:i:s'),
            ];

            // echo '<pre>';
            // var_dump($data);
            // echo '</pre>';
            // die;

            $this->M_MenuAdmin->insertMenu($data);

            $this->session->set_flashdata('success', 'Menu berhasil ditambahkan!');

            return redirect('admin/dokumentasi/' . $this->input->post('fasyankes_kode'));
        }
    }

    public function addSubmenu()
    {
        $this->IsLoggedIn();

        // Validasi input dari form
        $this->form_validation->set_rules('menu_nm', 'Nama Menu', 'required');
        $this->form_validation->set_rules('menu_type', 'Jenis Menu', 'required|in_list[content,dropdown]');
        $this->form_validation->set_rules('menu_parent_id', 'Parent Menu', 'required|integer');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/dokumentasi/' . $this->input->post('fasyankes_kode'));
        } else {
            // Data yang diterima dari form
            $data = [
                'menu_nm' => $this->input->post('menu_nm', true),
                'menu_type' => $this->input->post('menu_type', true),
                'menu_parent_id' => $this->input->post('menu_parent_id', true),
                'menu_link' => $this->input->post('menu_link', true) ?: '#',
                'fasyankes_kode' => $this->input->post('fasyankes_kode', true),
                'active_st' => 1, // Default aktif
                'created_at' => date('Y-m-d H:i:s')
            ];

            // echo '<pre>';
            // var_dump($data);
            // echo '</pre>';
            // die;

            $this->M_MenuAdmin->insertMenu($data);

            $this->session->set_flashdata('success', 'Submenu berhasil ditambahkan!');

            redirect('admin/dokumentasi/' . $this->input->post('fasyankes_kode'));
        }
    }


    public function getParentMenus($fasyankes_kode)
    {
        $this->IsLoggedIn();

        $parentMenus = $this->M_MenuAdmin->getParentMenus($fasyankes_kode);
        echo json_encode($parentMenus);
    }


    // Method untuk mengedit menu
    public function editMenu()
    {
        $this->IsLoggedIn();

        $this->form_validation->set_rules('menu_nm', 'Nama Menu', 'required');
        $this->form_validation->set_rules('menu_type', 'Jenis Menu', 'required|in_list[content,dropdown]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/dokumentasi/' . $this->input->post('fasyankes_kode'));
        } else {

            $data = [
                'menu_id' => $this->input->post('menu_id', true),
                'menu_nm' => $this->input->post('menu_nm', true),
                'menu_type' => $this->input->post('menu_type', true),
                'menu_order' => $this->input->post('menu_order', true),
                'menu_link' => $this->input->post('menu_link', true) ?: '#',
                'active_st' => $this->input->post('active_st', true),
                'updated_at' => date('Y-m-d H:i:s', true)
            ];

            $this->M_MenuAdmin->editMenu($data);

            $this->session->set_flashdata('success', 'Menu berhasil diedit!');

            redirect('admin/dokumentasi/' . $this->input->post('fasyankes_kode'));
        }
    }

    // Method untuk menghapus menu
    public function deleteMenu($menu_id, $fasyankes_kode)
    {
        $this->IsLoggedIn();

        $this->M_MenuAdmin->deleteMenu($menu_id);

        $fasyankes_kode = $this->uri->segment(4);

        $this->session->set_flashdata('success', 'Menu berhasil dihapus!');

        redirect('admin/dokumentasi/' . $fasyankes_kode);
    }

}
