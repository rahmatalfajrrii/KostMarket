<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    // Menampilkan semua data kamar
    public function index()
    {
        $kamars = Kamar::latest()->get();

        return view('kamars.index', compact('kamars'));
    }

    // Menampilkan form tambah kamar
    public function create()
    {
        return view('kamars.create');
    }

    // Menyimpan data kamar
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_kamar' => 'required|string|max:255|unique:kamars,nomor_kamar',
            'tipe_kamar' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'status' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        Kamar::create($validated);

        return redirect()->route('kamars.index')
            ->with('success', 'Data kamar berhasil ditambahkan.');
    }

    // Menampilkan form edit kamar
    public function edit(Kamar $kamar)
    {
        return view('kamars.edit', compact('kamar'));
    }

    // Memperbarui data kamar
    public function update(Request $request, Kamar $kamar)
    {
        $validated = $request->validate([
            'nomor_kamar' => 'required|string|max:255|unique:kamars,nomor_kamar,' . $kamar->id,
            'tipe_kamar' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'status' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $kamar->update($validated);

        return redirect()->route('kamars.index')
            ->with('success', 'Data kamar berhasil diperbarui.');
    }

    // Menghapus data kamar
    public function destroy(Kamar $kamar)
    {
        $kamar->delete();

        return redirect()->route('kamars.index')
            ->with('success', 'Data kamar berhasil dihapus.');
    }
}
