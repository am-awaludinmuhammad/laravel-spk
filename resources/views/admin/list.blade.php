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
                                <tr>
                                    <td>1.</td>
                                    <td>Administrator</td>
                                    <td>Yogyakarta</td>
                                    <td>08612334</td>
                                    <td>admin</td>
                                    <td>admin1</td>
                                    <td>
                                        <a href="#edit">Edit</a> | <a href="#hapus">Hapus</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection