@extends('layouts.layout')
@section('title') {{'List Fasilitas Warung Makan'}} @endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Data Fasilitas</h3>
                        <a href="/warung-makan" class="btn btn-default pull-right">Kembali</a>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <form class="form-horizontal" method="post" action="/warung-makan/{{$warung->kd_warung}}/fasilitas/update/{{$dataFasilitasWarung->id}}">
                                @csrf
                                <div class="box-body">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Nama Warung</label>
                            
                                        <div class="col-sm-8">
                                            <input type="text" disabled value="{{$warung->nama_warung}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Fasilitas</label>
                            
                                        <div class="col-sm-8">
                                            <select name="kd_fasilitas" required class="form-control">
                                                <option value="" selected disabled>Pilih Fasilitas</option>
                                                @foreach ($masterFasilitas as $fasilitas)
                                                    <option {{ $fasilitas->kd_fasilitas == $dataFasilitasWarung->kd_fasilitas ? 'selected' : '' }} value="{{$fasilitas->kd_fasilitas}}">{{$fasilitas->nama_fasilitas}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <div class="pull-right">
                                        <a href="" class="btn btn-default">Batal</a>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection