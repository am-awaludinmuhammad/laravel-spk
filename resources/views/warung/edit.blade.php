@extends('layouts.layout')
@section('title') {{'Warung Makan'}} @endsection
@push('styles')
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
@endpush
@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Data Warung Makan</h3>
            </div>
            <form class="form-horizontal" action="/warung-makan/update/{{$warung->kd_warung}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="row">
                        {{-- kolom kiri --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Nama Rumah Makan</label>
                                <div class="col-sm-8">
                                    <input required name="nama_warung" value="{{$warung->nama_warung}}" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">No Handphone</label>
                                <div class="col-sm-8">
                                    <input required name="no_hp" value="{{$warung->no_hp}}" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Tingkat Kenyamanan</label>
                                <div class="col-sm-8">
                                    <select required name="kenyamanan" required class="form-control">
                                        <option disabled value="">Pilih</option>
                                        <option {{$warung->kenyamanan == 1 ? 'selected' : ''}} value="1">1</option>
                                        <option {{$warung->kenyamanan == 2 ? 'selected' : ''}} value="2">2</option>
                                        <option {{$warung->kenyamanan == 3 ? 'selected' : ''}} value="3">3</option>
                                        <option {{$warung->kenyamanan == 4 ? 'selected' : ''}} value="4">4</option>
                                        <option {{$warung->kenyamanan == 5 ? 'selected' : ''}} value="5">5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Lokasi</label>
                                <div class="col-sm-8">
                                    <div class="input-group input-group-sm">
                                        <input name="search" type="text" class="form-control">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-info btn-flat btn-search">Cari</button>
                                        </span>
                                    </div>
                                    <table class="table table-hover">
                                        <tbody id="searchResults"></tbody>
                                    </table>
                                    <div id="map" class="w-100 mt-2" style="height: 300px; margin-top: 20px"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Alamat</label>
                                <div class="col-sm-8">
                                    <textarea required name="alamat" class="form-control" rows="3">{{$warung->alamat}}</textarea>
                                </div>
                            </div>
                            <input name="latitude" type="hidden" value="{{$warung->latitude}}" class="form-control">
                            <input name="longitude" type="hidden" value="{{$warung->longitude}}" class="form-control">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Foto 1</label>
                                <div class="col-sm-8">
                                    <input name="foto_1" type="file">
                                    <p class="help-block">File Gambar (.png, .jpg), max: 2MB</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Foto 2</label>
                                <div class="col-sm-8">
                                    <input name="foto_2" type="file">
                                    <p class="help-block">File Gambar (.png, .jpg), max: 2MB</p>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="box-footer">
                    <div class="pull-right">
                        <a href="/warung-makan" class="btn btn-default">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('scripts')
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
            zoom: 10
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

            map.on("click", function (e) {
                resetMapView(e.latlng.lat, e.latlng.lng)
            });

            // tombol search di klik
            $('.btn-search').click(function(e) {
                e.preventDefault()
                const search = $('input[name=search]').val();
                nominatimParams.q = search;
                const queryString = new URLSearchParams(nominatimParams).toString();

                // kosongkan hasil pencarian
                $('#searchResults').html('');

                // ambil data pencarian
                $.get(apiSearchBaseUrl+queryString, function( data ) {
                    data.forEach(item => {
                        // tampilkan hasil pencarian
                        let html = `<tr class="result" style="cursor: pointer" data-detail='${JSON.stringify(item)}'><td>${item.display_name}</td></tr>`
                        $('#searchResults').append(html);
                    });

                    if (data.length == 0) {
                        let html = `<tr><td>Tidak ditemukan</td></tr>`
                        $('#searchResults').append(html);
                    }
                });
            });

            // search result di klik 
            $('body').on('click', '.result', function(e) {
                const detail = $(this).data('detail');

                // clear search result
                $('#searchResults').html('');

                // reset map
                resetMapView(detail.lat, detail.lon)
            });
        });
    </script>
@endpush