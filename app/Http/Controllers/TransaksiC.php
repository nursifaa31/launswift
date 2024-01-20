<?php

namespace App\Http\Controllers;

use App\Models\produkM;
use App\Models\transaksiM;
use Illuminate\Http\Request;

class TransaksiC extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subtitle = "Transaksi";
        $data = transaksiM::select('transaksi.*', 'produk.nama_produk', 'produk.harga_produk', 'transaksi.id AS id_transaksi')
        ->join('produk', 'produk_id', '=', 'transaksi.id_produk');
        return view('transaksi.index', compact('subtitle', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subtitle = "Tambah Transaksi";
        $data = produkM::all();
        return view('transaksi.create', compact('subtitle', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_unik' => 'required',
            'nama_pelanggan' => 'required',
            'produk' => 'required',
            'qty' => 'required|numeric|min:0',
            'bayar' => 'required|numeric|min:0',
            'status' => 'required|in:proses,selesai,diambil',
            // 'tgl_ambil' => 'nullable|date',
        ]);

        $produk = produkM::find($request->input('produk'));

        if (!$produk) {
            return redirect('/transaksi')->with('error', 'Produk tidak ditemukan.');
        }

        // Hitung total harga
        $total_harga = $request->input('jumlah_itm_kg') * $produk->harga_produk;

        // Simpan data transaksi ke database
        $data = transaksiM::create([
            'nomor_unik' => $request->input('nomor_unik'),
            'nama_pelanggan' => $request->input('nama_pelanggan'),
            'id_produk' => $request->input('produk'),
            'qty' => $request->input('qty'),
            'total_harga' => $total_harga,
            'bayar' => $request->input('bayar'),
            'kembali' => max(0, $request->input('bayar') - $total_harga),
            'status' => $request->input('status'),
            // 'tgl_ambil' => $request->tgl_ambil,
        ]);

        // Redirect ke halaman transaksi setelah menyimpan
        return redirect('/transaksi')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
