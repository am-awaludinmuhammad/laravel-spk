<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        @yield('title')
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('css/skin-blue.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
    <!-- Google Font -->
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    @stack('styles')
  </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="#" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b></b></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b></b></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">

                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{ asset('img/user1-128x128.jpg') }}" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info" style="margin-top: 1rem;">
                            <p>{{ auth()->user()->nama_admin }}</p>
                        </div>
                    </div>
                    <ul class="sidebar-menu" data-widget="tree">
                        <?php
                            // cek halaman dari menu mana yang aktif (beranda, olah data admin, dll)

                            $urlSegment1 = request()->segment(1);
                            if ($urlSegment1 == 'beranda') {
                                $classBeranda = 'active';
                            } else {
                                $classBeranda = '';
                            }

                            if ($urlSegment1 == 'admin') {
                                $classAdmin = 'active';
                            } else {
                                $classAdmin = '';
                            }

                            if ($urlSegment1 == 'warung-makan') {
                                $classWarung = 'active';
                            } else {
                                $classWarung = '';
                            }

                            if ($urlSegment1 == 'fasilitas') {
                                $classFasilitas = 'active';
                            } else {
                                $classFasilitas = '';
                            }

                            if ($urlSegment1 == 'menu') {
                                $classMenu = 'active';
                            } else {
                                $classMenu = '';
                            }

                            if ($urlSegment1 == 'bobot') {
                                $classBobot = 'active';
                            } else {
                                $classBobot = '';
                            }

                            if ($urlSegment1 == 'kriteria') {
                                $classKriteria = 'active';
                            } else {
                                $classKriteria = '';
                            }
                        ?>

                        <li class="{{ $classBeranda }}">
                            <a href="/beranda"></i><span>Beranda</span></a>
                        </li>
                        <li class="{{ $classAdmin }}">
                            <a href="/admin"></i><span>Olah Data Admin</span></a>
                        </li>
                        <li class="{{ $classWarung }}">
                            <a href="/warung-makan"></i><span>Olah Data Warung Makan</span></a>
                        </li>
                        <li class="{{ $classFasilitas }}">
                            <a href="/fasilitas"></i><span>Olah Data Fasilitas</span></a>
                        </li>
                        <li class="{{ $classMenu }}">
                            <a href="/menu"></i><span>Olah Data Menu</span></a>
                        </li>
                        <li class="{{ $classBobot }}">
                            <a href="/bobot"></i><span>Olah Data Bobot</span></a>
                        </li>
                        <li class="{{ $classKriteria }}">
                            <a href="/kriteria"></i><span>Olah Data Kriteria</span></a>
                        </li>
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger" style="margin-top:20px; margin-left:12px; width:90%">Logout</button>
                            </form>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <div class="content-wrapper">
                @yield('content')
            </div>
        </div>

        <!-- jQuery 3 -->
        <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('js/adminlte.min.js') }}"></script>
                
        <!-- DataTables -->
        <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>

        <script>
            $(function () {
                $('.datatable').DataTable({
                    'paging'      : true,
                    'lengthChange': false,
                    'searching'   : true,
                    'ordering'    : false,
                    'info'        : false,
                    'autoWidth'   : false,
                    "oLanguage": {
                        "sSearch": "Cari"
                    }
                })
            })
        </script>
        
        @stack('scripts')
    </body>
</html>
