<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_User extends CI_Model
{
    public function getUserByUsername($username)
    {
        return $this->db->get_where('users', ['user_nm' => $username])->row_array();
    }
}
