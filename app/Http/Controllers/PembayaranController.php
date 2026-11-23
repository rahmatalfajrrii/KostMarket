<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::with([
            'pemesanan.customer',
            'pemesanan.kamar',
        ])->latest()->get();

        return view('pembayarans.index', compact('pembayarans'));
    }

    public function create()
    {
        $pemesanans = Pemesanan::with(['customer', 'kamar'])
            ->whereIn('status', ['menunggu', 'dikonfirmasi'])
            ->latest()
            ->get();

        return view('pembayarans.create', compact('pemesanans'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);

        $this->ensureAmountWithinBalance(
            $data['pemesanan_id'],
            (float) $data['jumlah_pembayaran'],
            $data['status_pembayaran']
        );

        Pembayaran::create($data);

        return redirect()
            ->route('pembayarans.index')
            ->with('success', 'Pembayaran berhasil ditambahkan.');
    }

    public function show(Pembayaran $pembayaran)
    {
        $pembayaran->load([
            'pemesanan.customer',
            'pemesanan.kamar',
        ]);

        return view('pembayarans.show', compact('pembayaran'));
    }

    public function edit(Pembayaran $pembayaran)
    {
        $pemesanans = Pemesanan::with(['customer', 'kamar'])->latest()->get();

        return view('pembayarans.edit', compact(
            'pembayaran',
            'pemesanans'
        ));
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        $data = $this->validateData($request);

        $this->ensureAmountWithinBalance(
            $data['pemesanan_id'],
            (float) $data['jumlah_pembayaran'],
            $data['status_pembayaran'],
            $pembayaran->id
        );

        $pembayaran->update($data);

        return redirect()
            ->route('pembayarans.index')
            ->with('success', 'Pembayaran berhasil diperbarui.');
    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();

        return redirect()
            ->route('pembayarans.index')
            ->with('success', 'Pembayaran berhasil dihapus.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'pemesanan_id' => ['required', 'exists:pemesanans,id'],
            'tanggal_pembayaran' => ['required', 'date'],
            'jumlah_pembayaran' => ['required', 'numeric', 'gt:0'],
            'metode_pembayaran' => ['required', 'in:transfer,tunai,e-wallet'],
            'status_pembayaran' => ['required', 'in:menunggu,berhasil,gagal'],
            'keterangan' => ['nullable', 'string', 'max:1000'],
        ]);
    }

    private function ensureAmountWithinBalance(
        int $pemesananId,
        float $amount,
        string $status,
        ?int $ignoreId = null
    ): void {
        if ($status !== 'berhasil') {
            return;
        }

        $pemesanan = Pemesanan::findOrFail($pemesananId);

        $query = $pemesanan->pembayarans()
            ->where('status_pembayaran', 'berhasil');

        if ($ignoreId) {
            $query->where('id', '!=', $ignoreId);
        }

        $totalDibayar = (float) $query->sum('jumlah_pembayaran');

        if ($totalDibayar + $amount > (float) $pemesanan->total_harga) {
            throw ValidationException::withMessages([
                'jumlah_pembayaran' => 'Pembayaran melebihi sisa tagihan.',
            ]);
        }
    }
}
