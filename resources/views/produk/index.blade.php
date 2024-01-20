@extends('layouts.app')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Data Produk</h4>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-center">
            <a href="{{ route('produk.create') }}" class="btn btn-primary mb-3">
                <i class="fa fa-plus"></i> Tambah Data
            </a>
        </div>
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="myTable" class="table table-bordered dataTable table-bordered custom-table" >
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama Produk</th>
                                            <th class="text-center">Harga Produk (Kg)</th>
                                            <th class="text-center">Kategori</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $p)
                                        <tr>
                                            <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                            <td class="text-center">{{ $p->nama_produk }}</td>
                                            <td class="text-center">{{ $p->harga_produk }}</td>
                                            <td class="text-center">{{ $p->kategori->nama_kategori }}</td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('produk.edit', $p->id) }}" class="btn btn-warning mr-2">
                                                        <i class="fas fa-edit fa-sm"></i>
                                                    </a>
                                                    <a href="{{ route('produk.destroy', $p->id) }}" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">
                                                        <i class="fas fa-trash-alt fa-sm"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                    </div></div>

        </div>
    </div>
</div>
@endsection
