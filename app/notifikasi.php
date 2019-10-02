<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class notifikasi extends Authenticatable
{
    protected $table = "notifikasi";

     protected $fillable = [
        'pekerja_id', 'dari', 'kepada', 'deskripsi', 'status', 'created_at', 'updated_at'
    ];

    protected $hidden = [
        'remember_token'
    ];

    public function pekerja(){
    	return $this->belongsTo(pekerja::class, 'pekerja_id');
    }
}
