<?php

namespace App\Http\Controllers;

use App\Models\produkM;
use App\Models\kategoriM;
use Illuminate\Http\Request;

class ProdukC extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subtitle = "Produk";
        $data = produkM::all();
        return view('produk.index', compact('subtitle', 'data'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subtitle = "Tambah Produk";
        $data = kategoriM::all();
        return view('produk.create', compact('subtitle', 'data'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga_produk' => 'required',
            'kategori' => 'required|exists:kategori,id',
        ]);

        $data = [
            'nama_produk' =>$request->nama_produk,
            'harga_produk' =>$request->harga_produk,
            'id_kategori' =>$request->kategori,
        ];

        produkM::create($data);

        return redirect()->route('produk')->with('success', 'Data Produk berhasil ditambahkan');
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
        $subtitle = "Edit Produk";
        $produk = produkM::find($id);

        return view('produk.edit', compact('subtitle', 'produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data formulir, sesuaikan dengan kebutuhan aplikasi Anda
        $request->validate([
            'nama_produk' => 'required',
            'harga_produk' => 'required',
            'id_kategori' => 'required',
            // Tambahan aturan validasi lainnya...
        ]);

        produkM::where('id', $id)->update($request->only(['nama_produk', 'harga_produk', 'id_kategori']));
        // Redirect ke halaman tampilan produk setelah berhasil diupdate
        return redirect()->route('produk')->with('success', 'Produk berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        produkM::find($id)->delete();

        return redirect()->route('produk');
    }
}
