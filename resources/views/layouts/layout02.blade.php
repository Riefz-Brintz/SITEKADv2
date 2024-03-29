<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  {{-- 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png"> --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">


  <title>Blank | Creative - Bootstrap 3 Responsive Admin Template</title>

  <!-- Bootstrap CSS -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="{{ asset('css/bootstrap-theme.css') }}" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="{{ asset('css/elegant-icons-style.css') }}" rel="stylesheet" >
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" >
  <!-- Custom styles -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet" >
  <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" >


  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
      ======================================================= -->
    </head>

    <body>
      <!-- container section start -->
      <section id="container" class="">
        <!--header start-->

        <header class="header dark-bg">
          <div class="toggle-nav">
            <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
          </div>

          <!--logo start-->
          <a href="index.html" class="logo">Nice <span class="lite">Admin</span></a>
          <!--logo end-->

          <div class="nav search-row" id="top_menu">
            <!--  search form start -->
            <ul class="nav top-menu">
              <li>
                <form class="navbar-form">
                  <input class="form-control" placeholder="Search" type="text">
                </form>
              </li>
            </ul>
            <!--  search form end -->
          </div>

      </header>
      <!--header end-->

      <!--sidebar start-->
      <aside>
        <div id="sidebar" class="nav-collapse ">
          <!-- sidebar menu start-->
          <ul class="sidebar-menu">
            <li class="">
              <a class="" href="index.html">
                <i class="icon_house_alt"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <li class="sub-menu">
              <a href="javascript:;" class="">
                <i class="icon_document_alt"></i>
                <span>Forms</span>
                <span class="menu-arrow arrow_carrot-right"></span>
              </a>
              <ul class="sub">
                <li><a class="" href="form_component.html">Form Elements</a></li>
                <li><a class="" href="form_validation.html">Form Validation</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;" class="">
                <i class="icon_desktop"></i>
                <span>UI Fitures</span>
                <span class="menu-arrow arrow_carrot-right"></span>
              </a>
              <ul class="sub">
                <li><a class="" href="general.html">Components</a></li>
                <li><a class="" href="buttons.html">Buttons</a></li>
                <li><a class="" href="grids.html">Grids</a></li>
              </ul>
            </li>
            <li>
              <a class="" href="widgets.html">
                <i class="icon_genius"></i>
                <span>Widgets</span>
              </a>
            </li>
            <li>
              <a class="" href="chart-chartjs.html">
                <i class="icon_piechart"></i>
                <span>Charts</span>

              </a>

            </li>

            <li class="sub-menu">
              <a href="javascript:;" class="">
                <i class="icon_table"></i>
                <span>Tables</span>
                <span class="menu-arrow arrow_carrot-right"></span>
              </a>
              <ul class="sub">
                <li><a class="" href="basic_table.html">Basic Table</a></li>
              </ul>
            </li>

            <li class="sub-menu ">
              <a href="javascript:;" class="">
                <i class="icon_documents_alt"></i>
                <span>Pages</span>
                <span class="menu-arrow arrow_carrot-right"></span>
              </a>
              <ul class="sub">
                <li><a class="" href="profile.html">Profile</a></li>
                <li><a class="" href="login.html"><span>Login Page</span></a></li>
                <li><a class="" href="contact.html"><span>Contact Page</span></a></li>
                <li><a class="active" href="blank.html">Blank Page</a></li>
                <li><a class="" href="404.html">404 Error</a></li>
              </ul>
            </li>

          </ul>
          <!-- sidebar menu end-->
        </div>
      </aside>
      <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">

          <div class="row">
            <div class="col-lg-12">
              <h3 class="page-header"><i class="fa fa fa-bars"></i> Pages</h3>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="fa fa-bars"></i>Pages</li>
                <li><i class="fa fa-square-o"></i>Pages</li>
              </ol>
            </div>
          </div>
          @yield('content')

          <!-- page start-->
          Page content goes here
          <!-- page end-->

        </section>

      </section>
      <!--main content end-->
      <div class="text-right">

        <div class="credits">
          Created By <a href="#">Brintz</a>
        </div>
      </div>

    </section>
    <!-- container section end -->

    <!-- javascripts -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
        @yield ('scriptbarang')

    <script src="{{ asset('js/jquery-ui-1.10.4.min.js') }}"></script>

    <!-- nice scroll -->
    <script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <!--custome script for all page-->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

  <script src="{{ asset('js/select2.min.js') }}"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.select2nih').select2();
    });
  </script>

  </body>

  </html>
