@extends('administrasi/template')

@section('head')

<meta name="description" content="Admin is a material design and bootstrap based responsive dashboard template created mainly for admin and backend applications."/>

  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

<link rel="shortcut icon" type="image/x-icon" href="{{url('Admin/themes/images/favicon.png')}}">

<!-- Google icon -->
<link href="{{url('Admin/themes/css/google-material.css')}}" rel="stylesheet">

<!-- Bootstrap css -->
<link rel="stylesheet" type="text/css" href="{{url('Admin/assets/css/bootstrap.min.css')}}">

<!-- Propeller css -->
<link rel="stylesheet" type="text/css" href="{{url('Admin/assets/css/propeller.min.css')}}">
<!-- /build -->

<!-- Propeller theme css-->
<link rel="stylesheet" type="text/css" href="{{url('Admin/themes/css/propeller-theme.css')}}" />

<!-- Propeller admin theme css-->
<link rel="stylesheet" type="text/css" href="{{url('Admin/themes/css/propeller-admin.css')}}">

@endsection

 
@if(@isset($pekerja))
  @section('content')
  <!--tab start-->
    <div class="container-fluid full-width-container">
    
      <!-- Title -->
      <h1 class="section-title" id="services">
        <span>Form Input Data Pekerja</span>
      </h1><!-- End Title -->
        
      <!--breadcrum start-->
      <ol class="breadcrumb text-left">
        <li><a href="{{url('administrasi')}}">Dashboard</a></li>
        <li class="active">Form Input Data</li>
      </ol><!--breadcrum end-->
    
      <div class="col-md-12"> 
        <!--section-title -->
        <h2>Input Data</h2><!--section-title end -->
        <!-- section content start-->
       <form name="form_tambah" class="form-horizontal" action="{{url('administrasi/input_form_pekerja_ulang')}}" enctype="multipart/form-data" method="post">
        <input type="hidden" name="id" value="$pekerja->id">
        <div class="pmd-card pmd-z-depth">
          <div class="pmd-card-body">
            <div class="row">
              <div class="col-md-6">
               <!-- input text -->
                <div class="form-group">
                  <input type="text" name="nama" value="{{$pekerja->nama}}" placeholder="Nama Lengkap" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" name="nip" value="{{$pekerja->nip}}" placeholder="NIP / NIK" class="form-control">
                </div>
                <div class="form-group">
                  <select class="form-control" name="jenis_kelamin">
                    <option value="">Jenis Kelamin</option>
                    <option value="Laki-laki" {{ $pekerja->jenis_kelamin == 'Laki-laki' ? 'selected' : ''}}>Laki-Laki</option>
                    <option value="Perempuan" {{ $pekerja->jenis_kelamin == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <input type="text" name="tempat_lahir" value="{{$pekerja->tempat_lahir}}" placeholder="Tempat Lahir" class="form-control">
                    </div>
                    <div class="col-md-6">
                      <input type="date" name="tanggal_lahir" value="{{$pekerja->tanggal_lahir}}" placeholder="Tanggal Lahir" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" name="agama" value="{{$pekerja->agama}}" placeholder="Agama" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" name="golongan_darah" value="{{$pekerja->golongan_darah}}" placeholder="Golongan Darah" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" name="alamat" value="{{$pekerja->alamat}}" placeholder="Alamat Rumah" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" name="email" value="{{$pekerja->email}}" placeholder="E-mail" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" name="telepon" value="{{$pekerja->telepon}}" placeholder="No. Telepon" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" name="hp" value="{{$pekerja->hp}}" placeholder="No. HP" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" name="jabatan" value="{{$pekerja->jabatan}}" placeholder="Jabatan" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" name="unit_kerja" value="{{$pekerja->unit_kerja}}" placeholder="Unit Kerja" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" name="alamat_kantor" value="{{$pekerja->alamat_kantor}}" placeholder="Alamat Kantor / Unit Kerja" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" name="riwayat_pendidikan" value="{{$pekerja->riwayat_pendidikan}}" placeholder="Riwayat Pendidikan" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" name="sertifikasi_keahlian" value="{{$pekerja->sertifikasi_keahlian}}" placeholder="Sertifikasi Keahlian" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" name="pendidikan_khusus" value="{{$pekerja->pendidikan_khusus}}" placeholder="Pendidikan Khusus" class="form-control">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        
    </div>
  <!-- tab end -->
  <!--tab start-->
    <div class="container-fluid full-width-container">
    
    <div class="col-md-12"> 
        <!--section-title -->
        <h2>Form Izin</h2><!--section-title end -->
        <!-- section content start-->
        <div class="pmd-card pmd-z-depth">
          <div class="pmd-card-body">
            <div class="row">
              <div class="col-md-12">
                <p><strong>Pemohon</strong></p>
              </div>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-3">
                    <label class="radio-inline pmd-radio">
                      <input type="radio" name="jenis" id="inlineRadio1" value="Izin Baru" {{ $form_izin->jenis == 'Izin Baru' ? 'checked' : ''}}>
                      <span for="inlineRadio1">Izin Baru</span> 
                    </label>
                  </div>
                  <div class="col-md-3">
                    <label class="radio-inline pmd-radio">
                      <input type="radio" name="jenis" id="inlineRadio1" value="Perpanjangan" {{ $form_izin->jenis == 'Perpanjangan' ? 'checked' : ''}}>
                      <span for="inlineRadio1">Perpanjangan</span> 
                    </label>
                  </div>
                  <div class="col-md-3">
                    <label class="radio-inline pmd-radio">
                      <input type="radio" name="jenis" id="inlineRadio1" value="Pengaktifan Kembali" {{ $form_izin->jenis == 'Pengaktifan Kembali' ? 'checked' : ''}}>
                      <span for="inlineRadio1">Pengaktifan Kembali</span> 
                    </label>
                  </div>
                  <div class="col-md-3">
                    <label class="radio-inline pmd-radio">
                      <input type="radio" name="jenis" id="inlineRadio1" value="Penonaktifan" {{ $form_izin->jenis == 'Penonaktifan' ? 'checked' : ''}}>
                      <span for="inlineRadio1">Penonaktifan</span> 
                    </label>
                  </div>
                </div>
                <div class="row">
                  <p style="margin: 15px 0 0 15px">Jenis dan Model Kendaraan / Peraltan Bergerak :</p>
                  <div class="col-md-3">
                    <label class="radio pmd-radio">
                      <input type="radio" name="jenis_kendaraan" id="inlineRadio1" value="Dump Truck" {{ $form_izin->jenis_kendaraan == 'Dump Truck' ? 'checked' : ''}}>
                      <span for="inlineRadio1">Dump Truck</span> 
                    </label>
                    <label class="radio pmd-radio">
                      <input type="radio" name="jenis_kendaraan" id="inlineRadio1" value="Buldozer" {{ $form_izin->jenis_kendaraan == 'Buldozer' ? 'checked' : ''}}>
                      <span for="inlineRadio1">Buldozer</span> 
                    </label>
                  </div>
                  <div class="col-md-3">
                    <label class="radio pmd-radio">
                      <input type="radio" name="jenis_kendaraan" id="inlineRadio1" value="Grader" {{ $form_izin->jenis_kendaraan == 'Grader' ? 'checked' : ''}}>
                      <span for="inlineRadio1">Grader</span> 
                    </label>
                    <label class="radio pmd-radio">
                      <input type="radio" name="jenis_kendaraan" id="inlineRadio1" value="Loader" {{ $form_izin->jenis_kendaraan == 'Loader' ? 'checked' : ''}}>
                      <span for="inlineRadio1">Loader</span> 
                    </label>
                  </div>
                  <div class="col-md-3">
                    <label class="radio pmd-radio">
                      <input type="radio" name="jenis_kendaraan" id="inlineRadio1" value="Excavator" {{ $form_izin->jenis_kendaraan == 'Excavator' ? 'checked' : ''}}>
                      <span for="inlineRadio1">Excavator</span> 
                    </label>
                    <label class="radio pmd-radio">
                      <input type="radio" name="jenis_kendaraan" id="inlineRadio1" value="Drill Machine" {{ $form_izin->jenis_kendaraan == 'Drill Machine' ? 'checked' : ''}}>
                      <span for="inlineRadio1">Drill Machine</span> 
                    </label>
                  </div>
                  <div class="col-md-3">
                    <label class="radio pmd-radio">
                      <input type="radio" name="jenis_kendaraan" id="inlineRadio1" value="Light Vehicle" {{ $form_izin->jenis_kendaraan == 'Light Vehicle' ? 'checked' : ''}}>
                      <span for="inlineRadio1">Light Vehicle</span> 
                    </label>
                  </div>
                </div>
                <div class="row">
                  <p style="margin: 15px 0 0 15px">Jenis Permintaan :</p>
                  <div class="col-md-6">
                    <label class="radio pmd-radio">
                      <input type="radio" name="jenis_permintaan" id="inlineRadio1" value="Permanent" {{ $form_izin->jenis_permintaan == 'Permanent' ? 'checked' : ''}}>
                      <span for="inlineRadio1">Permanent</span> 
                    </label>
                      <div class="row">
                        <div class="col-md-4">
                          <label class="radio pmd-radio">
                            <input type="radio" name="jenis_permintaan" id="inlineRadio1" value="Sementara" {{ $form_izin->jenis_permintaan == 'Sementara' ? 'checked' : ''}}>
                            <span for="inlineRadio1">Sementara</span>
                          </label>
                        </div>
                        <div class="col-md-4">
                          <div class="row">
                            <div class="col-md-12">
                              dari
                            </div>
                            <div class="col-md-12">
                              <input type="date" name="sementara_dari" value="{{$pekerja->sementara_dari}}" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="row">
                            <div class="col-md-12">
                              sampai
                            </div>
                            <div class="col-md-12">
                              <input type="date" name="sementara_sampai" value="{{$pekerja->sementara_sampai}}" class="form-control">
                            </div>
                          </div>
                        </div>
                      </div> 
                  </div>
                </div>
                <div class="row">
                  <p style="margin: 15px 0 0 15px">Jenis izin :</p>
                  <div class="col-md-4">
                    <label class="radio pmd-radio">
                      <input type="radio" name="jenis_izin" id="inlineRadio1" value="Pit Worker Permit" {{ $form_izin->jenis_izin == 'Pit Worker Permit' ? 'checked' : ''}}>
                      <span for="inlineRadio1">Pit Worker Permit</span> 
                    </label>
                  </div>
                  <div class="col-md-4">
                    <label class="radio pmd-radio">
                      <input type="radio" name="jenis_izin" id="inlineRadio1" value="In Pit Access Only" {{ $form_izin->jenis_izin == 'In Pit Access Only' ? 'checked' : ''}}>
                      <span for="inlineRadio1">In Pit Access Only</span> 
                    </label>
                  </div>
                  <div class="col-md-4">
                    <label class="radio pmd-radio">
                      <input type="radio" name="jenis_izin" id="inlineRadio1" value="Full Pit Access" {{ $form_izin->jenis_izin == 'Full Pit Access' ? 'checked' : ''}}>
                      <span for="inlineRadio1">Full Pit Access</span> 
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-12">
                <p><strong>Alasan dan Justifikasi</strong></p>
              </div>
              <div class="col-md-3">
                <label class="radio-inline pmd-radio">
                  <input type="radio" name="alasan" id="inlineRadio1" value="Wajib Perusahaan" {{ $form_izin->alasan == 'Wajib Perusahaan' ? 'checked' : ''}}>
                  <span for="inlineRadio1">Wajib Perusahaan</span> 
                </label>
              </div>
              <div class="col-md-3">
                <label class="radio-inline pmd-radio">
                  <input type="radio" name="alasan" id="inlineRadio1" value="Syarat Pekerjaan" {{ $form_izin->alasan == 'Syarat Pekerjaan' ? 'checked' : ''}}>
                  <span for="inlineRadio1">Syarat Pekerjaan</span> 
                </label>
              </div>
              <div class="col-md-2">
                <label class="radio-inline pmd-radio">
                  <input type="radio" name="alasan" id="inlineRadio1" value="Penyegar" {{ $form_izin->alasan == 'Penyegar' ? 'checked' : ''}}>
                  <span for="inlineRadio1">Penyegar</span> 
                </label>
              </div>
              <div class="col-md-2">
                <label class="radio-inline pmd-radio">
                  <input type="radio" name="alasan" id="inlineRadio1" value="Pelanggaran" {{ $form_izin->alasan == 'Pelanggaran' ? 'checked' : ''}}>
                  <span for="inlineRadio1">Pelanggaran</span> 
                </label>
              </div>
              <div class="col-md-2">
                <label class="radio-inline pmd-radio">
                  <input type="radio" name="alasan" id="inlineRadio1" value="Lainnya..." {{ $form_izin->alasan == 'Lainnya...' ? 'checked' : ''}}>
                  <span for="inlineRadio1">Lainnya...</span> 
                </label>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-12">
                <p><strong>Persetujuan</strong></p>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" name="nama_pjo" value="{{$form_izin->nama_pjo}}" placeholder="PJO Pemohon" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" name="nama_kasie" value="{{$form_izin->nama_kasie}}" placeholder="Kasie Pemohon" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" name="nama_kepala_teknik" value="{{$form_izin->nama_kepala_teknik}}" placeholder="Kepala Teknik Tambang" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" name="nama_kasie_hse" value="{{$form_izin->nama_kasie_hse}}" placeholder="Kasie HSE tambang dan Reklamasi" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 text-right">
                <div class="pmd-card-actions">
                  <input type="submit" value="Submit" class="btn btn-primary next">
                </div>
              </div>
            </div>
          </div>
        </div> <!-- section content end --> 
            {{csrf_field()}} 
        </form>
      </div>
        
    </div>
  <!-- tab end -->
  <div class="container">
            <!-- Modal -->
    <div class="modal fade" id="modal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Blocked User</h4>
          </div>
          <div class="modal-body">
            
            <form name="form_hapus" action="" method="post" enctype="multipart/form-data">
              <div class="col-md-12 text-center">
          <h3>Maaf Berkas ini sedang dalam masa blokir</h3>
          <h5>untuk</h5>
          <h1 id="okeee"></h1>
          <h6>Hari</h6>   
            </div>
              <div class="modal-footer">
                <input type="button" data-dismiss = 'modal' class="btn btn-danger" value="Close">
              </div>
            </form>
          </div>
        </div><!--modal-content-->
      </div><!--modal-dialog-->
    </div><!--modal-->
  </div><!--container-->
        <!-- akhir pop up -->

  @endsection

@else
  @section('content')
  <!--tab start-->
    <div class="container-fluid full-width-container">
    
      <!-- Title -->
      <h1 class="section-title" id="services">
        <span>Form Input Data Pekerja</span>
      </h1><!-- End Title -->
        
      <!--breadcrum start-->
      <ol class="breadcrumb text-left">
        <li><a href="{{url('administrasi')}}">Dashboard</a></li>
        <li class="active">Form Input Data</li>
      </ol><!--breadcrum end-->
    
      <div class="col-md-12"> 
        <!--section-title -->
        <h2>Input Data</h2><!--section-title end -->
        <!-- section content start-->
       <form name="form_tambah" class="form-horizontal" action="{{url('administrasi/input_form_pekerja')}}" enctype="multipart/form-data" method="post">
        <input type="hidden" name="id" value="$pekerja->id">
        <div class="pmd-card pmd-z-depth">
          <div class="pmd-card-body">
            <div class="row">
              <div class="col-md-6">
               <!-- input text -->
                <div class="form-group">
                  <input type="text" name="nama" value="{{old('nama')}}" placeholder="Nama Lengkap" class="form-control">
                  @if($errors->has('nama'))
                    <div class="alert alert-danger" role="alert"> {{$errors->first('nama')}} </div>
                  @endif
                </div>
                <div class="form-group">
                  <input type="text" name="nip" value="{{old('nip')}}" placeholder="NIP / NIK" class="form-control">
                  @if($errors->has('nip'))
                    <div class="alert alert-danger" role="alert"> {{$errors->first('nip')}} </div>
                  @endif
                </div>
                <div class="form-group">
                  <select class="form-control" name="jenis_kelamin">
                    <option value="">Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                  @if($errors->has('jenis_kelamin'))
                    <div class="alert alert-danger" role="alert"> {{$errors->first('jenis_kelamin')}} </div>
                  @endif
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <input type="text" name="tempat_lahir" value="{{old('tempat_lahir')}}" placeholder="Tempat Lahir" class="form-control">
                      @if($errors->has('tempat_lahir'))
                        <div class="alert alert-danger" role="alert"> {{$errors->first('tempat_lahir')}} </div>
                      @endif
                    </div>
                    <div class="col-md-6">
                      <input type="date" name="tanggal_lahir" value="{{old('tanggal_lahir')}}" placeholder="Tanggal Lahir" class="form-control">
                      @if($errors->has('tanggal_lahir'))
                        <div class="alert alert-danger" role="alert"> {{$errors->first('tanggal_lahir')}} </div>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" name="agama" value="{{old('agama')}}" placeholder="Agama" class="form-control">
                  @if($errors->has('agama'))
                    <div class="alert alert-danger" role="alert"> {{$errors->first('agama')}} </div>
                  @endif
                </div>
                <div class="form-group">
                  <input type="text" name="golongan_darah" value="{{old('golongan_darah')}}" placeholder="Golongan Darah" class="form-control">
                  @if($errors->has('golongan_darah'))
                    <div class="alert alert-danger" role="alert"> {{$errors->first('golongan_darah')}} </div>
                  @endif
                </div>
                <div class="form-group">
                  <input type="text" name="alamat" value="{{old('alamat')}}" placeholder="Alamat Rumah" class="form-control">
                  @if($errors->has('alamat'))
                    <div class="alert alert-danger" role="alert"> {{$errors->first('alamat')}} </div>
                  @endif
                </div>
                <div class="form-group">
                  <input type="text" name="email" value="{{old('email')}}" placeholder="E-mail" class="form-control">
                  @if($errors->has('email'))
                    <div class="alert alert-danger" role="alert"> {{$errors->first('email')}} </div>
                  @endif
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" name="telepon" value="{{old('telepon')}}" placeholder="No. Telepon" class="form-control">
                  @if($errors->has('telepon'))
                    <div class="alert alert-danger" role="alert"> {{$errors->first('telepon')}} </div>
                  @endif
                </div>
                <div class="form-group">
                  <input type="text" name="hp" value="{{old('hp')}}" placeholder="No. HP" class="form-control">
                  @if($errors->has('hp'))
                    <div class="alert alert-danger" role="alert"> {{$errors->first('hp')}} </div>
                  @endif
                </div>
                <div class="form-group">
                  <input type="text" name="jabatan" value="{{old('jabatan')}}" placeholder="Jabatan" class="form-control">
                  @if($errors->has('jabatan'))
                    <div class="alert alert-danger" role="alert"> {{$errors->first('jabatan')}} </div>
                  @endif
                </div>
                <div class="form-group">
                  <input type="text" name="unit_kerja" value="{{old('unit_kerja')}}" placeholder="Unit Kerja" class="form-control">
                  @if($errors->has('unit_kerja'))
                    <div class="alert alert-danger" role="alert"> {{$errors->first('unit_kerja')}} </div>
                  @endif
                </div>
                <div class="form-group">
                  <input type="text" name="alamat_kantor" value="{{old('alamat_kantor')}}" placeholder="Alamat Kantor / Unit Kerja" class="form-control">
                  @if($errors->has('alamat_kantor'))
                    <div class="alert alert-danger" role="alert"> {{$errors->first('alamat_kantor')}} </div>
                  @endif
                </div>
                <div class="form-group">
                  <input type="text" name="riwayat_pendidikan" value="{{old('riwayat_pendidikan')}}" placeholder="Riwayat Pendidikan" class="form-control">
                  @if($errors->has('riwayat_pendidikan'))
                    <div class="alert alert-danger" role="alert"> {{$errors->first('riwayat_pendidikan')}} </div>
                  @endif
                </div>
                <div class="form-group">
                  <input type="text" name="sertifikasi_keahlian" value="{{old('sertifikasi_keahlian')}}" placeholder="Sertifikasi Keahlian" class="form-control">
                  @if($errors->has('sertifikasi_keahlian'))
                    <div class="alert alert-danger" role="alert"> {{$errors->first('sertifikasi_keahlian')}} </div>
                  @endif
                </div>
                <div class="form-group">
                  <input type="text" name="pendidikan_khusus" value="{{old('pendidikan_khusus')}}" placeholder="Pendidikan Khusus" class="form-control">
                  @if($errors->has('pendidikan_khusus'))
                    <div class="alert alert-danger" role="alert"> {{$errors->first('pendidikan_khusus')}} </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        
    </div>
  <!-- tab end -->
  <!--tab start-->
    <div class="container-fluid full-width-container">
    
    <div class="col-md-12"> 
        <!--section-title -->
        <h2>Form Izin</h2><!--section-title end -->
        <!-- section content start-->
        <div class="pmd-card pmd-z-depth">
          <div class="pmd-card-body">
            <div class="row">
              <div class="col-md-12">
                <p><strong>Pemohon</strong></p>
              </div>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-3">
                    <label class="radio-inline pmd-radio">
                      <input type="radio" name="jenis" id="inlineRadio1" value="Izin Baru">
                      <span for="inlineRadio1">Izin Baru</span> 
                    </label>
                  </div>
                  <div class="col-md-3">
                    <label class="radio-inline pmd-radio">
                      <input type="radio" name="jenis" id="inlineRadio1" value="Perpanjangan">
                      <span for="inlineRadio1">Perpanjangan</span> 
                    </label>
                  </div>
                  <div class="col-md-3">
                    <label class="radio-inline pmd-radio">
                      <input type="radio" name="jenis" id="inlineRadio1" value="Pengaktifan Kembali">
                      <span for="inlineRadio1">Pengaktifan Kembali</span> 
                    </label>
                  </div>
                  <div class="col-md-3">
                    <label class="radio-inline pmd-radio">
                      <input type="radio" name="jenis" id="inlineRadio1" value="Penonaktifan">
                      <span for="inlineRadio1">Penonaktifan</span> 
                    </label>
                  </div>
                  @if($errors->has('jenis'))
                    <div class="alert alert-danger" role="alert"> {{$errors->first('jenis')}} </div>
                  @endif
                </div>
                <div class="row">
                  <p style="margin: 15px 0 0 15px">Jenis dan Model Kendaraan / Peraltan Bergerak :</p>
                  <div class="col-md-3">
                    <label class="radio pmd-radio">
                      <input type="radio" name="jenis_kendaraan" id="inlineRadio1" value="Dump Truck">
                      <span for="inlineRadio1">Dump Truck</span> 
                    </label>
                    <label class="radio pmd-radio">
                      <input type="radio" name="jenis_kendaraan" id="inlineRadio1" value="Buldozer">
                      <span for="inlineRadio1">Buldozer</span> 
                    </label>
                  </div>
                  <div class="col-md-3">
                    <label class="radio pmd-radio">
                      <input type="radio" name="jenis_kendaraan" id="inlineRadio1" value="Grader">
                      <span for="inlineRadio1">Grader</span> 
                    </label>
                    <label class="radio pmd-radio">
                      <input type="radio" name="jenis_kendaraan" id="inlineRadio1" value="Loader">
                      <span for="inlineRadio1">Loader</span> 
                    </label>
                  </div>
                  <div class="col-md-3">
                    <label class="radio pmd-radio">
                      <input type="radio" name="jenis_kendaraan" id="inlineRadio1" value="Excavator">
                      <span for="inlineRadio1">Excavator</span> 
                    </label>
                    <label class="radio pmd-radio">
                      <input type="radio" name="jenis_kendaraan" id="inlineRadio1" value="Drill Machine">
                      <span for="inlineRadio1">Drill Machine</span> 
                    </label>
                  </div>
                  <div class="col-md-3">
                    <label class="radio pmd-radio">
                      <input type="radio" name="jenis_kendaraan" id="inlineRadio1" value="Light Vehicle">
                      <span for="inlineRadio1">Light Vehicle</span> 
                    </label>
                  </div>
                </div>
                  @if($errors->has('jenis_kendaraan'))
                    <div class="alert alert-danger" role="alert"> {{$errors->first('jenis_kendaraan')}} </div>
                  @endif
                <div class="row">
                  <p style="margin: 15px 0 0 15px">Jenis Permintaan :</p>
                  <div class="col-md-6">
                    <label class="radio pmd-radio">
                      <input type="radio" name="jenis_permintaan" id="inlineRadio1" value="Permanent">
                      <span for="inlineRadio1">Permanent</span> 
                    </label>
                      <div class="row">
                        <div class="col-md-4">
                          <label class="radio pmd-radio">
                            <input type="radio" name="jenis_permintaan" id="inlineRadio1" value="Sementara">
                            <span for="inlineRadio1">Sementara</span>
                          </label>
                        </div>
                        <div class="col-md-4">
                          <div class="row">
                            <div class="col-md-12">
                              dari
                            </div>
                            <div class="col-md-12">
                              <input type="date" name="sementara_dari" value="{{old('sementara_dari')}}" class="form-control">
                              @if($errors->has('sementara_dari'))
                                <div class="alert alert-danger" role="alert"> {{$errors->first('sementara_dari')}} </div>
                              @endif
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="row">
                            <div class="col-md-12">
                              sampai
                            </div>
                            <div class="col-md-12">
                              <input type="date" name="sementara_sampai" value="{{old('sementara_sampai')}}" class="form-control">
                            @if($errors->has('sementara_sampai'))
                              <div class="alert alert-danger" role="alert"> {{$errors->first('sementara_sampai')}} </div>
                            @endif
                            </div>
                          </div>
                        </div>
                      </div> 
                  </div>
                  @if($errors->has('jenis_permintaan'))
                    <div class="alert alert-danger" role="alert"> {{$errors->first('jenis_permintaan')}} </div>
                  @endif
                </div>
                <div class="row">
                  <p style="margin: 15px 0 0 15px">Jenis izin :</p>
                  <div class="col-md-4">
                    <label class="radio pmd-radio">
                      <input type="radio" name="jenis_izin" id="jenis_izin" value="Pit Worker Permit">
                      <span for="inlineRadio1">Pit Worker Permit</span> 
                    </label>
                  </div>
                  <div class="col-md-4">
                    <label class="radio pmd-radio">
                      <input type="radio" name="jenis_izin" id="jenis_izin" value="In Pit Access Only">
                      <span for="inlineRadio1">In Pit Access Only</span> 
                    </label>
                  </div>
                  <div class="col-md-4">
                    <label class="radio pmd-radio">
                      <input type="radio" name="jenis_izin" id="jenis_izin" value="Full Pit Access">
                      <span for="inlineRadio1">Full Pit Access</span> 
                    </label>
                  </div>
                  @if($errors->has('jenis_izin'))
                    <div class="alert alert-danger" role="alert"> {{$errors->first('jenis_izin')}} </div>
                  @endif
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-12">
                <p><strong>Alasan dan Justifikasi</strong></p>
              </div>
              <div class="col-md-3">
                <label class="radio-inline pmd-radio">
                  <input type="radio" name="alasan" id="inlineRadio1" value="Wajib Perusahaan">
                  <span for="inlineRadio1">Wajib Perusahaan</span> 
                </label>
              </div>
              <div class="col-md-3">
                <label class="radio-inline pmd-radio">
                  <input type="radio" name="alasan" id="inlineRadio1" value="Syarat Pekerjaan">
                  <span for="inlineRadio1">Syarat Pekerjaan</span> 
                </label>
              </div>
              <div class="col-md-2">
                <label class="radio-inline pmd-radio">
                  <input type="radio" name="alasan" id="inlineRadio1" value="Penyegar">
                  <span for="inlineRadio1">Penyegar</span> 
                </label>
              </div>
              <div class="col-md-2">
                <label class="radio-inline pmd-radio">
                  <input type="radio" name="alasan" id="inlineRadio1" value="Pelanggaran">
                  <span for="inlineRadio1">Pelanggaran</span> 
                </label>
              </div>
              <div class="col-md-2">
                <label class="radio-inline pmd-radio">
                  <input type="radio" name="alasan" id="inlineRadio1" value="Lainnya...">
                  <span for="inlineRadio1">Lainnya...</span> 
                </label>
              </div>
                  @if($errors->has('alasan'))
                    <div class="alert alert-danger" role="alert"> {{$errors->first('alasan')}} </div>
                  @endif
            </div>
            <br>
            <div class="row">
              <div class="col-md-12">
                <p><strong>Persetujuan</strong></p>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" name="nama_pjo" value="{{old('nama_pjo')}}" placeholder="PJO Pemohon" class="form-control">
                  @if($errors->has('nama_pjo'))
                    <div class="alert alert-danger" role="alert"> {{$errors->first('nama_pjo')}} </div>
                  @endif
                </div>
                <div class="form-group">
                  <input type="text" name="nama_kasie" value="{{old('nama_kasie')}}" placeholder="Kasie Pemohon" class="form-control">
                  @if($errors->has('nama_kasie'))
                    <div class="alert alert-danger" role="alert"> {{$errors->first('nama_kasie')}} </div>
                  @endif
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" name="nama_kepala_teknik" value="{{old('nama_kepala_teknik')}}" placeholder="Kepala Teknik Tambang" class="form-control">
                  @if($errors->has('nama_kepala_teknik'))
                    <div class="alert alert-danger" role="alert"> {{$errors->first('nama_kepala_teknik')}} </div>
                  @endif
                </div>
                <div class="form-group">
                  <input type="text" name="nama_kasie_hse" value="{{old('nama_kasie_hse')}}" placeholder="Kasie HSE tambang dan Reklamasi" class="form-control">
                  @if($errors->has('nama_kasie_hse'))
                    <div class="alert alert-danger" role="alert"> {{$errors->first('nama_kasie_hse')}} </div>
                  @endif
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 text-right">
                <div class="pmd-card-actions">
                  <input type="submit" value="Submit" class="btn btn-primary next">
                </div>
              </div>
            </div>
          </div>
        </div> <!-- section content end --> 
            {{csrf_field()}} 
        </form>
      </div>
        
    </div>
  <!-- tab end -->
  <div class="container">
            <!-- Modal -->
    <div class="modal fade" id="modal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Blocked User</h4>
          </div>
          <div class="modal-body">
            
            <form name="form_hapus" action="" method="post" enctype="multipart/form-data">
              <div class="col-md-12 text-center">
          <h3>Maaf Berkas ini sedang dalam masa blokir</h3>
          <h5>untuk</h5>
          <h1 id="okeee"></h1>
          <h6>Hari</h6>   
            </div>
              <div class="modal-footer">
                <input type="button" data-dismiss = 'modal' class="btn btn-danger" value="Close">
              </div>
            </form>
          </div>
        </div><!--modal-content-->
      </div><!--modal-dialog-->
    </div><!--modal-->
  </div><!--container-->
        <!-- akhir pop up -->

  @endsection

@endif




@section('script')

<!-- Scripts Starts -->
<script src="{{ url('Admin/assets/js/jquery-1.12.2.min.js')}}"></script>
<script src="{{ url('Admin/assets/js/bootstrap.min.js')}}"></script>
<script src="{{ url('Admin/assets/js/propeller.min.js')}}"></script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
  @if(Session::has('message'))
    var type="{{Session::get('alert-type','success')}}"
  
    switch(type){
      case 'success':
       toastr.info("{{ Session::get('message') }}");
       break;
    case 'error':
      toastr.error("{{ Session::get('message') }}");
      break;
    case 'blok':
      $('#modal').modal('show');
      document.getElementById('okeee').innerHTML = "{{ Session::get('message') }}";
      break;
    }
  @endif
</script>

@endsection