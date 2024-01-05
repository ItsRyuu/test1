<?php

namespace App\Models;

use CodeIgniter\Model;

class M_login extends Model
{
    protected $table = 'user';

    protected $allowedFields = ['userid', 'username', 'password', 'name', 'email'];

    public function get_data($username, $password)
    {
        return $this->db->table('user')
            ->where(array('username' => $username, 'password' => $password))
            ->get()->getRowArray();
    }

    public function get_all_data()
    {
        $db = \Config\Database::connect(); // Mendapatkan objek database baru
        return $db->table('user')
            ->get()->getResultArray();
    }
}