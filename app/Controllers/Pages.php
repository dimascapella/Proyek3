<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function __construct()
    {
        $request = \Config\Services::request();
    }

    public function index()
    {
        $data = [
            'path' => $this->request->uri->getSegment(1)
        ];
        echo view('Navbar/navbar');
        echo view('Pages/landingPage', $data);
    }
}
