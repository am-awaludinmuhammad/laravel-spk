@extends('layouts.layout')
@section('title') {{'Edit Menu Warung Makan'}} @endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Data Menu</h3>
                        <a href="/warung-makan/{{$menuWarung->kd_warung}}/menu" class="btn btn-default pull-right">Kembali</a>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <form class="form-horizontal" method="post" action="/warung-makan/{{$menuWarung->kd_warung}}/menu/update/{{$menuWarung->id}}">
                                @csrf
                                <div class="box-body">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Nama Warung</label>
                            
                                        <div class="col-sm-8">
                                            <input type="text" disabled value="{{$warung->nama_warung}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Kategori</label>
                            
                                        <div class="col-sm-8">
                                            <select name="kd_kategori" required class="form-control">
                                                <option value="" selected disabled>Pilih Kategori</option>
                                                @foreach ($listKategori as $kategori)
                                                    <option {{$kategori->kd_kategori == $menuWarung->kd_kategori ? 'selected' : ''}} value="{{$kategori->kd_kategori}}">{{$kategori->nama_kategori}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Menu</label>
                            
                                        <div class="col-sm-8">
                                            <select name="kd_menu" required class="form-control">
                                                <option value="" selected disabled>Pilih Menu</option>
                                                @foreach ($listMenu as $menu)
                                                    <option {{$menu->kd_menu == $menuWarung->kd_menu ? 'selected' : ''}} value="{{$menu->kd_menu}}">{{$menu->nama_menu}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Harga</label>
                                        <div class="col-sm-8">
                                            <input name="harga" value="{{$menuWarung->harga}}" required type="number" class="form-control">
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
    </section>
@endsection