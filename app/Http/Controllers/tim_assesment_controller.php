<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pekerja;
use \Carbon\Carbon;
use App\notifikasi;

class tim_assesment_controller extends Controller
{
    public function index(){

        $top_notifikasis = notifikasi::where('kepada','tim_assesment')->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = 0;
        foreach ($top_notifikasis as $notifikasi) {
            if ($notifikasi->status == 'belum') {
                $jumlah_notifikasi++;
            }
        }

    	return view('tim_assesment.index',compact('top_notifikasis','jumlah_notifikasi'));
    }
    public function notifikasi(){

        $top_notifikasis = notifikasi::where('kepada','tim_assesment')->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = 0;
        foreach ($top_notifikasis as $notifikasi) {
            if ($notifikasi->status == 'belum') {
                $jumlah_notifikasi++;
            }
        }

        $notifikasis = notifikasi::where('kepada','tim_assesment')->get();
        return view('tim_assesment/notifikasi',compact('notifikasis','top_notifikasis','jumlah_notifikasi'));
    }
    public function detail_notifikasi($id, $pekerja_id){
        $top_notifikasis = notifikasi::where('kepada','tim_assesment')->orderby('created_at','DESC')->take(3)->get();
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
        return view('tim_assesment/detail_notifikasi',compact('notifikasis','top_notifikasis','jumlah_notifikasi','pekerjas'));
    }
    public function daftar_permintaan(){

        $top_notifikasis = notifikasi::where('kepada','tim_assesment')->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = 0;
        foreach ($top_notifikasis as $notifikasi) {
            if ($notifikasi->status == 'belum') {
                $jumlah_notifikasi++;
            }
        }

    	$pekerjas = pekerja::where('status', 'ok')->orderBy('updated_at','desc')->get();
    	return view('tim_assesment.daftar_permintaan',compact('pekerjas','top_notifikasis','jumlah_notifikasi'));
    }
    public function terima_berkas(Request $Request){

        $berkas_assesment = $Request->berkas_assesment;
        $nama_berkas = $berkas_assesment->getClientOriginalName();
        
        $data = [
    		'status' => 'lulus',
            'berkas_assesment' => $nama_berkas
    	];
    	
        $berkas_assesment->move('berkas_assesment',$nama_berkas);

        $data_notifikasi = [
            'pekerja_id' => $Request->id,
            'dari' => 'tim_assesment',
            'kepada' => 'kepala_biro',
            'deskripsi' => 'Berkas Lulus verifikasi oleh tim assesment',
            'status' => 'belum'
        ];
        
        $pekerjas = pekerja::where('id', $Request->id)->update($data);
        $notifikasi = notifikasi::create($data_notifikasi);
    	
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

    	return back()->with($notif);
    }
    public function tolak_berkas(Request $Request){
    	$now = Carbon::now();
        $blok = $now->addMonths(6);
        $data = [
    		'status' => 'tidak lulus',
            'tgl_blok' => $blok
    	];
        $data_notifikasi = [
            'pekerja_id' => $Request->id,
            'dari' => 'tim_assesment',
            'kepada' => 'administrasi',
            'deskripsi' => 'Berkas Tidak Lulus verifikasi oleh tim assesment',
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

    public function daftar_berkas_lulus(){

        $top_notifikasis = notifikasi::where('kepada','tim_assesment')->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = 0;
        foreach ($top_notifikasis as $notifikasi) {
            if ($notifikasi->status == 'belum') {
                $jumlah_notifikasi++;
            }
        }

    	$pekerjas = pekerja::where('status', 'lulus')->orderBy('updated_at','desc')->get();
    	return view('tim_assesment.daftar_berkas_lulus',compact('pekerjas','top_notifikasis','jumlah_notifikasi'));
    }
    public function daftar_berkas_tidak_lulus(){

        $top_notifikasis = notifikasi::where('kepada','tim_assesment')->orderby('created_at','DESC')->take(3)->get();
        $jumlah_notifikasi = 0;
        foreach ($top_notifikasis as $notifikasi) {
            if ($notifikasi->status == 'belum') {
                $jumlah_notifikasi++;
            }
        }

    	$pekerjas = pekerja::where('status','tidak lulus')->orderBy('updated_at','desc')->get();
    	return view('tim_assesment.daftar_berkas_tidak_lulus',compact('pekerjas','top_notifikasis','jumlah_notifikasi'));
    }
}
