@extends('layouts.app')

@section('title','Form Data user')

@section('contents')
<form action="{{ route('produk.update', $produk->id) }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ isset($produk)?'Edit Data produk':'Tambah Data produk' }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                    <label for="nama_produk">Nama Produk</label>
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ isset($produk) ? $produk->nama_produk : '' }}">
                    </div>
                  <div class="form-group">
                    <label for="harga_produk">Harga Produk</label>
                    <input type="number" class="form-control" id="harga_produk" name="harga_produk" value="{{ isset($produk) ? $produk->harga_produk : '' }}">
                  </div>
                  <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <input type="text" class="form-control" id="id_kategori" name="id_kategori" value="{{ isset($produk) ? $produk->id_kategori : '' }}">
                  </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('produk') }}" class="btn btn-info">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
