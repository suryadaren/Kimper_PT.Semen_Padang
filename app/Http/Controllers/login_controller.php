<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class login_controller extends Controller
{
    public function index(){
    	return view('login');
    }
    public function check_login(Request $Request){
    	$data = [
    		'email' => $Request->email,
    		'password' => $Request->password
    	];
    	if(auth()->guard('administrasi')->attempt(array('email' => $Request->email, 'password' => $Request->password, 'level' => 'administrasi'))){
            return redirect(url('/administrasi'));
        }
    	else if(auth()->guard('kepala_unit')->attempt(array('email' => $Request->email, 'password' => $Request->password, 'level' => 'kepala_unit'))){
            return redirect(url('/kepala_unit'));
        }
    	else if(auth()->guard('tim_assesment')->attempt(array('email' => $Request->email, 'password' => $Request->password, 'level' => 'tim_assesment'))){
            return redirect(url('/tim_assesment'));
        }
    	else if(auth()->guard('kepala_biro')->attempt(array('email' => $Request->email, 'password' => $Request->password, 'level' => 'kepala_biro'))){
            return redirect(url('/kepala_biro'));
        }
        else{
            return redirect('/login_user');
        }
    }public function logout_administrasi(){
        auth()->guard('administrasi')->logout();
        return redirect(url('/login_user'));
    }public function logout_kepala_unit(){
        auth()->guard('kepala_unit')->logout();
        return redirect(url('/login_user'));
    }public function logout_tim_assesment(){
        auth()->guard('tim_assesment')->logout();
        return redirect(url('/login_user'));
    }public function logout_kepala_biro(){
        auth()->guard('kepala_biro')->logout();
        return redirect(url('/login_user'));
    }
}
