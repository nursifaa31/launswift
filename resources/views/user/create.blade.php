@extends('layouts.app')

@section('title','Form Data user')

@section('contents')
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ isset($users)?'Edit Data users':'Tambah Data users' }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="string" class="form-control" id="nama" name="nama" value="{{ isset($users) ? $users->nama : '' }}">
                    </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="string" class="form-control" id="username" name="username" value="{{ isset($users) ? $users->username : '' }}">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{ isset($users) ? $users->password : '' }}">
                  </div>
                  <div class="form-group">
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" class="form-control border">
                            <option>-Pilih Role-</option>
                            <option value="admin">Admin</option>
                            <option value="kasir">Kasir</option>
                            <option value="owner">Owner</option>
                        </select>
                        @error('role')
                        <p>{{ $message }}</p>
                        @enderror
                      </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('users') }}" class="btn btn-info">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
