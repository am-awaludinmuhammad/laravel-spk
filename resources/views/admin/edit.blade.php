@extends('layouts.layout')
@section('title') {{'Admin'}} @endsection
@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Data Admin</h3>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <form class="form-horizontal" action="/admin/update/{{$dataAdmin->kd_admin}}" method="post">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Kode Admin</label>
                                <div class="col-sm-8">
                                    <input value="{{$dataAdmin->kd_admin}}" name="kd_admin" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Nama Admin</label>
                                <div class="col-sm-8">
                                    <input value="{{$dataAdmin->nama_admin}}" name="nama_admin" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Nomor Handphone</label>
                                <div class="col-sm-8">
                                    <input value="{{$dataAdmin->no_hp}}" name="no_hp" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Alamat</label>
                                <div class="col-sm-8">
                                    <textarea name="alamat" class="form-control" rows="3">{{$dataAdmin->alamat}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Username</label>
                                <div class="col-sm-8">
                                    <input value="{{$dataAdmin->username}}" name="username" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Password</label>
                                <div class="col-sm-8">
                                    <input value="{{$dataAdmin->password}}" name="password" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="pull-right">
                                <a href="/admin" class="btn btn-default">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection