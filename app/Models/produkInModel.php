<?php

namespace App\Models;

use CodeIgniter\Model;

class produkInModel extends Model
{
    protected $table = 'produk_masuk';
    protected $primaryKey = 'id_in';
    protected $allowedFields = ['id_produk', 'harga', 'stok', 'created_at_in'];

    function addProduct($data)
    {
        $this->save($data);
    }

    function getProduct()
    {
        return $this->join('produk', 'produk.id_produk = produk_masuk.id_produk')
            ->join('jenis_produk', 'jenis_produk.id = produk.id_jenis_produk')
            ->join('produk_keluar', 'produk_keluar.id_in = produk_masuk.id_in', 'left')->findAll();
    }

    function getItemsWithID($id)
    {
        return $this->join('produk', 'produk.id_produk = produk_masuk.id_produk')
            ->join('jenis_produk', 'jenis_produk.id = produk.id_jenis_produk')
            ->where(['id_in' => $id])->first();
    }

    function getItemsWIthIdProduk($id)
    {
        return $this->where(['id_produk' => $id])->first();
    }

    function getCurrentProduct($date)
    {
        return $this->join('produk', 'produk.id_produk = produk_masuk.id_produk')
            ->join('jenis_produk', 'jenis_produk.id = produk.id_jenis_produk')
            ->where(['created_at_in' => $date])->findAll();
    }

    function deleteProduct($id)
    {
        return $this->delete($id);
    }

    function sumCurrentStock($date)
    {
        return $this->selectSum('stok')->where(['created_at_in' => $date])->first();
    }
}
