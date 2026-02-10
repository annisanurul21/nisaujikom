<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function adminIndex()
    {
        // Mengambil data peminjaman beserta data user dan alatnya
        $peminjamans = Peminjaman::all(); 
        return view('admin.peminjaman.index', compact('peminjamans'));
    }

    public function updateStatus(Request $request, $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $alat = Alat::findOrFail($peminjaman->id_alat);

        if ($request->status == 'dipinjam') {
            if ($alat->stok < $peminjaman->jumlah) {
                return back()->with('error', 'Stok alat tidak mencukupi untuk peminjaman ini!');
            }
            $alat->decrement('stok', $peminjaman->jumlah);
        }

        // Update status dan catat admin yang memproses sesuai ERD
        $peminjaman->update([
            'status' => $request->status,
            'id_admin' => Auth::id() 
        ]);

        return back()->with('success', 'Status peminjaman berhasil diperbarui!');
    }

    public function index()
    {
        $alats = Alat::where('stok', '>', 0)->get();
        return view('peminjaman.index', compact('alats'));
    }
}