<?php

namespace App\Controllers;

use App\Models\M_login;
use App\Models\M_add_user;

class User extends BaseController
{
    public function index(): string
    {
        return view('user');
    }

    public function add_user()
    {
        $M_add_user = new M_add_user();

        $validationRules = [
            'username' => 'required',
            'password' => 'required',
            'name' => 'required',
            'email' => 'required|valid_email',
        ];
    
        if (!$this->validate($validationRules)) {
            session()->setFlashdata('user_error', 'Semua field wajib diisi.');
            return redirect()->to(base_url('user'));
        }

        $newuser = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ];

        $inserted_id = $M_add_user->add_user($newuser);

        $data = session()->get('data');
        $newuser['userid'] = $inserted_id;
        $data[] = $newuser;
        session()->set('data', $data);
    

        if ($inserted_id) {
            session()->setFlashdata('user_added', $inserted_id);
            return redirect()->to(base_url('user'));
          
        } else {
            session()->setFlashdata('user_error', 'Gagal menambahkan pengguna.');
        return redirect()->to(base_url('user'));
        }
    }
    public function display_user_view()
{
    $mlogin = new M_login();
    $data['cek'] = session()->get('cek');
    $data['data'] = $mlogin->get_all_data();  // Fetch all users from the database
    return view('user', $data);
}
}