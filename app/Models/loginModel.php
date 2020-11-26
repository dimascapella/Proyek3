<?php

namespace App\Models;

use CodeIgniter\Model;

class loginModel extends Model
{
    protected $table = 'admin';

    function getUser($username, $password)
    {
        return $this->where(['username' => $username, 'password' => $password])->first();
    }
}
