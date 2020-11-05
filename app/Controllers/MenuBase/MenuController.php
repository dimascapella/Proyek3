<?php

namespace App\Controllers\MenuBase;

use App\Controllers\BaseController;

class MenuController extends BaseController
{
    public function index()
    {
        return view('Navbar/navbar');
    }
}
