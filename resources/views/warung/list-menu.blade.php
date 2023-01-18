@extends('layouts.layout')
@section('title') {{'List Menu Warung Makan'}} @endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Data Menu</h3>
                        <a href="/warung-makan" class="btn btn-default pull-right">Kembali</a>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <form class="form-horizontal" method="post" action="/warung-makan/{{$warung->kd_warung}}/menu/insert">
                                @csrf
                                <div class="box-body">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Nama Warung</label>
                            
                                        <div class="col-sm-8">
                                            <input type="text" disabled value="{{$warung->nama_warung}}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Menu</label>
                            
                                        <div class="col-sm-8">
                                            <select name="kd_menu" required class="form-control">
                                                <option value="" selected disabled>Pilih Menu</option>
                                                @foreach ($listMenu as $menu)
                                                    <option value="{{$menu->kd_menu}}">{{$menu->nama_menu}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Kategori</label>
                            
                                        <div class="col-sm-8">
                                            <select name="kd_kategori" required class="form-control">
                                                <option value="" selected disabled>Pilih Kategori</option>
                                                @foreach ($listKategori as $kategori)
                                                    <option value="{{$kategori->kd_kategori}}">{{$kategori->nama_kategori}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Harga</label>
                                        <div class="col-sm-8">
                                            <input name="harga" required type="number" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <div class="pull-right">
                                        <a href="" class="btn btn-default">Batal</a>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Menu</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Menu</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($menuWarung as $menu)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$menu->nama_menu}}</td>
                                        <td>{{$menu->nama_kategori}}</td>
                                        <td>{{$menu->harga}}</td>
                                        <td>
                                            <a href="/warung-makan/{{$menu->kd_warung}}/menu/edit/{{$menu->id}}">Edit</a> | 
                                            <a href="/warung-makan/{{$menu->kd_warung}}/menu/hapus/{{$menu->id}}">Hapus</a>
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