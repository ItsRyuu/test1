<?php

namespace App\Models;

use CodeIgniter\Model;

class M_add_user extends Model
{
    public function add_user($data)
    {
        $this->db->table('user')->insert($data);
        return $this->db->insertID(); // Mengembalikan ID dari data yang baru saja dimasukkan
    }
}