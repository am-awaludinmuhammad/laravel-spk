@extends('layouts.layout')
@section('title') {{'Warung Makan'}} @endsection
@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Warung Makan</h3>
            </div>
            <form class="form-horizontal" action="/warung-makan/insert" method="post" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="row">
                        {{-- kolom kiri --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Nama Rumah Makan</label>
                                <div class="col-sm-8">
                                    <input required name="nama_warung" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Alamat</label>
                                <div class="col-sm-8">
                                    <textarea required name="alamat" class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Foto 1</label>
                                <div class="col-sm-8">
                                    <input required name="foto_1" type="file">
                                    <p class="help-block">File Gambar (.png, .jpg), max: 2MB</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Foto 2</label>
                                <div class="col-sm-8">
                                    <input required name="foto_2" type="file">
                                    <p class="help-block">File Gambar (.png, .jpg), max: 2MB</p>
                                </div>
                            </div>
                            {{--<div class="form-group">
                                <label class="col-sm-4 control-label">Lokasi</label>
                                <div class="col-sm-8">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-info btn-flat">Map</button>
                                            </span>
                                    </div>
                                </div>
                            </div>--}}
                            <div class="form-group">
                                <label class="col-sm-4 control-label">No Handphone</label>
                                <div class="col-sm-8">
                                    <input name="no_hp" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Tingkat Kenyamanan</label>
                                <div class="col-sm-8">
                                    <select required name="kenyamanan" required class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Latitude</label>
                                <div class="col-sm-8">
                                    <input required name="latitude" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Longitude</label>
                                <div class="col-sm-8">
                                    <input required name="longitude" type="text" class="form-control">
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