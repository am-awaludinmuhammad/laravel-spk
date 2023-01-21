<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
</head>
<body style="background-color: #f8f8f8">
    <section class="content">
        <div class="container">
            <div id="map" class="w-100 mt-2" style="display:none; height: 100px; margin-top: 20px"></div>

            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">List Warung Bakso</h3>
                </div>

                <div class="box-body">
                    <div class="row">
                        @if (!empty($listWarung))
                            @foreach ($listWarung as $warung)
                                <div class="col-lg-3 col-xs-6">
                                    <div class="small-box bg-aqua">
                                        <div class="inner">
                                            <h4>{{$warung->nama_warung}}</h4>
                                            <p>{{$warung->alamat}}</p>
                                        </div>
                                        <a href="#" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Pilih Warung Bakso</h3>
                </div>

                <div class="box-body">
                    <form role="form" action="/hitung" method="post">
                        @csrf
                        <input type="hidden" name="latitude">
                        <input type="hidden" name="longitude">

                        <div class="box-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listWarung as $warung)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="kd_warung[{{ $warung->kd_warung }}]">
                                                {{$warung->nama_warung}}
                                            </td>
                                            <td>
                                                {{$warung->alamat}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
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

    <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>

    <script>
        var myMarker;
        var defaultCoord = {
            lat: -7.78290, 
            lng: 110.36707
        };

        var options = {
            center: [defaultCoord.lat, defaultCoord.lng],
            zoom: 10
        };

        // tampilkan map
        var map = L.map('map', options);
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {attribution: 'OSM'}).addTo(map);

        function getLocation() {
            map.locate({
                setView: true,
                enableHighAccuracy: true
            })
            .on('locationfound', function(e) {
                var marker = new L.marker(e.latlng);
                
                var coord = e.latlng;

                // coordinat user saat ini
                $('input[name=latitude]').val(coord.lat);
                $('input[name=longitude]').val(coord.lng);

                marker.addTo(map);
            });
        }  
        
        getLocation();
    </script>
</body>
</html>