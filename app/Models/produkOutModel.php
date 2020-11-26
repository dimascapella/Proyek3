<?php

namespace App\Models;

use CodeIgniter\Model;

class produkOutModel extends Model
{
    protected $table = 'produk_keluar';
    protected $primaryKey = 'id_out';
    protected $allowedFields = ['id_in', 'id_produk', 'pembelian_stok', 'total_pembelian', 'created_at_out'];

    function addProduct($data)
    {
        $this->save($data);
    }

    function getItemsWithID($id, $date)
    {
        return $this->where(['id_produk' => $id, 'created_at_out' => $date])->first();
    }

    function getPredict($id, $date)
    {
        return $this->join('produk', 'produk.id_produk = produk_keluar.id_produk')
            ->where(['produk_keluar.id_produk' => $id, 'created_at_out' => $date])->first();
    }

    function sumSoldItems($date)
    {
        return $this->selectSum('pembelian_stok')->where(['created_at_out' => $date])->first();
    }

    function income($date)
    {
        return $this->selectSum('total_pembelian')->where(['created_at_out' => $date])->first();
    }
}
