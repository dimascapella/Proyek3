<?php

namespace App\Controllers\LoginBase;

use App\Controllers\BaseController;

class LoginController extends BaseController
{
    public function index()
    {
        return view('Login/loginView');
    }
}
