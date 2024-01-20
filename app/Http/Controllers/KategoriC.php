<?php

namespace App\Http\Controllers;

use App\Models\kategoriM;
use Illuminate\Http\Request;

class KategoriC extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="Kategori";
        $data = kategoriM::all();
        return view('kategori.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subtitle = "Tambah Kategori";
        $data = kategoriM::all();
        return view('kategori.create', compact('subtitle', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        $data = [
            'nama_kategori' =>$request->nama_kategori,
        ];

        kategoriM::create($data);

        return redirect()->route('kategori')->with('success', 'Data Kategori berhasil ditambahkan');
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
        $subtitle = "Edit Kategori";
        $kategori = kategoriM::find($id);

        return view('kategori.edit', compact('subtitle', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data formulir, sesuaikan dengan kebutuhan aplikasi Anda
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        kategoriM::find($id)->update($request);

        return redirect()->route('kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
