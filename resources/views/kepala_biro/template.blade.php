<!doctype html>
<html lang="">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Propeller Admin Dashboard">
<meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport">

<title>PT Semen Padang | Kami Telah Berbuat Sebelum Yang Lain Memikirkan</title>
    <link rel="shortcut icon" type="image/png" href="{{ url('Admin/themes/images/ikon.png')}}" />

@yield('head')

</head>

<body>
<!-- Header Starts -->
<!--Start Nav bar -->
<nav class="navbar navbar-inverse navbar-fixed-top pmd-navbar pmd-z-depth">

	<div class="container-fluid">
		{{-- notification --}}
		<div class="pmd-navbar-right-icon pull-right navigation">
			<!-- Notifications -->
            <div class="dropdown notification icons pmd-dropdown">
			
				<a title="Notification" class="dropdown-toggle pmd-ripple-effect"  data-toggle="dropdown" role="button" aria-expanded="true">
					@if($jumlah_notifikasi > 0)
					<div data-badge="{{$jumlah_notifikasi}}" class="material-icons md-light pmd-sm pmd-badge  pmd-badge-overlap">notifications_none</div>
					@else
					<div class="material-icons md-light pmd-sm pmd-badge  pmd-badge-overlap">notifications_none</div>
					@endif
				</a>
			
				<div class="dropdown-menu dropdown-menu-right pmd-card pmd-card-default pmd-z-depth" role="menu" style="width: 350px">
					<!-- Card header -->
					<div class="pmd-card-title">
						<div class="media-body media-middle">
							<a class="pull-right">{{$jumlah_notifikasi}} Notifikasi baru</a>
							<h3 class="pmd-card-title-text">Notifikasi</h3>
						</div>
					</div>
					
					<!-- Notifications list -->
					<ul class="list-group pmd-list-avatar pmd-card-list">
						@if($jumlah_notifikasi < 1)
						<li class="list-group-item">
							<p class="notification-blank">
								<span class="dic dic-notifications-none"></span> 
								<span>You don´t have any notifications</span>
							</p>
						</li>
						@else
							@foreach($top_notifikasis as $notifikasi)
								@if($notifikasi->status == 'belum')
									<li class="list-group-item unread">
										<a href="{{url('kepala_biro/detail_notifikasi/'.$notifikasi->id.'/'.$notifikasi->pekerja_id)}}">
											<div class="media-body">
												<span class="list-group-item-heading">{{$notifikasi->deskripsi}}</span>
												<span class="list-group-item-text">{{$notifikasi->dari}}</span>
											</div>
										</a>
									</li>
								@else
									<li class="list-group-item">
										<a href="{{url('kepala_biro/detail_notifikasi/'.$notifikasi->id.'/'.$notifikasi->pekerja_id)}}">
											<div class="media-body">
												<span class="list-group-item-heading">{{$notifikasi->deskripsi}}</span>
												<span class="list-group-item-text">{{$notifikasi->dari}}</span>
											</div>
										</a>
									</li>
								@endif
							@endforeach
						@endif
					</ul><!-- End notifications list -->

				</div>
				
				
            </div> <!-- End notifications -->
		</div>

		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<a href="javascript:void(0);" data-target="basicSidebar" data-placement="left" data-position="slidepush" is-open="true" is-open-width="1200" class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect pull-left margin-r8 pmd-sidebar-toggle"><i class="material-icons md-light">menu</i></a>	
		  <a href="index.html" class="navbar-brand"><img src="{{url('Admin/themes/images/logo.png')}}" alt="PT. Semen Padang">
		  </a>
		</div>
	</div>

</nav><!--End Nav bar -->
<!-- Header Ends -->

<!-- Sidebar Starts -->
<div class="pmd-sidebar-overlay"></div>

<!-- Left sidebar -->
<aside id="basicSidebar" class="pmd-sidebar  sidebar-default pmd-sidebar-slide-push pmd-sidebar-left pmd-sidebar-open bg-fill-darkblue sidebar-with-icons" role="navigation">
	<ul class="nav pmd-sidebar-nav">
		
		<!-- User info -->
		<!-- User info -->
		<li class="dropdown pmd-dropdown pmd-user-info visible-xs visible-md visible-sm visible-lg">
			<a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true" aria-expandedhref="javascript:void(0);">
				<div class="media-body media-middle">Admin Kepala Biro</div>
				<div class="media-right media-middle"><i class="dic-more-vert dic"></i></div>
			</a>
		</li><!-- End user info -->
		
		<li> 
			<a class="pmd-ripple-effect" href="{{ url('/kepala_biro')}}">	
				<i class="media-left media-middle"><svg version="1.1" x="0px" y="0px" width="19.83px" height="18px" viewBox="287.725 407.535 19.83 18" enable-background="new 287.725 407.535 19.83 18"
				 xml:space="preserve">
			<g>
				<path fill="#C9C8C8" d="M307.555,407.535h-9.108v10.264h9.108V407.535z M287.725,407.535v6.232h9.109v-6.232H287.725z
					 M296.834,415.271h-9.109v10.264h9.109V415.271z M307.555,419.303h-9.108v6.232h9.108V419.303z"/>
			</g>
			</svg>
		</i>
				<span class="media-body">Dashboard</span>
			</a> 
		</li>
		
		
		<li class="dropdown pmd-dropdown"> 
			<a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true" href="javascript:void(0);">	
				<i class="material-icons media-left pmd-sm">insert_drive_file</i>
				<span class="media-body">Berkas Pekerja</span>
				<div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
			</a> 
			<ul class="dropdown-menu">
				<li><a href="{{url('kepala_biro/daftar_permintaan')}}">Daftar Permintaan</a></li>
				<li><a href="{{url('kepala_biro/daftar_izin_aktif')}}">Daftar Izin Aktif</a></li>
			</ul>
		</li>

		<li> 
			<a class="pmd-ripple-effect" href="{{ url('kepala_biro/notifikasi')}}">	
				<i class="media-left media-middle">
				<svg version="1.1" id="Layer_1" x="0px" y="0px" width="15.3px" height="18px" viewBox="289.99 337.535 15.3 18" enable-background="new 289.99 337.535 15.3 18" xml:space="preserve">
					<g>
						<g>
							<path fill="#C9C8C8" d="M297.64,355.535c0.99,0,1.8-0.81,1.8-1.8h-3.6C295.84,354.725,296.65,355.535,297.64,355.535z
								 M303.49,350.135v-4.95c0-2.79-1.891-5.041-4.501-5.67v-0.63c0-0.72-0.63-1.35-1.35-1.35c-0.72,0-1.35,0.63-1.35,1.35v0.63
								c-2.61,0.629-4.5,2.88-4.5,5.67v4.95l-1.8,1.8v0.9h15.3v-0.9L303.49,350.135z"/>
						</g>
					</g>
				</svg></i> 
				<span class="media-body">Notifikasi</span>
			</a> 
		</li>

		<li> 
			<a class="pmd-ripple-effect" href="{{ url('logout_kepala_biro')}}">	
				<i class="media-left media-middle">
				<svg version="1.1" id="Layer_1" x="0px" y="0px" width="18px" height="18px" viewBox="288.64 337.535 18 18" enable-background="new 288.64 337.535 18 18" xml:space="preserve">
				<path fill="#C9C8C8" d="M295.39,337.535v2.25h9v13.5h-9v2.25h11.25v-18H295.39z M297.64,342.035v3.375h-9v2.25h9v3.375l3.375-3.375
					l1.125-1.125l-1.125-1.125L297.64,342.035z"/>
				</svg></i> 
				<span class="media-body">Logout</span>
			</a> 
		</li>
		
	</ul>
</aside><!-- End Left sidebar -->
<!-- Sidebar Ends -->  
	
<!--content area start-->
<div id="content" class="pmd-content inner-page">

		@yield('content')

</div><!--end content area-->

<!-- Footer Starts -->
<!--footer start-->
<footer class="admin-footer">
 <div class="container-fluid">
 	<ul class="list-unstyled list-inline">
	 	<li>
			<span class="pmd-card-subtitle-text">Propeller &copy; <span class="auto-update-year"></span>. All Rights Reserved.</span>
			<h3 class="pmd-card-subtitle-text">Licensed under <a href="https://opensource.org/licenses/MIT" target="_blank">MIT license.</a></h3>
        </li>
        <li class="pull-right for-support">
			<a href="mailto:support@propeller.in">
          		<div>

            	</div>
            	<div>
				  <span class="pmd-card-subtitle-text">For Support</span>
				  <h3 class="pmd-card-title-text">support@propeller.in</h3>
				</div>
            </a>
        </li>
    </ul>
 </div>
</footer>
<!--footer end-->
<!-- Footer Ends -->

@yield('script')

</body>
</html>