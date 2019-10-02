<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pekerja;
use App\pengguna;
use App\form_izin;
use PDF;
use \Carbon\Carbon;
use App\notifikasi;

class administrasi_controller extends Controller
{
    public function index(){

        $top_notifikasis = notifikasi::where('kepada','administrasi')->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = 0;
        foreach ($top_notifikasis as $notifikasi) {
            if ($notifikasi->status == 'belum') {
                $jumlah_notifikasi++;
            }
        }

    	return view('administrasi.index',compact('top_notifikasis','jumlah_notifikasi'));
    }
    public function notifikasi(){

        $top_notifikasis = notifikasi::where('kepada','administrasi')->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = 0;
        foreach ($top_notifikasis as $notifikasi) {
            if ($notifikasi->status == 'belum') {
                $jumlah_notifikasi++;
            }
        }

        $notifikasis = notifikasi::where('kepada','administrasi')->get();
        return view('administrasi/notifikasi',compact('notifikasis','top_notifikasis','jumlah_notifikasi'));
    }
    public function detail_notifikasi($id, $pekerja_id){
        $top_notifikasis = notifikasi::where('kepada','administrasi')->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = 0;
        foreach ($top_notifikasis as $notifikasi) {
            if ($notifikasi->status == 'belum') {
                $jumlah_notifikasi++;
            }
        }

        $data_notifikasi = [
            'status' => 'sudah'
        ];

        notifikasi::where('id', $id)->update($data_notifikasi);
        $pekerjas = pekerja::where('id',$pekerja_id)->first();
        return view('administrasi/detail_notifikasi',compact('notifikasis','top_notifikasis','jumlah_notifikasi','pekerjas'));
    }
    public function form_pekerja_baru(){

        $top_notifikasis = notifikasi::where('kepada','administrasi')->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = 0;
        foreach ($top_notifikasis as $notifikasi) {
            if ($notifikasi->status == 'belum') {
                $jumlah_notifikasi++;
            }
        }

    	return view('administrasi.form_pekerja_baru',compact('top_notifikasis','jumlah_notifikasi'));
    }
    public function input_form_pekerja(Request $Request){
    	$pekerjas = pekerja::get();
        $nip = null;
        foreach ($pekerjas as $pekerja) {
            if ($pekerja->nip == $Request->nip) {
                $nip = $pekerja->nip;
                break;
            }
        }
        if ($nip) {
            $terdaftar = pekerja::where('nip',$nip)->first();
            if ($terdaftar->tgl_blok) {
                $now = Carbon::now();
                $sekarang = Carbon::now();
                $blok = $terdaftar->tgl_blok;
                $tgl_blok = Carbon::parse($blok);
                $sisa = $tgl_blok->diffInDays($sekarang);
                if ($blok > $sekarang) {
                    $notif = [
                        'message' => $sisa,
                        'alert-type' => 'blok'
                    ];
                    return redirect(url('administrasi/form_pekerja_baru'))->with($notif);
                }else{
                    Sopir::where('nip',$nip)->delete();
                }
            }
        }
        if ($Request->jenis_permintaan == "Sementara") {
            $validator = $this->validate($Request,[
                'nama' => 'required',
                'nip' => 'required|unique:pekerja,nip,:id',
                'jenis_kelamin' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'agama' => 'required',
                'golongan_darah' => 'required',
                'alamat' => 'required',
                'email' => 'required|unique:pekerja,email,:id',
                'telepon' => 'required',
                'hp' => 'required',
                'jabatan' => 'required',
                'unit_kerja' => 'required',
                'alamat_kantor' => 'required',
                'riwayat_pendidikan' => 'required',
                'sertifikasi_keahlian' => 'required',
                'pendidikan_khusus' => 'required',
                'jenis' => 'required',
                'jenis_kendaraan' => 'required',
                'jenis_permintaan' => 'required',
                'sementara_dari' => 'required',
                'sementara_sampai' => 'required',
                'jenis_izin' => 'required',
                'alasan' => 'required',
                'nama_pjo' => 'required',
                'nama_kasie' => 'required',
                'nama_kepala_teknik' => 'required',
                'nama_kasie_hse' => 'required'
            ]);
        }else{
            $validator = $this->validate($Request,[
                'nama' => 'required',
                'nip' => 'required|unique:pekerja,nip,:id',
                'jenis_kelamin' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'agama' => 'required',
                'golongan_darah' => 'required',
                'alamat' => 'required',
                'email' => 'required|unique:pekerja,email,:id',
                'telepon' => 'required',
                'hp' => 'required',
                'jabatan' => 'required',
                'unit_kerja' => 'required',
                'alamat_kantor' => 'required',
                'riwayat_pendidikan' => 'required',
                'sertifikasi_keahlian' => 'required',
                'pendidikan_khusus' => 'required',
                'jenis' => 'required',
                'jenis_kendaraan' => 'required',
                'jenis_permintaan' => 'required',
                'jenis_izin' => 'required',
                'alasan' => 'required',
                'nama_pjo' => 'required',
                'nama_kasie' => 'required',
                'nama_kepala_teknik' => 'required',
                'nama_kasie_hse' => 'required'
            ]);   
        }
    	$data_pekerja = [
            'nama' => $Request->nama,
            'nip' => $Request->nip,
            'jenis_kelamin' => $Request->jenis_kelamin,
            'tempat_lahir' => $Request->tempat_lahir,
            'tanggal_lahir' => $Request->tanggal_lahir,
            'agama' => $Request->agama,
            'golongan_darah' => $Request->golongan_darah,
            'alamat' => $Request->alamat,
            'email' => $Request->email,
            'telepon' => $Request->telepon,
            'hp' => $Request->hp,
            'jabatan' => $Request->jabatan,
            'unit_kerja' => $Request->unit_kerja,
            'alamat_kantor' => $Request->alamat_kantor,
            'riwayat_pendidikan' => $Request->riwayat_pendidikan,
            'sertifikasi_keahlian' => $Request->sertifikasi_keahlian,
            'pendidikan_khusus' => $Request->pendidikan_khusus,
        ];
        $data_form_izin = [
            'nama' => $Request->nama,
            'departemen' => $Request->unit_kerja,
            'perusahaan' => $Request->alamat_kantor,
            'nip' => $Request->nip,
            'jenis' => $Request->jenis,
            'jenis_kendaraan' => $Request->jenis_kendaraan,
            'jenis_permintaan' => $Request->jenis_permintaan,
            'jenis_izin' => $Request->jenis_izin,
            'alasan' => $Request->alasan,
            'nama_pjo' => $Request->nama_pjo,
            'nama_kasie' => $Request->nama_kasie,
            'nama_kepala_teknik' => $Request->nama_kepala_teknik,
            'nama_kasie_hse' => $Request->nama_kasie_hse
        ];

        $pekerja = pekerja::create($data_pekerja);
        $form_izin = form_izin::create($data_form_izin);
        $pekerja_id = pekerja::where('nip',$Request->nip)->first();
        $data_notifikasi = [
            'pekerja_id' => $pekerja_id->id,
            'dari' => 'administrasi',
            'kepada' => 'kepala_unit',
            'deskripsi' => 'Mengirim berkas pekerja baru',
            'status' => 'belum'
        ];
        $notifikasi = notifikasi::create($data_notifikasi);

            if ($form_izin && $pekerja && $notifikasi) {
                $notif = [
                    'message' => 'Insert Data Success',
                    'alert-type' => 'success'
                ];
            }else{
                $notif = [
                    'message' => 'Insert Data Failed',
                    'alert-type' => 'error'
                ];
            }
            return redirect(url('administrasi/form_pekerja_baru'))->with($notif);
    }
    public function input_form_pekerja_ulang(Request $Request){
        $pekerjas = pekerja::get();
        $nip = null;
        foreach ($pekerjas as $pekerja) {
            if ($pekerja->nip == $Request->nip) {
                $nip = $pekerja->nip;
                break;
            }
        }
        if ($nip) {
            $terdaftar = pekerja::where('nip',$nip)->first();
            if ($terdaftar->tgl_blok) {
                $now = Carbon::now();
                $sekarang = Carbon::now();
                $blok = $terdaftar->tgl_blok;
                $tgl_blok = Carbon::parse($blok);
                $sisa = $tgl_blok->diffInDays($sekarang);
                if ($blok > $sekarang) {
                    $notif = [
                        'message' => $sisa,
                        'alert-type' => 'blok'
                    ];
                    return redirect(url('administrasi/form_pekerja_baru'))->with($notif);
                }else{
                    Sopir::where('nip',$nip)->delete();
                }
            }
        }
        $data_pekerja = [
            'nama' => $Request->nama,
            'nip' => $Request->nip,
            'jenis_kelamin' => $Request->jenis_kelamin,
            'tempat_lahir' => $Request->tempat_lahir,
            'tanggal_lahir' => $Request->tanggal_lahir,
            'agama' => $Request->agama,
            'golongan_darah' => $Request->golongan_darah,
            'alamat' => $Request->alamat,
            'email' => $Request->email,
            'telepon' => $Request->telepon,
            'hp' => $Request->hp,
            'jabatan' => $Request->jabatan,
            'unit_kerja' => $Request->unit_kerja,
            'alamat_kantor' => $Request->alamat_kantor,
            'riwayat_pendidikan' => $Request->riwayat_pendidikan,
            'sertifikasi_keahlian' => $Request->sertifikasi_keahlian,
            'pendidikan_khusus' => $Request->pendidikan_khusus,
        ];
        $data_form_izin = [
            'nama' => $Request->nama,
            'departemen' => $Request->unit_kerja,
            'perusahaan' => $Request->alamat_kantor,
            'nip' => $Request->nip,
            'jenis' => $Request->jenis,
            'jenis_kendaraan' => $Request->jenis_kendaraan,
            'jenis_permintaan' => $Request->jenis_permintaan,
            'jenis_izin' => $Request->jenis_izin,
            'alasan' => $Request->alasan,
            'nama_pjo' => $Request->nama_pjo,
            'nama_kasie' => $Request->nama_kasie,
            'nama_kepala_teknik' => $Request->nama_kepala_teknik,
            'nama_kasie_hse' => $Request->nama_kasie_hse
        ];

        $pekerja = pekerja::create($data_pekerja);
        $form_izin = form_izin::create($data_form_izin);
        $pekerja_id = pekerja::where('nip',$Request->nip)->first();
        $data_notifikasi = [
            'pekerja_id' => $pekerja_id->id,
            'dari' => 'administrasi',
            'kepada' => 'kepala_unit',
            'deskripsi' => 'Mengirim ulang berkas pekerja',
            'status' => 'belum'
        ];
        $notifikasi = notifikasi::create($data_notifikasi);

            if ($form_izin && $pekerja) {
                $notif = [
                    'message' => 'Insert Data Success',
                    'alert-type' => 'success'
                ];
            }else{
                $notif = [
                    'message' => 'Insert Data Failed',
                    'alert-type' => 'error'
                ];
            }
            return redirect(url('administrasi/pekerja_ditolak'))->with($notif);
    }
    public function daftar_pekerja(){

        $top_notifikasis = notifikasi::where('kepada','administrasi')->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = 0;
        foreach ($top_notifikasis as $notifikasi) {
            if ($notifikasi->status == 'belum') {
                $jumlah_notifikasi++;
            }
        }

        $pekerjas = pekerja::orderBy('created_at','desc')->get();
        return view('administrasi.daftar_pekerja',compact('pekerjas','top_notifikasis', 'jumlah_notifikasi'));
    }
    public function pekerja_diterima(){

        $top_notifikasis = notifikasi::where('kepada','administrasi')->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = 0;
        foreach ($top_notifikasis as $notifikasi) {
            if ($notifikasi->status == 'belum') {
                $jumlah_notifikasi++;
            }
        }

        $pekerjas = pekerja::where('status','ok')->orderBy('updated_at','desc')->get();
        return view('administrasi.pekerja_diterima',compact('pekerjas','top_notifikasis','jumlah_notifikasi'));
    }
    public function pekerja_ditolak(){

        $top_notifikasis = notifikasi::where('kepada','administrasi')->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = 0;
        foreach ($top_notifikasis as $notifikasi) {
            if ($notifikasi->status == 'belum') {
                $jumlah_notifikasi++;
            }
        }

        $pekerjas = pekerja::where('status','nok')->orderBy('updated_at','desc')->get();
        return view('administrasi.pekerja_ditolak',compact('pekerjas','top_notifikasis','jumlah_notifikasi'));
    }
    public function kirim_ulang(Request $Request){

        $top_notifikasis = notifikasi::where('kepada','administrasi')->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = 0;
        foreach ($top_notifikasis as $notifikasi) {
            if ($notifikasi->status == 'belum') {
                $jumlah_notifikasi++;
            }
        }

        $pekerja = pekerja::where('id',$Request->id)->first();
        $form_izin = form_izin::where('nip',$pekerja->nip)->first();
        pekerja::where('id',$Request->id)->delete();
        form_izin::where('nip',$pekerja->nip)->delete();
        return view('administrasi.form_pekerja_baru',compact('pekerja','form_izin','top_notifikasis','jumlah_notifikasi'));
    }

    public function form_user_baru(){

        $top_notifikasis = notifikasi::where('kepada','administrasi')->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = 0;
        foreach ($top_notifikasis as $notifikasi) {
            if ($notifikasi->status == 'belum') {
                $jumlah_notifikasi++;
            }
        }

        return view('administrasi.form_user_baru',compact('top_notifikasis','jumlah_notifikasi'));
    }
    public function input_form_user(Request $Request){
        
        $validator = $this->validate($Request,[
                'username' => 'required|unique:pengguna,username,:id',
                'email' => 'required|email|unique:pengguna,email,:id',
                'password' => 'required|min:5',
                'password_confirmation' => 'required_with:password|same:password|min:5',
                'nip' => 'required|unique:pekerja,nip,:id',
                'level' => 'required'
            ]);

        $data = [
                'username' => $Request->username,
                'email' => $Request->email,
                'password' => bcrypt($Request->password),
                'nip' => $Request->nip,
                'level' => $Request->level
            ];

        $pengguna = pengguna::create($data);

        if ($pengguna) {
            $notif = [
                'message' => 'Insert Data Success',
                'alert-type' => 'success'
            ];
        }else{
            $notif = [
                'message' => 'Insert Data Failed',
                'alert-type' => 'error'
            ];
        }

        return back()->with($notif);
    }

    public function daftar_user(){

        $top_notifikasis = notifikasi::where('kepada','administrasi')->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = 0;
        foreach ($top_notifikasis as $notifikasi) {
            if ($notifikasi->status == 'belum') {
                $jumlah_notifikasi++;
            }
        }

        $penggunas = pengguna::orderBy('created_at','desc')->get();
        return view('administrasi.daftar_user',compact('penggunas','top_notifikasis','jumlah_notifikasi'));
    }
    public function update_user(Request $Request){
        if ($Request->password) {
            $data = [
                'username' => $Request->username,
                'email' => $Request->email,
                'password' => bcrypt($Request->password),
                'nip' => $Request->nip,
                'level' => $Request->level
            ];
        }else{
            $data = [
                'username' => $Request->username,
                'email' => $Request->email,
                'nip' => $Request->nip,
                'level' => $Request->level
            ];
        }
        $penggunas = pengguna::where('id',$Request->id)->update($data);
        if ($penggunas) {
            $notif = [
                'message' => 'Update Data Success',
                'alert-type' => 'success'
            ];
        }else{
            $notif = [
                'message' => 'Update Data Failed',
                'alert-type' => 'error'
            ];
        }

        return back()->with($notif);
    }
    public function delete_user(Request $Request){

        $penggunas = pengguna::where('id',$Request->id)->Delete();
        if ($penggunas) {
            $notif = [
                'message' => 'Delete Data Success',
                'alert-type' => 'success'
            ];
        }else{
            $notif = [
                'message' => 'Delete Data Failed',
                'alert-type' => 'error'
            ];
        }

        return redirect(url('administrasi/daftar_user'))->with($notif);
    }
    
    public function cetak_kimper(){

        $top_notifikasis = notifikasi::where('kepada','administrasi')->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = 0;
        foreach ($top_notifikasis as $notifikasi) {
            if ($notifikasi->status == 'belum') {
                $jumlah_notifikasi++;
            }
        }

        $pekerjas = pekerja::where('status','aktif')->orderBy('created_at','desc')->get();
        return view('administrasi.cetak_kimper',compact('pekerjas','top_notifikasis','jumlah_notifikasi'));
    }
    public function downloadPDF(Request $Request){
        $pekerja = pekerja::where('id',$Request->id)->first();
        $pdf = PDF::loadView('kimper',compact('pekerja'));
        return $pdf->download('invoice.pdf');
    }
}
