@extends('layouts.layout')
@section('title') {{'Fasilitas'}} @endsection
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Fasilitas</h3>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <form class="form-horizontal" method="post" action="/fasilitas/insert">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Nama Fasilitas</label>
                    
                                <div class="col-sm-8">
                                    <input required name="nama_fasilitas" type="text" class="form-control">
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

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Fasilitas</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>Kode Fasilitas</th>
                                    <th>Nama Fasilitas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataFasilitas as $fasilitas)
                                    <tr>
                                        <td>{{$fasilitas->kd_fasilitas}}</td>
                                        <td>{{$fasilitas->nama_fasilitas}}</td>
                                        <td>
                                            <a href="/fasilitas/edit/{{$fasilitas->kd_fasilitas}}">Edit</a> | <a href="/fasilitas/hapus/{{$fasilitas->kd_fasilitas}}">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection