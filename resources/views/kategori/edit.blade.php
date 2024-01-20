@extends('layouts.app')

@section('title','Form Data user')

@section('contents')
<form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ isset($kategori)?'Edit Data kategori':'Tambah Data kategori' }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                    <label for="nama_kategori">Nama Kategori</label>
                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ isset($kategori) ? $kategori->nama_kategori : '' }}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('kategori') }}" class="btn btn-info">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
