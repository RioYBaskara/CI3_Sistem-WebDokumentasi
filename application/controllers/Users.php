<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    // Menambah User baru

    // public function addUser()
    // {

    //     Atur username dan password serta rolenya.

    //     $username = 'permisiadmin';
    //     $password = 'superadmin';
    //     $role = 'admin';

    //     $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    //     $data = [
    //         'user_nm' => $username,
    //         'user_password' => $hashed_password,
    //         'user_role' => $role,
    //         'created_at' => date('Y-m-d H:i:s'),
    //     ];

    //     $this->load->database();
    //     $result = $this->db->insert('users', $data);

    //     if ($result) {
    //         echo "User " . $username . " berhasil ditambahkan!";
    //     } else {
    //         echo "Gagal menambahkan user.";
    //     }
    // }

    public function index()
    {
        $this->load->view('welcome_message');
    }
}
