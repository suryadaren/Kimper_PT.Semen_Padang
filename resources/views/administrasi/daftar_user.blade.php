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

<!-- DataTables css-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.0/css/select.dataTables.min.css">
<!-- Propeller dataTables css-->

<link rel="stylesheet" type="text/css" href="{{url('Admin/components/data-table/css/pmd-datatable.css')}}">

<!-- Propeller theme css-->
<link rel="stylesheet" type="text/css" href="{{url('Admin/themes/css/propeller-theme.css')}}" />

<!-- Propeller admin theme css-->
<link rel="stylesheet" type="text/css" href="{{url('Admin/themes/css/propeller-admin.css')}}">
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

@endsection



@section('content')

<!--tab start-->
<div class="container-fluid full-width-container data-tables">
    <!-- Title -->
    <h1 class="section-title" id="services">
      <span>Daftar User Level Administrasi</span>
    </h1><!-- End Title -->
  
    <!--breadcrum start-->
    <ol class="breadcrumb text-left">
      <li><a href="{{ url('administrasi')}}">Dashboard</a></li>
      <li class="active">Daftar Akun Admin Administrasi</li>
    </ol><!--breadcrum end-->
  
    <!-- Responsive table -->
    <section class="row component-section">
    
      <!-- responsive table code and example -->
      <div class="col-md-12">
        <!-- responsive table example -->
        <div class="pmd-card pmd-z-depth pmd-card-custom-view">
          <table id="example" class="table pmd-table table-hover table-striped display responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>NIP</th>
                <th></th>
                <th>Username</th>
                <th>Email</th>
                <th>Level</th>
              </tr>
            </thead>
            <tbody>
              @foreach($penggunas as $pengguna)
              <tr onclick="detail('{{$pengguna->id}}','{{$pengguna->username}}','{{$pengguna->email}}','{{$pengguna->nip}}','{{$pengguna->level}}')">
                <td>{{$pengguna->nip}}</td>
                <td></td>
                <td>{{$pengguna->username}}</td>
                <td>{{$pengguna->email}}</td>
                <td>{{$pengguna->level}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div> <!-- responsive table example end -->
        
      </div> <!-- responsive table code and example end-->
    </section> <!-- Responsive table end -->
    
  </div>
<!--tab start-->

    {{-- pop up detail data --}}
     <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="detail">
          <div class="modal-dialog" role="document" style="width: 60%">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <form name="form_detail" class="form-horizontal" action="{{url('administrasi/update_user')}}" method="post">
                        <h3 class="heading text-center" style="width: 100%">Detail  pengguna</h3>
                        <br>
                        <fieldset>
                          <div class="row">
                            <div class="col-sm-12">
                               <!-- input text -->
                               <input type="hidden" name="id">
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
                          
                        </fieldset>
                          <div class="pmd-modal-action text-right">
                            <button class="btn pmd-ripple-effect btn-primary" type="submit" >Update</button>
                            <button class="btn pmd-ripple-effect btn-danger" data-dismiss="modal" type="button" onclick="delete_user()">Delete</button>
                          </div>
                          @csrf
                          @method('put')
                      </form>
                    </div>
                  </div>

                </div>
              </div>
            </div><!--modal-content-->
          </div><!--modal-dialog-->
        </div><!--modal-->
    </div><!--container-->
    <!-- akhir pop up -->


    <div class="container">
          <!-- Modal -->
          <div class="modal fade" id="delete_user">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus User</h4>
                </div>
                <div class="modal-body">
                  
                  <form name="form_delete_user" action="{{ url('administrasi/delete_user')}}" method="post" enctype="multipart/form-data">
                    <div class="col-md-12">
                      <input type="hidden" name="id"></div>
                      <div class="form-group">
                        <label class="control-label">Hapus Data ini ?</label>
                      </div>
                      <br>
                    <div class="modal-footer">
                      <input type="button" class="btn btn-default" data-dismiss="modal" value="Tidak">
                      <input type="submit" class="btn btn-primary" value="Ya">
                    </div>
                    {{csrf_field()}}
                    @method('delete')
                  </form>
                </div>
              </div><!--modal-content-->
            </div><!--modal-dialog-->
          </div><!--modal-->
      </div><!--container-->
      <!-- akhir pop up -->

@endsection



@section('script')

<!-- Scripts Starts -->
<script src="{{ url('Admin/assets/js/jquery-1.12.2.min.js')}}"></script>
<script src="{{ url('Admin/assets/js/bootstrap.min.js')}}"></script>
<script src="{{ url('Admin/assets/js/propeller.min.js')}}"></script>

<script>

function delete_user(){
    $('#delete_user').modal('show');
}
function detail(id,username,email,nip,level){
      document.forms['form_detail']['id'].value=id;
      document.forms['form_detail']['username'].value=username;
      document.forms['form_detail']['email'].value=email;
      document.forms['form_detail']['nip'].value=nip;
      document.forms['form_detail']['level'].value=level;
      document.forms['form_delete_user']['id'].value=id;
      $('#detail').modal('show');

    }

</script>

<script>
  $(document).ready(function() {
    var sPath=window.location.pathname;
    var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
    $(".pmd-sidebar-nav").each(function(){
      $(this).find("a[href='"+sPage+"']").parents(".dropdown").addClass("open");
      $(this).find("a[href='"+sPage+"']").parents(".dropdown").find('.dropdown-menu').css("display", "block");
      $(this).find("a[href='"+sPage+"']").parents(".dropdown").find('a.dropdown-toggle').addClass("active");
      $(this).find("a[href='"+sPage+"']").addClass("active");
    });
    $(".auto-update-year").html(new Date().getFullYear());
  });
</script> 

<!-- Scripts Ends -->


<!-- Datatable js -->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<!-- Datatable Bootstrap -->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<!-- Datatable responsive js-->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>

<!-- Datatable select js-->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>


<!-- Propeller Data table js-->
<script>
//Propeller Customised Javascript code 
$(document).ready(function() {
  $('#example-checkbox').DataTable({
    responsive: false,
    columnDefs: [ {
      orderable: false,
      className: 'select-checkbox',
      targets:0,
    } ],
    select: {
      style: 'multi',
      selector: 'td:first-child'
    },
    order: [ 1, 'asc' ],
    bFilter: true,
    bLengthChange: true,
    pagingType: "simple",
    "paging": true,
    "searching": true,
    "language": {
      "info": " _START_ - _END_ of _TOTAL_ ",
      "sLengthMenu": "<span class='custom-select-title'>Rows per page:</span> <span class='custom-select'> _MENU_ </span>",
      "sSearch": "",
      "sSearchPlaceholder": "Search",
      "paginate": {
        "sNext": " ",
        "sPrevious": " "
      },
    },
    dom:
      "<'pmd-card-title'<'data-table-title'><'search-paper pmd-textfield'f>>" +
      "<'custom-select-info'<'custom-select-item'><'custom-select-action'>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'pmd-card-footer' <'pmd-datatable-pagination' l i p>>",
  });
  
  /// Select value
  $('.custom-select-info').hide();
  
  $('#example-checkbox tbody').on( 'click', 'tr', function () {
    if ( $(this).hasClass('selected') ) {
      var rowinfo = $(this).closest('.dataTables_wrapper').find('.select-info').text();
      $(this).closest('.dataTables_wrapper').find('.custom-select-info .custom-select-item').text(rowinfo);
      if ($(this).closest('.dataTables_wrapper').find('.custom-select-info .custom-select-item').text() != null){
        $(this).closest('.dataTables_wrapper').find('.custom-select-info').show();
        //show delet button
      } else{
        $(this).closest('.dataTables_wrapper').find('.custom-select-info').hide();
      }
    }
    else {
      var rowinfo = $(this).closest('.dataTables_wrapper').find('.select-info').text();
      $(this).closest('.dataTables_wrapper').find('.custom-select-info .custom-select-item').text(rowinfo);
    }
    if($('#example-checkbox').find('.selected').length == 0){
      $(this).closest('.dataTables_wrapper').find('.custom-select-info').hide();
    }
  } );
  $("div.data-table-title").html('<h2 class="pmd-card-title-text">Propeller Data table</h2>');
  $(".custom-select-action").html('<button class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary" type="button"><i class="material-icons pmd-sm">delete</i></button><button class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary" type="button"><i class="material-icons pmd-sm">more_vert</button>');
  
} );
</script>

<!-- Responsive Data table js-->
<script>
//Propeller  Customised Javascript code 
$(document).ready(function() {
  var exampleDatatable = $('#example').DataTable({
    responsive: {
      details: {
        type: 'column',
        target: 'tr'
      }
    },
    columnDefs: [ {
      className: 'control',
      orderable: false,
      targets:   1
    } ],
    order: [ 1, 'asc' ],
    bFilter: true,
    bLengthChange: true,
    pagingType: "simple",
    "paging": true,
    "searching": true,
    "language": {
      "info": " _START_ - _END_ of _TOTAL_ ",
      "sLengthMenu": "<span class='custom-select-title'>Rows per page:</span> <span class='custom-select'> _MENU_ </span>",
      "sSearch": "",
      "sSearchPlaceholder": "Search",
      "paginate": {
        "sNext": " ",
        "sPrevious": " "
      },
    },
    dom:
      "<'pmd-card-title'<'data-table-responsive pull-left'><'search-paper pmd-textfield'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'pmd-card-footer' <'pmd-datatable-pagination' l i p>>",
  });
  
  /// Select value
  $('.custom-select-info').hide();
  
  $(".custom-select-action").html('<button class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary" type="button"><i class="material-icons pmd-sm">delete</i></button><button class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary" type="button"><i class="material-icons pmd-sm">more_vert</i></button>');
    
} );
</script>

<!-- Inverse Table js-->
<script>
//Propeller  Customised Javascript code 
$(document).ready(function() {
  $('#tableInverse').DataTable({
    responsive: {
      details: {
        type: 'column',
        target: 'tr'
      }
    },
    columnDefs: [ {
      orderable: false,
      className: 'select-checkbox',
      targets:0,
    } ],
    select: {
      style: 'multi',
      selector: 'td:first-child'
    },
    order: [ 1, 'asc' ],
    bFilter: true,
    bLengthChange: true,
    //pagingType: "simple",
    "paging": true,
    "searching": true,
    "language": {
      "info": " _START_ - _END_ of _TOTAL_ ",
      "sLengthMenu": "<span class='custom-select-title'>Rows per page:</span> <span class='custom-select'> _MENU_ </span>",
      "sSearch": "",
      "sSearchPlaceholder": "Search",
      "paginate": {
        "sNext": " ",
        "sPrevious": " "
      },
    },
    dom:
      "<'pmd-card-title'<'data-table-inverse'><'search-paper pmd-textfield'f>>" +
      "<'custom-select-info'<'custom-select-item'><'custom-select-action'>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'pmd-card-footer' <'pmd-datatable-pagination' l i p>>",
  });
  
  /// Select value
  $('.custom-select-info').hide();
    
  $('#tableInverse tbody').on( 'click', 'tr', function () {
    if ( $(this).hasClass('selected') ) {
      var rowinfo = $(this).closest('.dataTables_wrapper').find('.select-info').text();
      $(this).closest('.dataTables_wrapper').find('.custom-select-info .custom-select-item').text(rowinfo);
      if ($(this).closest('.dataTables_wrapper').find('.custom-select-info .custom-select-item').text() != null){
        $(this).closest('.dataTables_wrapper').find('.custom-select-info').show();
        //show delet button
      } else{
        $(this).closest('.dataTables_wrapper').find('.custom-select-info').hide();
      }
    }
    else {
      var rowinfo = $(this).closest('.dataTables_wrapper').find('.select-info').text();
      $(this).closest('.dataTables_wrapper').find('.custom-select-info .custom-select-item').text(rowinfo);
    }
    if($('#tableInverse').find('.selected').length == 0){
      $(this).closest('.dataTables_wrapper').find('.custom-select-info').hide();
    }
  });
  $("div.data-table-inverse").html('<h2 class="pmd-card-title-text">Inverse Table</h2>');
  $(".custom-select-action").html('<button class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary" type="button"><i class="material-icons pmd-sm">delete</i></button><button class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary" type="button"><i class="material-icons pmd-sm">more_vert</i></button>');
  
} );
</script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
  @if(Session::has('message'))
    var type="{{Session::get('alert-type','success')}}"
  
    switch(type){
      case 'success':
       toastr.success("{{ Session::get('message') }}");
       break;
    case 'error':
      toastr.error("{{ Session::get('message') }}");
      break;
    }
  @endif
</script>

@endsection