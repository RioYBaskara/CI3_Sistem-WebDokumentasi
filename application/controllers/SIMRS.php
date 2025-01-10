<?php
defined('BASEPATH') or exit('No direct script access allowed');

// intelephense error
/**
 *  @property input $input 
 *  @property form_validation $form_validation 
 *  @property upload $upload 
 *  @property uri $uri 
 *  @property session $session 
 *  @property pagination $pagination 
 *  @property M_SIMRSContent $M_SIMRSContent 
 *  @property M_SIMRSMenu $M_SIMRSMenu 
 *  @property M_SIMRSFasyankes $M_SIMRSFasyankes 
 */

class SIMRS extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SIMRS/M_SIMRSFasyankes');
        $this->load->model('SIMRS/M_SIMRSMenu');
        $this->load->model('SIMRS/M_SIMRSContent');
        $this->load->library('session');
    }

    public function index()
    {
        redirect('SIMRS/dashboard');
    }

    public function dashboard()
    {
        $limit = 6;

        $total_rows = $this->M_SIMRSFasyankes->getCountFasyankes();
        $data['total_rows'] = $total_rows;

        $this->load->library('pagination');

        $config['base_url'] = base_url('SIMRS/dashboard');
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
        $data['fasyankes'] = $this->M_SIMRSFasyankes->getAllFasyankes($config['per_page'], $page);

        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('SIMRS/dashboard', $data);
    }

    // halaman dokumentasi
    public function dokumentasi($fasyankes_kode = null, $menu_url = null)
    {
        if ($fasyankes_kode == null) {
            redirect('SIMRS/dashboard');
        }

        $menu_data = $this->M_SIMRSMenu->getMenuByFasyankesKode($fasyankes_kode);

        if ($menu_url == null) {
            $first_menu = $this->M_SIMRSMenu->getFirstMenuContentByFasyankesKode($fasyankes_kode);

            if ($first_menu) {
                redirect('SIMRS/dokumentasi/' . $fasyankes_kode . '/' . $first_menu['menu_link']);
            }
        }

        $menu_data = $this->M_SIMRSMenu->getMenuByFasyankesKode($fasyankes_kode);

        // get konten dand detail by menu_url
        $content_data = null;
        $menu_detail = null;
        $breadcrumb = [];

        if ($menu_url != null) {
            $menu_detail = $this->M_SIMRSMenu->getMenuByUrl($menu_url, $fasyankes_kode);

            if ($menu_detail) {
                $content_data = $this->M_SIMRSContent->getContentByMenuId($menu_detail['menu_id']);
                $breadcrumb = $this->M_SIMRSMenu->getMenuBreadcrumb($menu_detail['menu_id']);
            }
        }

        // nama fasyankes
        $fasyankes_data = $this->M_SIMRSMenu->getFasyankesByFasyankesKode($fasyankes_kode);

        // Menyiapkan data untuk view
        $data = [
            'menu_data' => $menu_data,
            'content_data' => $content_data,
            'menu_detail' => $menu_detail,
            'breadcrumb' => $breadcrumb,
            'fasyankes_kode' => $fasyankes_kode,
            'menu_url' => $menu_url,
            'fasyankes_data' => $fasyankes_data
        ];

        // Load views
        $this->load->view('SIMRS/dokumentasi/header', $data);
        $this->load->view('SIMRS/dokumentasi/sidebar', $data);
        $this->load->view('SIMRS/dokumentasi/navbar', $data);
        $this->load->view('SIMRS/dokumentasi/wrapper', $data);
        $this->load->view('SIMRS/dokumentasi/modal', $data);
        $this->load->view('SIMRS/dokumentasi/footer', $data);
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

        $result = $this->M_SIMRSMenu->searchMenuByFasyankes($keyword, $fasyankes_kode);

        echo json_encode($result);
    }

    public function getParentMenus($fasyankes_kode)
    {
        $parentMenus = $this->M_SIMRSMenu->getParentMenus($fasyankes_kode);
        echo json_encode($parentMenus);
    }
}
