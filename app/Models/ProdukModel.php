<?php

namespace App\Models;

use CodeIgniter\Model;

class produkModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $allowedFields = ['id_jenis_produk', 'nama_produk'];

    function addProduct($data)
    {
        $this->save($data);
    }

    function getItemsWithName($name)
    {
        return $this->where(['nama_produk' => $name])->first();
    }

    function getProduct()
    {
        return $this->findAll();
    }
}
