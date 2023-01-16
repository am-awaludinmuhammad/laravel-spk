@extends('layouts.layout')
@section('title') {{'Menu'}} @endsection
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Data Menu</h3>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <form class="form-horizontal" method="post" action="/menu/update/{{ $menu->kd_menu }}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Kode Menu</label>
                    
                                <div class="col-sm-8">
                                    <input name="kd_menu" value="{{ $menu->kd_menu }}" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Nama Menu</label>
                    
                                <div class="col-sm-8">
                                    <input name="nama_menu" value="{{ $menu->nama_menu }}" type="text" class="form-control">
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
    </section>
@endsection