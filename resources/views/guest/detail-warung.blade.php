<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Lokasi</title>
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

            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Detail Warung Makan</h3>
                    <a href="/home" class="btn btn-default pull-right">Kembali</a>
                </div>
                <div class="box-body">
                <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>
                                    {{$warung->nama_warung}}
                                </td>
                            </tr>
                            <tr>
                                <td>Foto 1</td>
                                <td>
                                    <img src="{{ asset('img/upload') }}/{{$warung->foto_1}}" alt="" style="height: 200px;">
                                </td>
                            </tr>
                            <tr>
                                <td>Foto 2</td>
                                <td>
                                    <img src="{{ asset('img/upload') }}/{{$warung->foto_2}}" alt="" style="height: 200px;">
                                </td>
                            </tr>
                            <tr>
                                <td>No. HP</td>
                                <td>
                                    {{$warung->no_hp}}
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>
                                    {{$warung->alamat}}
                                </td>
                            </tr>
                            <tr>
                                <td>Lokasi</td>
                                <td>
                                    <div id="map" class="w-100 mt-2" style="height: 300px; margin-top: 20px"></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <input type="hidden" name="latitude" value="{{$warung->latitude}}">
                    <input type="hidden" name="longitude" value="{{$warung->longitude}}">
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
    <script type="text/javascript">
        var myMarker;
        
        var latWarung = $('input[name=latitude]').val();
        var lngWarung = $('input[name=longitude]').val();

        // cek apakah warung sudah memiliki koordinat
        if (latWarung && lngWarung) {
            // coord warung
            var defaultCoord = {
                lat: latWarung, 
                lng: lngWarung
            };
        } else {
            // default coord tugu jogja
            var defaultCoord = {
                lat: -7.78290, 
                lng: 110.36707
            };
        }

        var options = {
            center: [defaultCoord.lat, defaultCoord.lng],
            zoom: 15
        };

        // tampilkan map
        var map = L.map('map', options);
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {attribution: 'OSM'}).addTo(map);

        var apiSearchBaseUrl =  `https://nominatim.openstreetmap.org/search?`;
        var nominatimParams = {
            q: '',
            format: 'json',
            limit: 5
        };

        function setMarker(coord) {
            // buat marker
            myMarker = L.marker([coord.lat, coord.lng], {draggable: true})
                .addTo(map)
                .on('dragend', function() {
                    var {lat, lng} = myMarker.getLatLng();
                    map.panTo(new L.LatLng(lat, lng));

                    // set value input koordinat
                    $('input[name=latitude]').val(lat);
                    $('input[name=longitude]').val(lng);
                });

            // recenter map sesuai marker
            map.panTo(new L.LatLng(coord.lat, coord.lng));
        }

        function resetMapView(lat, lng) {
            // reset marker
            map.removeLayer(myMarker)
            setMarker({lat, lng});

            // set value input koordinat
            $('input[name=latitude]').val(lat);
            $('input[name=longitude]').val(lng);
        }

        $(document).ready(function() {
            // set default marker
            setMarker(defaultCoord);
        });
    </script>
</body>
</html>