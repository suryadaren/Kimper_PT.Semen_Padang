<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pekerja;
use \Carbon\Carbon;
use App\notifikasi;

class kepala_biro_controller extends Controller
{
    public function index(){

        $top_notifikasis = notifikasi::where('kepada','kepala_biro')->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = 0;
        foreach ($top_notifikasis as $notifikasi) {
            if ($notifikasi->status == 'belum') {
                $jumlah_notifikasi++;
            }
        }

    	return view('kepala_biro.index',compact('top_notifikasis','jumlah_notifikasi'));
    }
    public function notifikasi(){

        $top_notifikasis = notifikasi::where('kepada','kepala_biro')->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = 0;
        foreach ($top_notifikasis as $notifikasi) {
            if ($notifikasi->status == 'belum') {
                $jumlah_notifikasi++;
            }
        }

        $notifikasis = notifikasi::where('kepada','kepala_biro')->get();
        return view('kepala_biro/notifikasi',compact('notifikasis','top_notifikasis','jumlah_notifikasi'));
    }
    public function detail_notifikasi($id, $pekerja_id){
        $top_notifikasis = notifikasi::where('kepada','kepala_biro')->orderby('created_at','DESC')->take(3)->get();
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
        return view('kepala_biro/detail_notifikasi',compact('notifikasis','top_notifikasis','jumlah_notifikasi','pekerjas'));
    }
    public function daftar_permintaan(){

        $top_notifikasis = notifikasi::where('kepada','kepala_biro')->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = 0;
        foreach ($top_notifikasis as $notifikasi) {
            if ($notifikasi->status == 'belum') {
                $jumlah_notifikasi++;
            }
        }

    	$pekerjas = pekerja::where('status','lulus')->orderBy('updated_at','desc')->get();
    	return view('kepala_biro.daftar_permintaan',compact('pekerjas','top_notifikasis','jumlah_notifikasi'));
    }
    public function detail($id){

        $top_notifikasis = notifikasi::where('kepada','kepala_biro')->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = 0;
        foreach ($top_notifikasis as $notifikasi) {
            if ($notifikasi->status == 'belum') {
                $jumlah_notifikasi++;
            }
        }

        $pekerjas = pekerja::where('id',$id)->first();
        return view('kepala_biro.detail',compact('pekerjas','top_notifikasis','jumlah_notifikasi'));
    }
    public function izin_aktif(Request $Request){
        $now = Carbon::now();
        $sekarang = $now->format('Y-m-d');
    	$data = [
    		'status' => 'aktif',
            'tgl_aktif' => $sekarang,
            'tgl_expired' => $Request->tgl_expired
    	];
    	$pekerjas = pekerja::where('id', $Request->id)->update($data);
    	
    	if ($pekerjas) {
            $notif = [
                'message' => 'Accept Data Success',
                'alert-type' => 'success'
            ];
        }else{
            $notif = [
                'message' => 'Accept Data Failed',
                'alert-type' => 'error'
            ];
        }

    	return redirect(url('kepala_biro/daftar_permintaan'))->with($notif);
    }

    public function daftar_izin_aktif(){

        $top_notifikasis = notifikasi::where('kepada','kepala_biro')->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = 0;
        foreach ($top_notifikasis as $notifikasi) {
            if ($notifikasi->status == 'belum') {
                $jumlah_notifikasi++;
            }
        }

    	$pekerjas = pekerja::where('status','aktif')->orderBy('updated_at','desc')->get();
    	return view('kepala_biro.daftar_izin_aktif',compact('pekerjas','top_notifikasis','jumlah_notifikasi'));
    }
}
