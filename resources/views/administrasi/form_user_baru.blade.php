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



@section('content')

<!--tab start-->
  <div class="container-fluid full-width-container">
  
    <!-- Title -->
    <h1 class="section-title" id="services">
      <span>Form Input Data User</span>
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
     <form name="form_tambah" class="form-horizontal" action="{{url('administrasi/input_form_user')}}" enctype="multipart/form-data" method="post">
      <div class="pmd-card pmd-z-depth">
        <div class="pmd-card-body">
          <div class="row">
            <div class="col-md-12">
             <!-- input text -->
              <div class="form-group pmd-textfield">
                <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-10">
                  <input class="form-control input-sm" id="inputEmail3" placeholder="Username" type="text" name="username" value="{{old('username')}}">
                  @if($errors->has('username'))
                    <div class="alert alert-danger" role="alert"> {{$errors->first('username')}} </div>
                  @endif
                </div>
              </div>
              <div class="form-group pmd-textfield">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input class="form-control input-sm" id="inputEmail3" placeholder="Email" type="text" name="email" value="{{old('email')}}">
                  @if($errors->has('email'))
                    <div class="alert alert-danger" role="alert"> {{$errors->first('email')}} </div>
                  @endif
                </div>
              </div>
              <div class="form-group pmd-textfield">
                <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                  <input class="form-control input-sm" id="inputEmail3" placeholder="Password" type="password" name="password" value="{{old('password')}}">
                  @if($errors->has('password'))
                    <div class="alert alert-danger" role="alert"> {{$errors->first('password')}} </div>
                  @endif
                </div>
              </div>
              <div class="form-group pmd-textfield">
                <label for="inputEmail3" class="col-sm-2 control-label">Confirm Password</label>
                <div class="col-sm-10">
                  <input class="form-control input-sm" id="inputEmail3" placeholder="Confirm Password" type="password" name="password_confirmation" value="{{old('password_confirmation')}}">
                  @if($errors->has('password_confirmation'))
                    <div class="alert alert-danger" role="alert"> {{$errors->first('password_confirmation')}} </div>
                  @endif
                </div>
              </div>
              <div class="form-group pmd-textfield">
                <label for="inputEmail3" class="col-sm-2 control-label">NIP / NIK</label>
                <div class="col-sm-10">
                  <input class="form-control input-sm" id="inputEmail3" placeholder="NIP / NIK" type="text" name="nip" value="{{old('nip')}}">
                  @if($errors->has('nip'))
                    <div class="alert alert-danger" role="alert"> {{$errors->first('nip')}} </div>
                  @endif
                </div>
              </div>
              <div class="form-group pmd-textfield">
                <label for="inputEmail3" class="col-sm-2 control-label">Level</label>
                <div class="col-sm-10">
                  <select class="form-control" name="level">
                    <option value="administrasi">administrasi</option>
                    <option value="kepala_unit">kepala_unit</option>
                    <option value="tim_assesment">tim_assesment</option>
                    <option value="kepala_biro">kepala_biro</option>
                  </select>
                  @if($errors->has('level'))
                    <div class="alert alert-danger" role="alert"> {{$errors->first('level')}} </div>
                  @endif
                </div>
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
      
  </div><!-- tab end -->

@endsection



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
    }
  @endif
</script>

@endsection