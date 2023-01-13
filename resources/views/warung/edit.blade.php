@extends('layouts.layout')
@section('title') {{'Warung Makan'}} @endsection
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
                                <label class="col-sm-4 control-label">Kode Rumah Makan</label>
                                <div class="col-sm-8">
                                    <input name="kd_warung" value="{{$warung->kd_warung}}" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Nama Rumah Makan</label>
                                <div class="col-sm-8">
                                    <input name="nama_warung" value="{{$warung->nama_warung}}" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Alamat</label>
                                <div class="col-sm-8">
                                    <textarea name="alamat" class="form-control" rows="3">{{$warung->alamat}}</textarea>
                                </div>
                            </div>
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
                            <div class="form-group">
                                <label class="col-sm-4 control-label">No Handphone</label>
                                <div class="col-sm-8">
                                    <input name="no_hp" value="{{$warung->no_hp}}" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Latitude</label>
                                <div class="col-sm-8">
                                    <input name="latitude" value="{{$warung->latitude}}" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Longitude</label>
                                <div class="col-sm-8">
                                    <input name="longitude" value="{{$warung->longitude}}" type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                        {{-- kolom kanan 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Kategori Menu</label>
                                <div class="col-sm-8">
                                    <select class="form-control">
                                        <option>option 1</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                        <option>option 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Nama Menu</label>
                                <div class="col-sm-8">
                                    <select class="form-control">
                                        <option>option 1</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                        <option>option 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Harga</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control">
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-4 control-label">Fasilitas</label>
                                <div class="col-sm-8">
                                    <select class="form-control">
                                        <option>option 1</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                        <option>option 5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        --}}
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