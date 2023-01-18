@extends('layouts.layout')
@section('title') {{'Kriteria'}} @endsection
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Kriteria</h3>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <form class="form-horizontal" method="post" action="/kriteria/insert">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Nama Kriteria</label>
                    
                                <div class="col-sm-8">
                                    <input required name="nama_kriteria" type="text" class="form-control">
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

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Kriteria</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>Kode Kriteria</th>
                                    <th>Nama Kriteria</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataKriteria as $kriteria)
                                <tr>
                                    <td>{{$kriteria->kd_kriteria}}</td>
                                    <td>{{$kriteria->nama_kriteria}}</td>
                                    <td>
                                        <a href="kriteria/edit/{{$kriteria->kd_kriteria}}">Edit</a> | <a href="/kriteria/hapus/{{$kriteria->kd_kriteria}}">Hapus</a>
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