<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class form_izin extends Authenticatable
{
    protected $table = "form_izin";

     protected $fillable = [
        'nama', 'departemen', 'perusahaan', 'nip', 'jenis', 'jenis_kendaraan', 'jenis_permintaan', 'sementara_dari', 'sementara_sampai', 'jenis_izin', 'alasan', 'nama_pjo', 'nama_kasie', 'nama_kepala_teknik', 'nama_kasie_hse', 'created_at', 'updated_at'
    ];
}
