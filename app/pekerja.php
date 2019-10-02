<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class pekerja extends Authenticatable
{
    protected $table = "pekerja";

     protected $fillable = [
        'nama', 'nip', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'agama', 'golongan_darah', 'alamat', 'email', 'telepon', 'hp', 'jabatan', 'unit_kerja', 'alamat_kantor', 'riwayat_pendidikan', 'sertifikasi_keahlian', 'berkas_assesment', 'pendidikan_khusus', 'status', 'komentar', 'tgl_blok', 'tgl_aktif', 'tgl_expired', 'created_at', 'updated_at'
    ];
    public function notifikasi(){
        return $this->hasMany(notifikasi::class);
    }
}
