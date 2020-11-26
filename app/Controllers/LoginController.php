<?php

namespace App\Controllers;

use App\Models\loginModel;

class LoginController extends BaseController
{

    public function index()
    {
        return view('Login/loginView');
    }

    public function login_action()
    {
        $admin = new loginModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $checking_user = $admin->getUser($username, $password);

        if ($checking_user) {
            session()->set('name', $checking_user['username']);
            session()->set('is_loggin', TRUE);
            return redirect()->to(base_url('menu'));
        } else {
            session()->setFlashdata('gagal', 'Invalid Username or Password');
            return redirect()->to(base_url());
        }
    }

    public function logout_action()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }
}
