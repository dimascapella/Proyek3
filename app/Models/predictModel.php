<?php

namespace App\Models;

use CodeIgniter\Model;

class predictModel extends Model
{
    protected $table = 'produk_keluar';

    function getPredict($id, $date)
    {
        $this->where(['id_produk' => $id, 'created_at_out' => $date])->findAll();
    }
}
