<?php

namespace App\Controllers;

use App\Models\produkInModel;
use App\Models\produkModel;
use App\Models\produkOutModel;
use NumberFormatter;

class Menu extends BaseController
{
    public function __construct()
    {
        $request = \Config\Services::request();
        $pager = \Config\Services::pager();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $produkIn = new produkInModel();
        $produkOut = new produkOutModel();
        $currentDate = date('Y-m-d');
        $currentStock = $produkIn->sumCurrentStock($currentDate);
        $soldStock = $produkOut->sumSoldItems($currentDate);
        $income = $produkOut->income($currentDate);
        $data = [
            'path1' => $this->request->uri->getSegment(1),
            'currentStock' => $currentStock['stok'],
            'soldStock' => $soldStock['pembelian_stok'],
            'income' => $income['total_pembelian']
        ];
        echo view('Navbar/navbar');
        echo view('Pages/landingPage', $data);
    }

    public function list_Product()
    {
        $produkIn = new produkInModel();
        $currentDate = date('Y-m-d');
        $data = [
            'path1' => $this->request->uri->getSegment(1),
            'path2' => $this->request->uri->getSegment(2),
            'produk' => $produkIn->getCurrentProduct($currentDate)
        ];
        echo view('Navbar/navbar');
        echo view('Pages/listProduct', $data);
    }

    public function add_Product()
    {
        $data = [
            'path1' => $this->request->uri->getSegment(1),
            'path2' => $this->request->uri->getSegment(2),
            'validation' => \Config\Services::validation()
        ];
        echo view('Navbar/navbar');
        echo view('Pages/addProduct', $data);
    }

    public function predict()
    {
        $produk = new produkModel();
        $data = [
            'path1' => $this->request->uri->getSegment(1),
            'path2' => $this->request->uri->getSegment(2),
            'produk' => $produk->getProduct()
        ];
        echo view('Navbar/navbar');
        echo view('Pages/predictPage', $data);
    }

    public function edit_page($id)
    {
        $produkIn = new produkInModel();
        $data = [
            'path1' => $this->request->uri->getSegment(1),
            'path2' => $this->request->uri->getSegment(2),
            'path3' => $this->request->uri->getSegment(3),
            'produk' => $produkIn->getItemsWithID($id)
        ];
        echo view('Navbar/navbar');
        echo view('Pages/editPage', $data);
    }

    public function sold_page($id)
    {
        $produkIn = new produkInModel();
        $data = [
            'path1' => $this->request->uri->getSegment(1),
            'path2' => $this->request->uri->getSegment(2),
            'path3' => $this->request->uri->getSegment(3),
            'produk' => $produkIn->getItemsWithID($id)
        ];
        echo view('Navbar/navbar');
        echo view('Pages/soldPage', $data);
    }

    public function history_page()
    {
        $produkIn = new produkInModel();
        $data = [
            'path1' => $this->request->uri->getSegment(1),
            'path2' => $this->request->uri->getSegment(2),
            'produk' => $produkIn->getProduct()
        ];
        echo view('Navbar/navbar');
        echo view('Pages/historyPage', $data);
    }
}
