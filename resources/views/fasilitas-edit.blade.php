@extends('layouts.layout')
@section('title') {{'Fasilitas'}} @endsection
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Data Fasilitas</h3>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <form class="form-horizontal" method="post" action="/fasilitas/update/{{ $fasilitas->kd_fasilitas }}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Nama Fasilitas</label>
                    
                                <div class="col-sm-8">
                                    <input required name="nama_fasilitas" value="{{ $fasilitas->nama_fasilitas }}" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="pull-right">
                                <a href="/fasilitas" class="btn btn-default">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection