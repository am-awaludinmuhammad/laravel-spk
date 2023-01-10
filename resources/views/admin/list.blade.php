@extends('layouts.layout')
@section('title') {{'Admin'}} @endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Admin</h3>
                        <a href="/admin/tambah" class="btn btn-primary pull-right">Tambah Data</a>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>Kd Admin</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No_Telp</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataAdmin as $admin)
                                    <tr>
                                        <td>{{$admin->kd_admin}}</td>
                                        <td>{{$admin->nama_admin}}</td>
                                        <td>{{$admin->alamat}}</td>
                                        <td>{{$admin->no_hp}}</td>
                                        <td>{{$admin->username}}</td>
                                        <td>{{$admin->password}}</td>
                                        <td>
                                            <a href="/admin/edit/{{$admin->kd_admin}}">Edit</a> | <a href="/admin/hapus/{{$admin->kd_admin}}">Hapus</a>
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