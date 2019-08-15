<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>ERPOS | Dev</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="{{ asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('admin/bower_components/font-awesome/css/font-awesome.min.css') }}">
	<!-- Ionicons -->
	{{-- <link rel="stylesheet" href="{{ asset('admin/bower_components/Ionicons/css/ionicons.min.css') }}"> --}}
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('admin/dist/css/AdminLTE.min.css') }}">
	<!-- Material Design -->
	{{-- <link rel="stylesheet" href="{{ asset('admin/dist/css/bootstrap-material-design.min.css') }}"> --}}
	{{-- <link rel="stylesheet" href="{{ asset('admin/dist/css/ripples.min.css') }}"> --}}
	{{-- <link rel="stylesheet" href="{{ asset('admin/dist/css/MaterialAdminLTE.min.css') }}"> --}}
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  	folder instead of downloading all of them to reduce the load. -->
  	{{-- <link rel="stylesheet" href="{{ asset('admin/dist/css/skins/all-md-skins.min.css') }}"> --}}
  	<!-- Morris chart -->
{{--   	<link rel="stylesheet" href="{{ asset('admin/bower_components/morris.js/morris.css') }}">
  	<!-- jvectormap -->
  	<link rel="stylesheet" href="{{ asset('admin/bower_components/jvectormap/jquery-jvectormap.css') }}">
  	<!-- Date Picker -->
  	<link rel="stylesheet" href="{{ asset('admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  	<!-- Daterange picker -->
  	<link rel="stylesheet" href="{{ asset('admin/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  	<!-- bootstrap wysihtml5 - text editor -->
  	<link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}"> --}}
  	<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />

  	<style type="text/css">
  		/*.skin-blue .main-header .navbar {
		    background-color: #2196f3;
		}
		.skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side {
		    background-color: #222d32;
		}
		.skin-blue .main-header .logo {
		    background-color: #0d8aee;
		    color: #fff;
		    border-bottom: 0 solid transparent;
		}*/
		li a {
		    color: #fff;
		    font-weight: bold;
		}

		.nav-link{
			color: #000;
		}
		.skin-blue .main-header .navbar {
			background-color: #036dad;
		}
		.skin-blue .main-header .logo {
			background-color: #036dad;
			color: #fff;
			border-bottom: 0 solid transparent;
		}

		.skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side {
			background-color: #222d32;
			background: -webkit-linear-gradient(top, #0068a7 0%,#2ab2ff 100%);
			background: -o-linear-gradient(top, #0068a7 0%,#2ab2ff 100%);
			background: -ms-linear-gradient(top, #0068a7 0%,#2ab2ff 100%);
			background: linear-gradient(top, #0068a7 0%,#2ab2ff 100%);
		}

		.select2-container--default .select2-selection--single {
			background-color: #fff;
			/*border: 1px solid #aaa; */
			border-radius: 0; 
			height: 35px;
		}
.main-header .sidebar-toggle{
	color: #fff;
}
	</style>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="{{ asset('admin/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic') }}">

</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<header class="main-header">
			<!-- Logo -->
			<a href="index2.html" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini">M<b>A</b>L</span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b>ERPOS</b>Material</span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>


			</nav>
		</header>
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
	{{-- <section class="sidebar">
		
		<ul class="sidebar-menu" data-widget="tree">
			
			<li class="active treeview">
				<a href="#">
					<i class="fa fa-dashboard"></i> <span>Dashboard</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
					<li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
				</ul>
			</li>
			
			
		</section> --}}

		<section class="sidebar">

			<ul class="sidebar-menu" data-widget="tree">

				<li class="active treeview">
					<a href="#">
						<i class="fa fa-dashboard"></i> <span>Master Data</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="{{ route('Barang') }}"><i class="fa fa-circle-o"></i>Master Barang</a></li>
						<li><a href="{{ route('Customer') }}"><i class="fa fa-circle-o"></i>Master Customer</a></li>
						<li><a href="{{ route('Supplier') }}"><i class="fa fa-circle-o"></i>Master Supplier</a></li>


					</ul>
				</li>

				<li class="active treeview">
					<a href="#">
						<i class="fa fa-dashboard"></i> <span>Transaksi</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="{{ route('Pembelian') }}"><i class="fa fa-circle-o"></i>Pembelian</a></li>
						<li><a href="{{ route('Penjualan') }}"><i class="fa fa-circle-o"></i>Penjualan</a></li>
						

					</ul>
				</li>


			</section>


			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			@yield('content')
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> 2.4.0
			</div>
			<strong>Copyright &copy; 2014-2018 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>, <a href="https://fezvrasta.github.io">Federico Zivolo</a> and <a href="https://ducthanhnguyen.github.io">Thanh Nguyen</a>.</strong> All rights
			reserved.
		</footer>

		<!-- Control Sidebar -->
		<!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  	immediately after the control sidebar -->
  	<div class="control-sidebar-bg"></div>
  </div>
  <script src="{{ asset('admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('admin/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>

  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
  	$.widget.bridge('uibutton', $.ui.button);
  </script>

  @yield ('scriptbarang')
  <!-- Bootstrap 3.3.7 -->
  
  <script src="{{ asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <!-- Material Design -->
{{--   <script src="{{ asset('admin/dist/js/material.min.js') }}"></script>
<script src="{{ asset('admin/dist/js/ripples.min.js') }}"></script> --}}
<script>
	$.material.init();
</script>


  <script src="{{ asset('js/select2.min.js') }}"></script>
  <script type="text/javascript">
  	$(document).ready(function() {
  		$('.select2nih').select2();
  	});
  </script>
</body>

</html>