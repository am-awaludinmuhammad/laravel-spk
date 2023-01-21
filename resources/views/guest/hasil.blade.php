<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hasil Rekomendasi Warung Bakso</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body style="background-color: #f8f8f8">

    <section class="content">
        <div class="container">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Hasil Rekomendasi Warung Bakso</h3>
                    <a href="/home" class="btn btn-default pull-right">Kembali</a>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($listWarung)
                                @foreach ($listWarung as $warung)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            {{$warung['nama_warung']}}
                                        </td>
                                        <td>
                                            {{$warung['alamat']}}
                                        </td>
                                        <td>
                                            <a href="/warung/map/{{$warung['kd_warung']}}">Lihat Map</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    
    <!-- jQuery 3 -->
    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
</body>
</html>