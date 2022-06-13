<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('dist/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('dist/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('dist/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('dist/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('dist/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->
  @yield('DataTablesCss')
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('dist/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('dist/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('dist/plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @yield('Alert')
  <style> 
  #sparkline-1 {
    display: none;
  }
  #sparkline-2 {
    display: none;
  }
  #sparkline-3 {
    display: none;
  }
   </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    
     
    </ul>

    


  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
    <img src="{{ asset('image/icon.png') }}" alt="israa travel Logo" class="nav-icon"
          style="opacity: .8;width: 50px; height: 50px" > 
      <span class="brand-text font-weight-light">Israa Travel Agency</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
     
        <div class="info">
          <a href="#" class="d-block">	</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
       <!-- Sidebar Menu -->
 <nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item has-treeview menu-open">
          <a href="{{ url('/') }}" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard </p>
          </a>
       
    </li>
    <li class="nav-item">
      <a  href="{{ route('hotels.index')}}"class="nav-link">
      <i class="fas fa-hotel"></i>
        <p>
          Gestion Hotel
         
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a  href="{{ route('arrangements.index')}}"class="nav-link">
      <i class="fas fa-hotel"></i>
        <p>
          Arrangement
         
        </p>
      </a>
    </li>
  
    <li class="nav-item">
      <a  href="{{ route('voyages.index')}}"class="nav-link">
        <i class="fas fa-plane"></i>
        <p>
          Gestion voyage
         
        </p>
      </a>
    </li>
    
    <li class="nav-item">
      <a  href="{{ route('circuits.index')}}"class="nav-link">
        <i class="fas fa-car-side"></i>
        
        <p>
          Gestion circuit
        
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a  href="{{ route('events.index')}}"class="nav-link">
      <i class="fas fa-calendar-check"></i>
        <p>

          Gestion evenement 
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a  href="{{ route('reservations.index')}}"class="nav-link">
      
      <i class="fas fa-concierge-bell"></i>
        
        <p>
         Reservations
        </p>
      </a>
    </li>
    <li class="nav-item ">
     
      <a class="nav-link" href="{{ route('logout') }}"
         onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
           <i class="nav-icon fas fa-sign-out-alt"></i><p>{{ __('Logout') }}   </p>
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
      </form>
  
</li>

  </ul>
</nav>
<!-- /.sidebar-menu -->
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
@yield('main')
  <footer class="main-footer">
    <strong>Copyright &copy; 2021-2022 <a href="http://israatravel.com"></a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('dist/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('dist/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Select2 -->
<script src="{{ asset('dist/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('dist/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('dist/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('dist/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('dist/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('dist/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('dist/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('dist/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('dist/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('dist/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('dist/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('dist/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
@yield('DataTableJS')
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
@yield('DataTable')
@yield('modelEdit')
@yield('SlectList')
@stack('remplireTable')
@stack('imprimer')
</body>
</html>
