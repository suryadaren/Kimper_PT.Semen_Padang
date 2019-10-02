<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class pengguna extends Authenticatable
{
    protected $table = "pengguna";

     protected $fillable = [
        'username', 'password', 'email', 'nip', 'level', 'created_at', 'updated_at'
    ];

    protected $hidden = [
        'remember_token', 'password'
    ];
}
