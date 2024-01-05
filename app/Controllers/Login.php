<?php

namespace App\Controllers;

use App\Models\M_login;

class Login extends BaseController
{
    public function index(): string
    {
        return view('login');
    }

    public function login_action()
    {
        $M_login = new M_login();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $cek = $M_login->get_data($username, $password);

        $data = $M_login->get_all_data();

        if (!empty($cek)) {
            
            session()->set('cek', $cek);
            session()->set('data', $data);
            
            return redirect()->to(base_url('user'));
        } 
        else {
            session()->setFlashdata('gagal', 'Login failed. Please check your username and password.');
    return redirect()->to(base_url('login'));
         }
    }
    
}