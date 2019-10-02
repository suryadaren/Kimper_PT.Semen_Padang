<?php
Route::get('/', 'login_controller@index')->name('login');
Route::get('/login_user', 'login_controller@index')->name('login');
Route::post('/check_login', 'login_controller@check_login')->name('check_login');
Route::get('/logout_administrasi', 'login_controller@logout_administrasi')->name('logout_administrasi');
Route::get('/logout_kepala_unit', 'login_controller@logout_kepala_unit')->name('logout_kepala_unit');
Route::get('/logout_tim_assesment', 'login_controller@logout_tim_assesment')->name('logout_tim_assesment');
Route::get('/logout_kepala_biro', 'login_controller@logout_kepala_biro')->name('logout_kepala_biro');

Route::group(['middleware' =>'administrasi'], function(){
	Route::get('/administrasi', 'administrasi_controller@index')->name('administrasi');

	Route::get('/administrasi/form_pekerja_baru', 'administrasi_controller@form_pekerja_baru')->name('administrasi.form_pekerja_baru');
	Route::post('/administrasi/input_form_pekerja', 'administrasi_controller@input_form_pekerja')->name('administrasi.input_form_pekerja');
	Route::get('/administrasi/daftar_pekerja', 'administrasi_controller@daftar_pekerja')->name('administrasi.daftar_pekerja');
	Route::get('/administrasi/pekerja_diterima', 'administrasi_controller@pekerja_diterima')->name('administrasi.pekerja_diterima');

	Route::get('/administrasi/pekerja_ditolak', 'administrasi_controller@pekerja_ditolak')->name('administrasi.pekerja_ditolak');
	Route::post('/administrasi/kirim_ulang', 'administrasi_controller@kirim_ulang')->name('administrasi.kirim_ulang');
	Route::post('/administrasi/input_form_pekerja_ulang', 'administrasi_controller@input_form_pekerja_ulang')->name('administrasi.input_form_pekerja_ulang');

	Route::get('/administrasi/form_user_baru', 'administrasi_controller@form_user_baru')->name('administrasi.form_user_baru');
	Route::post('/administrasi/input_form_user', 'administrasi_controller@input_form_user')->name('administrasi.input_form_user');

	Route::get('/administrasi/daftar_user', 'administrasi_controller@daftar_user')->name('administrasi.daftar_user');
	Route::put('/administrasi/update_user', 'administrasi_controller@update_user')->name('administrasi.update_user');
	Route::delete('/administrasi/delete_user', 'administrasi_controller@delete_user')->name('administrasi.delete_user');

	Route::get('/administrasi/cetak_kimper','administrasi_controller@cetak_kimper')->name('administrasi.cetak_kimper');
	Route::post('/administrasi/downloadPDF','administrasi_controller@downloadPDF')->name('administrasi.downloadPDF');

	Route::get('/administrasi/notifikasi','administrasi_controller@notifikasi')->name('administrasi.notifikasi');
	Route::get('/administrasi/detail_notifikasi/{id}/{pekerja_id}','administrasi_controller@detail_notifikasi')->name('administrasi.detail_notifikasi');
	
});


Route::group(['middleware' =>'kepala_unit'], function(){
	Route::get('/kepala_unit', 'kepala_unit_controller@index')->name('kepala_unit');

	Route::get('/kepala_unit/daftar_permintaan', 'kepala_unit_controller@daftar_permintaan')->name('kepala_unit/daftar_permintaan');
	Route::put('/kepala_unit/terima_berkas', 'kepala_unit_controller@terima_berkas')->name('kepala_unit/terima_berkas');
	Route::put('/kepala_unit/tolak_berkas', 'kepala_unit_controller@tolak_berkas')->name('kepala_unit/tolak_berkas');

	Route::get('/kepala_unit/daftar_berkas_diterima', 'kepala_unit_controller@daftar_berkas_diterima')->name('kepala_unit/daftar_berkas_diterima');
	Route::get('/kepala_unit/daftar_berkas_ditolak', 'kepala_unit_controller@daftar_berkas_ditolak')->name('kepala_unit/daftar_berkas_ditolak');

	Route::get('/kepala_unit/notifikasi','kepala_unit_controller@notifikasi')->name('kepala_unit.notifikasi');
	Route::get('/kepala_unit/detail_notifikasi/{id}/{pekerja_id}','kepala_unit_controller@detail_notifikasi')->name('kepala_unit.detail_notifikasi');

});
Route::group(['middleware' =>'tim_assesment'], function(){
	Route::get('/tim_assesment', 'tim_assesment_controller@index')->name('tim_assesment');

	Route::get('/tim_assesment/daftar_permintaan', 'tim_assesment_controller@daftar_permintaan')->name('tim_assesment/daftar_permintaan');
	Route::put('/tim_assesment/terima_berkas', 'tim_assesment_controller@terima_berkas')->name('tim_assesment/terima_berkas');
	Route::put('/tim_assesment/tolak_berkas', 'tim_assesment_controller@tolak_berkas')->name('tim_assesment/tolak_berkas');

	Route::get('/tim_assesment/daftar_berkas_lulus', 'tim_assesment_controller@daftar_berkas_lulus')->name('tim_assesment/daftar_berkas_lulus');
	Route::get('/tim_assesment/daftar_berkas_tidak_lulus', 'tim_assesment_controller@daftar_berkas_tidak_lulus')->name('tim_assesment/daftar_berkas_tidak_lulus');

	Route::get('/tim_assesment/notifikasi','tim_assesment_controller@notifikasi')->name('tim_assesment.notifikasi');
	Route::get('/tim_assesment/detail_notifikasi/{id}/{pekerja_id}','tim_assesment_controller@detail_notifikasi')->name('tim_assesment.detail_notifikasi');

});
Route::group(['middleware' =>'kepala_biro'], function(){
	Route::get('/kepala_biro', 'kepala_biro_controller@index')->name('kepala_biro');
	Route::get('/kepala_biro/daftar_permintaan', 'kepala_biro_controller@daftar_permintaan')->name('kepala_biro/daftar_permintaan');
	Route::get('/kepala_biro/daftar_permintaan/detail/{id}', 'kepala_biro_controller@detail')->name('kepala_biro/detail');
	Route::put('/kepala_biro/izin_aktif', 'kepala_biro_controller@izin_aktif')->name('kepala_biro/izin_aktif');
	Route::get('/kepala_biro/daftar_izin_aktif', 'kepala_biro_controller@daftar_izin_aktif')->name('kepala_biro/daftar_izin_aktif');

	Route::get('/kepala_biro/notifikasi','kepala_biro_controller@notifikasi')->name('kepala_biro.notifikasi');
	Route::get('/kepala_biro/detail_notifikasi/{id}/{pekerja_id}','kepala_biro_controller@detail_notifikasi')->name('kepala_biro.detail_notifikasi');

});
