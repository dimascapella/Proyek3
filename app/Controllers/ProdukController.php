<?php

namespace App\Controllers;

use App\Models\produkInModel;
use App\Models\produkModel;
use App\Models\produkOutModel;

class ProdukController extends BaseController
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }

    public function tambah_barang()
    {
        $currentDate = date("Y-m-d");
        $produk = new produkModel();
        $produkIn = new produkInModel();
        $getCurrentProduct = $produk->getItemsWithName($this->request->getVar('nama_makanan'));
        $getCurrentID = $produk->getItemsWithName($this->request->getVar('nama_makanan'));
        $handleDuplicate = $produkIn->getItemsWIthIdProduk($getCurrentID['id_produk']);

        if (!$this->validate([
            'nama_makanan' => 'required',
            'harga_makanan' => 'required',
            'stok_makanan' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('menu/add_product'))->withInput()->with('validation', $validation);
        }

        if ($handleDuplicate) {
            if ($handleDuplicate['id_produk'] == $getCurrentID['id_produk']) {
                session()->setFlashdata('gagal', 'Data Produk Gagal Ditambahkan');
                return redirect()->to(base_url('menu/add_product'));
            }
        }

        if (empty($getCurrentProduct)) {
            $data1 = [
                'id_jenis_produk' => $this->request->getVar('jenis_makanan'),
                'nama_produk' => $this->request->getVar('nama_makanan')
            ];
            $produk->addProduct($data1);
        }

        if ($getCurrentID) {
            $data2 = [
                'id_produk' => $getCurrentID['id_produk'],
                'harga' => $this->request->getVar('harga_makanan'),
                'stok' => $this->request->getVar('stok_makanan'),
                'created_at_in' => $currentDate
            ];
        }
        $produkIn->addProduct($data2);
        session()->setFlashdata('berhasil', 'Data Produk Berhasil Ditambahkan');
        return redirect()->to(base_url('menu/add_product'));
    }

    public function delete_barang($id)
    {
        $produk = new produkModel();
        $produk->deleteProduct($id);
        return redirect()->to(base_url('menu/list_product'));
    }

    public function update_barang($id)
    {
        $produkIn = new produkInModel();
        $currentDate = date('Y-m-d');

        if (!$this->validate([
            'nama_makanan' => 'required',
            'harga_makanan' => 'required',
            'stok_makanan' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('menu/detail/' . $this->request->getVar('id')))->withInput()->with('validation', $validation);
        }


        $data = [
            'id_in' => $id,
            'id_jenis_produk' => $this->request->getVar('id_produk'),
            'harga' => $this->request->getVar('harga_makanan'),
            'stok' => $this->request->getVar('stok_makanan'),
            'created_at_in' => $currentDate
        ];

        $produkIn->addProduct($data);
        session()->setFlashdata('berhasil', 'Data Produk Berhasil Diubah');
        return redirect()->to(base_url('menu/list_product'));
    }

    public function produk_terjual()
    {
        $produkIn = new produkInModel();
        $produkOut = new produkOutModel();
        $currentDate = date('Y-m-d');
        $checking_data = $produkOut->getItemsWithID($this->request->getVar('id_produk'), $currentDate);

        $newStock = $this->request->getVar('stok_makanan') - $this->request->getVar('total_pembelian');
        $bills = $this->request->getVar('total_pembelian') * $this->request->getVar('harga_makanan');

        $data1 = [
            'id_in' => $this->request->getVar('id'),
            'id_produk' => $this->request->getVar('id_produk'),
            'harga' => $this->request->getVar('harga_makanan'),
            'stok' => $newStock,
            'created_at_in' => $currentDate
        ];

        if ($checking_data) {
            $newOrder = $checking_data['pembelian_stok'] + $this->request->getVar('total_pembelian');
            $newBills = $newOrder * $this->request->getVar('harga_makanan');
            $data2 = [
                'id_out' => $checking_data['id_out'],
                'id_in' => $this->request->getVar('id'),
                'id_produk' => $this->request->getVar('id_produk'),
                'pembelian_stok' => $newOrder,
                'total_pembelian' => $newBills,
                'created_at_out' => $currentDate
            ];
        } else {
            $data2 = [
                'id_in' => $this->request->getVar('id'),
                'id_produk' => $this->request->getVar('id_produk'),
                'pembelian_stok' => $this->request->getVar('total_pembelian'),
                'total_pembelian' => $bills,
                'created_at_out' => $currentDate
            ];
        }

        $produkIn->addProduct($data1);
        $produkOut->addProduct($data2);
        session()->setFlashdata('berhasil', 'Data Pembelian Berhasil Ditambahkan');
        return redirect()->to(base_url('menu/list_product'));
    }

    public function getPredict()
    {
        $id = $this->request->getVar('id_produk');
        $currentDate = date('Y-m-d');
        $prev1day = date('Y-m-d', strtotime("-1 days"));
        $prev2day = date('Y-m-d', strtotime("-2 days"));
        $prev3day = date('Y-m-d', strtotime("-3 days"));
        $prev4day = date('Y-m-d', strtotime("-4 days"));
        $predict = new produkOutModel();

        $currentDay = $predict->getPredict($id, $currentDate);
        $dayMinus1 = $predict->getPredict($id, $prev1day);
        $dayMinus2 = $predict->getPredict($id, $prev2day);
        $dayMinus3 = $predict->getPredict($id, $prev3day);
        $dayMinus4 = $predict->getPredict($id, $prev4day);

        $WMADay_4 = ($dayMinus4['pembelian_stok'] * 1) / 15;
        $WMADay_3 = ($dayMinus3['pembelian_stok'] * 2) / 15;
        $WMADay_2 = ($dayMinus2['pembelian_stok'] * 3) / 15;
        $WMADay_1 = ($dayMinus1['pembelian_stok'] * 4) / 15;
        $WMACurrentDay = ($currentDay['pembelian_stok'] * 5) / 15;

        $WMA = $WMADay_1 + $WMADay_2 + $WMADay_3 + $WMADay_4 + $WMACurrentDay;

        $prediksi = round($WMA);
        $nama_produk = $currentDay['nama_produk'];
        $total_pendapatan = $currentDay['total_pembelian'];

        session()->setFlashdata('predict', $prediksi);
        session()->setFlashdata('getNameProduct', $nama_produk);
        session()->setFlashdata('income', $total_pendapatan);
        return redirect()->to(base_url('menu/predict'));
    }
}
