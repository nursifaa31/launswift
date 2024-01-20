@extends('layouts.app')

@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Data Produk</h4>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-center">
            <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">
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
                                            <th class="text-center">Nama Kategori</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $p)
                                        <tr>
                                            <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                                            <td class="text-center">{{ $p->nama_kategori }}</td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('kategori.edit', $p->id) }}" class="btn btn-warning mr-2">
                                                        <i class="fas fa-edit fa-sm"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">
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
{{-- <section class="section">
    <div class="section-header">
      <h1>Category</h1>
    </div>
    <div class="w-full p-10">
        <div class="my-2">
            <a href="#" class="btn btn-success"> Create</a>
        </div>
        <table class="table ">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Kategori</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $c)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $c->nama_kategori }}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
      </div>
  </section> --}}
@endsection
