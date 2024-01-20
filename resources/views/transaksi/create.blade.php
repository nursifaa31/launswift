@extends('layouts.app')

@section('title','Form Data user')

@section('contents')
<form action="{{ route('transaksi.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ isset($transaksi)?'Edit Data transaksi':'Tambah Data transaksi' }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nomor_unik">Nomor Unik</label>
                        <input type="number" class="form-control" name="kode" aria-describedby="emailHelp" value="{{ random_int(1000000000, 9999999999) }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="nama_pelanggan">Nama Pelanggan</label>
                        <input type="text" name="nama_pelanggan" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Produk</label>
                        <select name="produk" id="produk" class="form-control">
                            <option selected>Pilih Produk</option>
                            @foreach ($data as $p)
                                <option value="{{ $p->id }}" data-harga="{{ $p->harga_produk }}">{{ $p->nama_produk }} - Cat. {{ $p->kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="qty">Jumlah Item (Kg)</label>
                        <input type="number" class="form-control" id="qty" name="qty" required>
                    </div>

                    <div class="form-group">
                        <label for="total_harga">Total Harga</label>
                        <input type="hidden" name="total_harga" value="0">
                    </div>

                    <div class="form-group">
                        <label for="bayar">Uang Bayar</label>
                        <input type="number" name="bayar" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="kembali">Uang Kembali</label>
                        <input type="number" name="kembali" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="proses">Proses</option>
                            <option value="selesai">Selesai</option>
                            <option value="diambil">Diambil</option>
                        </select>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('transaksi') }}" class="btn btn-info">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    const produkInput = document.getElementById('produk');
    const qtyInput = document.getElementById('qty');
    const totalBayarInput = document.getElementById('total_bayar');

    produkInput.addEventListener('change', updateTotal);
    qtyInput.addEventListener('input', updateTotal);

    function updateTotal() {
        const selectedOption = produkInput.options[produkInput.selectedIndex];
        const hargaProduk = parseFloat(selectedOption.getAttribute('data-harga')) || 0;
        const qty = parseFloat(qtyInput.value) || 0;

        const total = hargaProduk * qty;
        totalBayarInput.value = total.toFixed(2);
    }
</script>
@endsection
