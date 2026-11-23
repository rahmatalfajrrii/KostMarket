<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Kamar;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanans = Pemesanan::with(['customer', 'kamar'])
            ->latest()
            ->get();

        return view('pemesanans.index', compact('pemesanans'));
    }

    public function create()
    {
        $customers = Customer::orderBy('nama_customer')->get();

        $kamars = Kamar::where('status', 'tersedia')
            ->orderBy('nomor_kamar')
            ->get();

        return view('pemesanans.create', compact('customers', 'kamars'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);

        $kamar = Kamar::findOrFail($data['kamar_id']);

        $this->ensureRoomAvailable($data);

        $masuk = \Carbon\Carbon::parse($data['tanggal_masuk']);
        $keluar = \Carbon\Carbon::parse($data['tanggal_keluar']);

        $malam = $masuk->diffInDays($keluar);

        Pemesanan::create([
            ...$data,
            'tanggal_pemesanan' => now()->toDateString(),
            'jumlah_malam' => $malam,
            'harga_per_malam' => $kamar->harga,
            'total_harga' => $malam * (float) $kamar->harga,
            'status' => 'menunggu',
        ]);

        return redirect()
            ->route('pemesanans.index')
            ->with('success', 'Pemesanan berhasil ditambahkan.');
    }

    public function show(Pemesanan $pemesanan)
    {
        $pemesanan->load(['customer', 'kamar', 'pembayarans']);

        return view('pemesanans.show', compact('pemesanan'));
    }

    public function edit(Pemesanan $pemesanan)
    {
        $customers = Customer::orderBy('nama_customer')->get();
        $kamars = Kamar::orderBy('nomor_kamar')->get();

        return view('pemesanans.edit', compact(
            'pemesanan',
            'customers',
            'kamars'
        ));
    }

    public function update(Request $request, Pemesanan $pemesanan)
    {
        $data = $this->validateData($request, true);

        if ($pemesanan->pembayarans()
            ->where('status_pembayaran', 'berhasil')
            ->exists()) {
            throw ValidationException::withMessages([
                'status' => 'Pemesanan dengan pembayaran berhasil tidak dapat diubah.',
            ]);
        }

        $kamar = Kamar::findOrFail($data['kamar_id']);

        $this->ensureRoomAvailable($data, $pemesanan->id);

        $masuk = \Carbon\Carbon::parse($data['tanggal_masuk']);
        $keluar = \Carbon\Carbon::parse($data['tanggal_keluar']);

        $malam = $masuk->diffInDays($keluar);

        $pemesanan->update([
            ...$data,
            'jumlah_malam' => $malam,
            'harga_per_malam' => $kamar->harga,
            'total_harga' => $malam * (float) $kamar->harga,
        ]);

        return redirect()
            ->route('pemesanans.index')
            ->with('success', 'Pemesanan berhasil diperbarui.');
    }

    public function destroy(Pemesanan $pemesanan)
    {
        if ($pemesanan->pembayarans()->exists()) {
            return back()->with(
                'error',
                'Pemesanan tidak dapat dihapus karena masih memiliki data pembayaran.'
            );
        }

        $pemesanan->delete();

        return redirect()
            ->route('pemesanans.index')
            ->with('success', 'Pemesanan berhasil dihapus.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'customer_id' => ['required', 'exists:customers,id'],
            'kamar_id' => ['required', 'exists:kamars,id'],
            'tanggal_masuk' => ['required', 'date', 'after_or_equal:today'],
            'tanggal_keluar' => ['required', 'date', 'after:tanggal_masuk'],
            'catatan' => ['nullable', 'string', 'max:1000'],
            'status' => ['sometimes', 'required', 'in:menunggu,dikonfirmasi,dibatalkan,selesai'],
        ]);
    }

    private function ensureRoomAvailable(array $data, ?int $ignoreId = null): void
    {
        $query = Pemesanan::where('kamar_id', $data['kamar_id'])
            ->whereIn('status', ['menunggu', 'dikonfirmasi'])
            ->whereDate('tanggal_masuk', '<', $data['tanggal_keluar'])
            ->whereDate('tanggal_keluar', '>', $data['tanggal_masuk']);

        if ($ignoreId) {
            $query->where('id', '!=', $ignoreId);
        }

        if ($query->exists()) {
            throw ValidationException::withMessages([
                'kamar_id' => 'Kamar sudah dipesan pada tanggal tersebut.',
            ]);
        }
    }
}
