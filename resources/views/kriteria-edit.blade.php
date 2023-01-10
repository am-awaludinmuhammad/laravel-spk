@extends('layouts.layout')
@section('title') {{'Kriteria'}} @endsection
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Data Kriteria</h3>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <form class="form-horizontal" method="post" action="/kriteria/update/{{ $dataKriteria->kd_kriteria }}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Kode Kriteria</label>
                    
                                <div class="col-sm-8">
                                    <input name="kd_kriteria" value="{{ $dataKriteria->kd_kriteria }}" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Nama Kriteria</label>
                    
                                <div class="col-sm-8">
                                    <input name="nama_kriteria" value="{{ $dataKriteria->nama_kriteria }}" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="pull-right">
                                <a href="/kriteria" class="btn btn-default">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection