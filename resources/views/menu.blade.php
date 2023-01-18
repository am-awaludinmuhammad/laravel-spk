@extends('layouts.layout')
@section('title') {{'Menu'}} @endsection
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Menu</h3>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <form class="form-horizontal" action="/menu/insert" method="post">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Nama Menu</label>

                                <div class="col-sm-8">
                                    <input required name="nama_menu" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="pull-right">
                                <a href="/menu" class="btn btn-default">Batal</a>
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
                        <h3 class="box-title">Menu</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>Kode Menu</th>
                                    <th>Nama Menu</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataMenu as $menu)
                                    <tr>
                                        <td>{{$menu->kd_menu}}</td>
                                        <td>{{$menu->nama_menu}}</td>
                                        <td>
                                            <a href="/menu/edit/{{$menu->kd_menu}}">Edit</a> | <a href="/menu/hapus/{{$menu->kd_menu}}">Hapus</a>
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