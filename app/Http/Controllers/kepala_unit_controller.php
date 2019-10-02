<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pekerja;
use App\notifikasi;

class kepala_unit_controller extends Controller
{
    public function index(){
        $top_notifikasis = notifikasi::where('kepada','kepala_unit')->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = 0;
        foreach ($top_notifikasis as $notifikasi) {
            if ($notifikasi->status == 'belum') {
                $jumlah_notifikasi++;
            }
        }

    	return view('kepala_unit.index',compact('top_notifikasis','jumlah_notifikasi'));
    }
    public function notifikasi(){

        $top_notifikasis = notifikasi::where('kepada','kepala_unit')->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = 0;
        foreach ($top_notifikasis as $notifikasi) {
            if ($notifikasi->status == 'belum') {
                $jumlah_notifikasi++;
            }
        }

        $notifikasis = notifikasi::where('kepada','kepala_unit')->get();
        return view('kepala_unit/notifikasi',compact('notifikasis','top_notifikasis','jumlah_notifikasi'));
    }
    public function detail_notifikasi($id, $pekerja_id){
        $top_notifikasis = notifikasi::where('kepada','kepala_unit')->orderby('created_at','DESC')->take(3)->get();
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
        return view('kepala_unit/detail_notifikasi',compact('notifikasis','top_notifikasis','jumlah_notifikasi','pekerjas'));
    }
    public function daftar_permintaan(){
        $top_notifikasis = notifikasi::where('kepada','kepala_unit')->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = 0;
        foreach ($top_notifikasis as $notifikasi) {
            if ($notifikasi->status == 'belum') {
                $jumlah_notifikasi++;
            }
        }

    	$pekerjas = pekerja::where('status', null)->orderBy('updated_at','desc')->get();
    	return view('kepala_unit.daftar_permintaan',compact('pekerjas','top_notifikasis','jumlah_notifikasi'));
    }
    public function terima_berkas(Request $Request){
    	$data = [
    		'status' => 'ok'
    	];
        $data_notifikasi = [
            'pekerja_id' => $Request->id,
            'dari' => 'kepala_unit',
            'kepada' => 'tim_assesment',
            'deskripsi' => 'Berkas di terima kepala unit',
            'status' => 'belum'
        ];
    	$pekerjas = pekerja::where('id', $Request->id)->update($data);
        $notifikasi = notifikasi::create($data_notifikasi);
    	
    	if ($pekerjas && $notifikasi) {
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

    	return back()->with($notif);
    }
    public function tolak_berkas(Request $Request){
    	$data = [
    		'status' => 'nok',
            'komentar' => $Request->komentar
    	];
        $data_notifikasi = [
            'pekerja_id' => $Request->id,
            'dari' => 'kepala_unit',
            'kepada' => 'administrasi',
            'deskripsi' => 'Berkas di tolak kepala unit',
            'status' => 'belum'
        ];
    	$pekerjas = pekerja::where('id', $Request->id)->update($data);
        $notifikasi = notifikasi::create($data_notifikasi);
    	
    	if ($pekerjas) {
            $notif = [
                'message' => 'Reject Data Success',
                'alert-type' => 'success'
            ];
        }else{
            $notif = [
                'message' => 'Reject Data Failed',
                'alert-type' => 'error'
            ];
        }

    	return back()->with($notif);
    }

    public function daftar_berkas_diterima(){
        $top_notifikasis = notifikasi::where('kepada','kepala_unit')->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = 0;
        foreach ($top_notifikasis as $notifikasi) {
            if ($notifikasi->status == 'belum') {
                $jumlah_notifikasi++;
            }
        }

    	$pekerjas = pekerja::where('status', 'ok')->orderBy('updated_at','desc')->get();
    	return view('kepala_unit.daftar_berkas_diterima',compact('pekerjas','top_notifikasis','jumlah_notifikasi'));
    }
    public function daftar_berkas_ditolak(){
        $top_notifikasis = notifikasi::where('kepada','kepala_unit')->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = 0;
        foreach ($top_notifikasis as $notifikasi) {
            if ($notifikasi->status == 'belum') {
                $jumlah_notifikasi++;
            }
        }

    	$pekerjas = pekerja::where('status','nok')->orderBy('updated_at','desc')->get();
    	return view('kepala_unit.daftar_berkas_ditolak',compact('pekerjas','top_notifikasis','jumlah_notifikasi'));
    }
}
