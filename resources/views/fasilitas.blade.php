@extends('layouts.layout')
@section('title') {{'Fasilitas'}} @endsection
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Fasilitas</h3>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <form class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Kode Fasilitas</label>
                    
                                <div class="col-sm-8">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Nama Fasilitas</label>
                    
                                <div class="col-sm-8">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="pull-right">
                                <button type="button" class="btn btn-default">Batal</button>
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
                        <h3 class="box-title">Fasilitas</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>Kode Fasilitas</th>
                                    <th>Nama Fasilitas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Fasilitas 1</td>
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