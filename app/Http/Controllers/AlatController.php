<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    /**
     * Menampilkan daftar semua alat.
     */
    public function index()
    {
        $alats = Alat::all();
        return view('admin.alat.index', compact('alats'));
    }

    /**
     * Menampilkan form untuk menambah alat baru.
     */
    public function create()
    {
        return view('admin.alat.create');
    }

    /**
     * Menyimpan data alat baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_alat' => 'required',
            'kode_alat' => 'required|unique:alats',
            'stok' => 'required|numeric',
        ]);

        Alat::create($request->all());

        return redirect()->route('alat.index')->with('success', 'Alat berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail alat (opsional).
     */
    public function show(Alat $alat)
    {
        return view('admin.alat.show', compact('alat'));
    }

    /**
     * Menampilkan form untuk mengedit alat.
     */
    public function edit(Alat $alat)
    {
        return view('admin.alat.edit', compact('alat'));
    }

    /**
     * Memperbarui data alat di database.
     */
    public function update(Request $request, Alat $alat)
    {
        $request->validate([
            'nama_alat' => 'required',
            'stok' => 'required|numeric',
        ]);

        $alat->update($request->all());

        return redirect()->route('alat.index')->with('success', 'Data alat berhasil diperbarui!');
    }

    /**
     * Menghapus data alat dari database.
     */
    public function destroy(Alat $alat)
    {
        $alat->delete();
        return redirect()->route('alat.index')->with('success', 'Alat berhasil dihapus!');
    }
}