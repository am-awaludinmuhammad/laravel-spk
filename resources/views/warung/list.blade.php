@extends('layouts.layout')
@section('title') {{'Warung Makan'}} @endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Warung Makan</h3>
                        <a href="/warung-makan/tambah" class="btn btn-primary pull-right">Tambah Data</a>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>No.Hp</th>
                                    <th>Lokasi</th>
                                    <th>Alamat</th>
                                    <th>Foto 1</th>
                                    <th>Foto 2</th>
                                    <th>Menu</th>
                                    <th>Fasilitas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Warung 1</td>
                                    <td>08612334</td>
                                    <td>Yogyakarta</td>
                                    <td>Yogyakarta</td>
                                    <td>
                                        <img src="{{ asset('img/photo2.png') }}" alt="" style="width: 80px;">
                                    </td>
                                    <td>
                                        <img src="{{ asset('img/photo2.png') }}" alt="" style="width: 80px;">
                                    </td>
                                    <td>Menu 1</td>
                                    <td>Fasilitas</td>
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