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
                                    <th>Alamat</th>
                                    <th>Foto 1</th>
                                    <th>Foto 2</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dataWarung as $warung)
                                    <tr>
                                        <td>{{$warung->kd_warung}}</td>
                                        <td>{{$warung->nama_warung}}</td>
                                        <td>{{$warung->no_hp}}</td>
                                        <td>{{$warung->alamat}}</td>
                                        <td>
                                            <img src="{{ asset('img/upload') }}/{{$warung->foto_1}}" alt="" style="width: 80px;">
                                        </td>
                                        <td>
                                            <img src="{{ asset('img/upload') }}/{{$warung->foto_2}}" alt="" style="width: 80px;">
                                        </td>
                                        <td>
                                            <a href="/warung-makan/edit/{{$warung->kd_warung}}">Edit</a> | 
                                            <a href="/warung-makan/{{$warung->kd_warung}}/menu">Olah Menu</a> | 
                                            <a href="/warung-makan/hapus/{{$warung->kd_warung}}">Hapus</a>
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