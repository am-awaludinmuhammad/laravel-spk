<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
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

    <!-- Google Font -->
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>

  <body class="hold-transition skin-blue sidebar-mini">
    <div class="container">
        <section class="content">
            <div class="text-center" style="margin-top: 20vh;">
                <h3>Selamat Datang</h3>
                <h4>SISTEM PENDUKUNG KEPUTUSAN PEMILIHAN WARUNG BAKSO DI YOGYAKARTA</h4>
                <br>
                <div class="col-md-4" style="float:none; margin:0vh auto;">
                    <form class="form-horizontal" action="/login" method="post">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" name="username" class="form-control" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">                        
                                <div class="col-sm-12">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Log In</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
        </section>
    </div>
    
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
  </body>

</html>
