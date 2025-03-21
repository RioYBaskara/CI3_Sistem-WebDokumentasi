<?php
defined('BASEPATH') or exit('No direct script access allowed');

// intelephense error
/**
 *  @property session $session 
 *  @property input $input 
 *  @property form_validation $form_validation 
 *  @property upload $upload 
 *  @property uri $uri 
 *  @property pagination $pagination 
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
        $this->load->helper('url');
        $this->load->library('upload');
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

        $limit = 6;

        $total_rows = $this->M_Fasyankes->getCountFasyankes();
        $data['total_rows'] = $total_rows;

        $this->load->library('pagination');

        $config['base_url'] = base_url('admin/dashboard');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $limit;
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = false;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $config['num_tag_open'] = '<li class="page-item digit-link">';
        $config['num_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['next_tag_open'] = '<li class="page-link">';
        $config['next_tag_close'] = '</li>';

        $config['prev_tag_open'] = '<li class="page-link">';
        $config['prev_tag_close'] = '</li>';

        $config['first_tag_open'] = '<li class="page-link">';
        $config['first_tag_close'] = '</li>';

        $config['last_tag_open'] = '<li class="page-link">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 6l6 6l-6 6"></path></svg>';
        $config['prev_link'] = '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 6l-6 6l6 6"></path></svg>';

        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['fasyankes'] = $this->M_Fasyankes->getAllFasyankes($config['per_page'], $page);

        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('admin/dashboard', $data);
    }

    // fasyankes crud
    // Method untuk tambah data fasyankes
    public function tambahFasyankes()
    {
        $this->IsLoggedIn();

        $this->form_validation->set_rules('fasyankes_kode', 'Kode Fasyankes', 'required|trim|is_unique[fasyankes.fasyankes_kode]', [
            'is_unique' => 'Kode Fasyankes telah terdaftar, Buat Kode Fasyankes yang berbeda!'
        ]);
        $this->form_validation->set_rules('fasyankes_tipe', 'Tipe Fasyankes', 'required|trim');
        $this->form_validation->set_rules('fasyankes_nm', 'Nama Fasyankes', 'required|trim|is_unique[fasyankes.fasyankes_nm]', [
            'is_unique' => 'Nama Fasyankes telah terdaftar, Buat Nama Fasyankes yang berbeda!'
        ]);

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


        $current_fasyankes_kode = $this->input->post('current_fasyankes_kode');
        $new_fasyankes_kode = $this->input->post('fasyankes_kode');

        if ($new_fasyankes_kode != $current_fasyankes_kode) {
            $this->form_validation->set_rules('fasyankes_kode', 'Kode Fasyankes', 'required|trim|is_unique[menu.fasyankes_kode]', [
                'is_unique' => 'Kode Fasyankes telah terdaftar, edit Kode Fasyankes yang berbeda!'
            ]);
        } else {
            $this->form_validation->set_rules('fasyankes_kode', 'Kode Fasyankes', 'required|trim');
        }

        $current_fasyankes_nm = $this->input->post('current_fasyankes_nm');
        $new_fasyankes_nm = $this->input->post('fasyankes_nm');

        if ($new_fasyankes_nm != $current_fasyankes_nm) {
            $this->form_validation->set_rules('fasyankes_nm', 'Nama Fasyankes', 'required|trim|is_unique[menu.fasyankes_nm]', [
                'is_unique' => 'Nama Fasyankes telah terdaftar, edit Nama Fasyankes yang berbeda!'
            ]);
        } else {
            $this->form_validation->set_rules('fasyankes_nm', 'Nama Fasyankes', 'required|trim');
        }

        $this->form_validation->set_rules('fasyankes_tipe', 'Tipe Fasyankes', 'required');

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
            $first_menu = $this->M_MenuAdmin->getFirstMenuContentByFasyankesKode($fasyankes_kode);

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

        // nama fasyankes
        $fasyankes_data = $this->M_MenuAdmin->getFasyankesByFasyankesKode($fasyankes_kode);

        // Menyiapkan data untuk view
        $data = [
            'menu_data' => $menu_data,
            'content_data' => $content_data,
            'menu_detail' => $menu_detail,
            'breadcrumb' => $breadcrumb,
            'user_role' => $this->session->userdata('user_role'),
            'fasyankes_kode' => $fasyankes_kode,
            'menu_url' => $menu_url,
            'fasyankes_data' => $fasyankes_data
        ];

        // echo '<pre>';
        // var_dump($data);
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

    // search, pakai ajax
    public function searchMenu()
    {
        $keyword = $this->input->post('keyword');
        $fasyankes_kode = $this->input->post('fasyankes_kode');

        if (empty($keyword) || empty($fasyankes_kode)) {
            echo json_encode([]);
            return;
        }

        $result = $this->M_MenuAdmin->searchMenuByFasyankes($keyword, $fasyankes_kode);

        echo json_encode($result);
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
            // Ambil konten lama
            $old_content = $this->M_Content->getContentById($content_id);
            $old_images = $this->extractImageUrls($old_content['content_body']);

            $result = $this->M_Content->updateContent($content_id, [
                'content_body' => $content_body,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            // Ambil gambar baru
            $new_images = $this->extractImageUrls($content_body);

            // Hapus gambar lama yang tidak digunakan
            foreach ($old_images as $image) {
                $clean_path = str_replace('../../../', '', $image);

                if (!in_array($image, $new_images) && strpos($clean_path, 'assets/img/content/') !== false) {
                    $path = FCPATH . $clean_path;
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }
            }
        }

        if ($result) {
            $this->session->set_flashdata('success', 'Konten berhasil disimpan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menyimpan konten.');
        }

        redirect($this->input->post('redirect_url'));
    }

    private function extractImageUrls($content_body)
    {
        $image_urls = [];
        preg_match_all('/<img[^>]+src=["\']([^"\']+)["\']/i', $content_body, $matches);

        if (isset($matches[1])) {
            $image_urls = $matches[1];
        }

        return $image_urls;
    }

    public function upload_image()
    {
        $this->load->helper('url');
        $this->load->library('upload');

        $config['upload_path'] = './assets/img/content/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048;
        $config['file_name'] = uniqid();

        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            $file_data = $this->upload->data();
            $image_url = base_url('assets/img/content/' . $file_data['file_name']);
            echo json_encode(['success' => true, 'image_url' => $image_url]);
        } else {
            echo json_encode(['success' => false, 'message' => $this->upload->display_errors()]);
        }
    }

    // menu

    // menu_order last
    public function getLastMenuOrder()
    {
        $menu_parent_id = $this->input->post('menu_parent_id');
        $fasyankes_kode = $this->input->post('fasyankes_kode');

        $last_order = $this->M_MenuAdmin->getLastMenuOrder($menu_parent_id, $fasyankes_kode);

        echo json_encode(['last_order' => $last_order + 1]); // Tambahkan +1 agar otomatis menjadi urutan berikutnya
    }

    // Method untuk menambah menu
    public function addMenu()
    {
        $this->IsLoggedIn();

        $fasyankes_kode = $this->input->post('fasyankes_kode', true);

        $this->form_validation->set_rules('menu_nm', 'Nama Menu', 'required');
        $this->form_validation->set_rules('menu_type', 'Jenis Menu', 'required|in_list[content,dropdown]');
        $this->form_validation->set_rules('menu_link', 'Link', 'trim|callback_check_unique_link[' . $fasyankes_kode . ']', [
            'check_unique_link' => 'Link telah terdaftar untuk Fasyankes ini, buat link dengan nama berbeda!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect($this->input->post('redirect_url'));
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

            redirect($this->input->post('redirect_url'));
        }
    }

    public function addSubmenu()
    {
        $this->IsLoggedIn();

        // validasi
        $fasyankes_kode = $this->input->post('fasyankes_kode', true);

        $this->form_validation->set_rules('menu_nm', 'Nama Menu', 'required');
        $this->form_validation->set_rules('menu_type', 'Jenis Menu', 'required|in_list[content,dropdown]');
        $this->form_validation->set_rules('menu_parent_id', 'Parent Menu', 'required|integer');

        $this->form_validation->set_rules('menu_link', 'Link', 'trim|callback_check_unique_link[' . $fasyankes_kode . ']', [
            'check_unique_link' => 'Link telah terdaftar untuk Fasyankes ini, buat link dengan nama berbeda!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect($this->input->post('redirect_url'));
        } else {
            // Data yang diterima dari form
            $data = [
                'menu_nm' => $this->input->post('menu_nm', true),
                'menu_type' => $this->input->post('menu_type', true),
                'menu_parent_id' => $this->input->post('menu_parent_id', true),
                'menu_link' => $this->input->post('menu_link', true) ?: '#',
                'menu_order' => $this->input->post('menu_order', true),
                'fasyankes_kode' => $this->input->post('fasyankes_kode', true),
                'active_st' => 1, // Default aktif
                'created_at' => date('Y-m-d H:i:s')
            ];

            $this->M_MenuAdmin->insertMenu($data);

            $this->session->set_flashdata('success', 'Submenu berhasil ditambahkan!');

            redirect($this->input->post('redirect_url'));
        }
    }

    public function check_unique_link($menu_link, $fasyankes_kode)
    {
        $menu_data = $this->M_MenuAdmin->getMenuByFasyankesKode($fasyankes_kode);

        foreach ($menu_data as $menu) {
            if ($menu['menu_link'] == $menu_link) {
                return FALSE;
            }
        }

        return TRUE;
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

        $fasyankes_kode = $this->input->post('fasyankes_kode', true);

        $this->form_validation->set_rules('menu_nm', 'Nama Menu', 'required');
        $this->form_validation->set_rules('menu_type', 'Jenis Menu', 'required|in_list[content,dropdown]');

        // form validasi menu link
        $current_menu_link = $this->input->post('current_menu_link');
        $new_menu_link = $this->input->post('menu_link');

        if ($current_menu_link == "#") {
            $this->form_validation->set_rules('menu_link', 'Link', 'trim');
        } else {
            if ($new_menu_link != $current_menu_link) {
                $this->form_validation->set_rules('menu_link', 'Link', 'trim|callback_check_unique_link[' . $fasyankes_kode . ']', [
                    'check_unique_link' => 'Link telah terdaftar untuk Fasyankes ini, buat link dengan nama berbeda!'
                ]);
            } else {
                $this->form_validation->set_rules('menu_link', 'Link', 'trim');
            }
        }

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect($this->input->post('redirect_url'));
        } else {

            $data = [
                'menu_id' => $this->input->post('menu_id', true),
                'menu_nm' => $this->input->post('menu_nm', true),
                'menu_type' => $this->input->post('menu_type', true),
                'menu_order' => $this->input->post('menu_order', true),
                'menu_link' => $this->input->post('menu_type', true) === 'dropdown' ? '#' : ($this->input->post('menu_link', true) ?: '#'),
                'active_st' => $this->input->post('active_st', true),
                'updated_at' => date('Y-m-d H:i:s', true)
            ];

            $this->M_MenuAdmin->editMenu($data);

            $this->session->set_flashdata('success', 'Menu berhasil diedit!');

            redirect($this->input->post('redirect_url'));
        }
    }

    // Method untuk menghapus menu
    public function deleteMenu($menu_id, $fasyankes_kode)
    {
        $this->IsLoggedIn();

        // Ambil konten terkait menu
        $content = $this->M_Content->getContentByMenuId($menu_id);

        if ($content) {
            // Hapus gambar dari konten
            $images = $this->extractImageUrls($content['content_body']);
            foreach ($images as $image) {
                $clean_path = str_replace('../../../', '', $image);

                if (strpos($clean_path, 'assets/img/content/') !== false) {
                    $path = FCPATH . $clean_path;
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }
            }

            // Hapus konten dari database
            $this->M_Content->deleteContentByMenuId($menu_id);
        }

        // Hapus menu
        $this->M_MenuAdmin->deleteMenu($menu_id);

        $first_menu = $this->M_MenuAdmin->getFirstMenuContentByFasyankesKode($fasyankes_kode);

        $this->session->set_flashdata('success', 'Menu dan konten berhasil dihapus!');
        redirect('admin/dokumentasi/' . $fasyankes_kode . '/' . $first_menu['menu_link']);
    }
}
