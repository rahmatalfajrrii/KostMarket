@extends('layouts.crud')

@section('title', 'Tambah Pembayaran')

@section('content')
<div class="header">
    <h1>Tambah Pembayaran</h1>
    <a class="btn secondary" href="{{ route('pembayarans.index') }}">Kembali</a>
</div>

<div class="card">
    <form method="POST" action="{{ route('pembayarans.store') }}">
        @csrf

        <label>Transaksi Pemesanan</label>
        <select name="pemesanan_id" required>
            <option value="">-- Pilih Pemesanan --</option>
            @foreach($pemesanans as $item)
                <option value="{{ $item->id }}"
                    @selected(old('pemesanan_id', request('pemesanan_id')) == $item->id)>
                    #{{ $item->id }} -
                    {{ $item->customer->nama_customer }} -
                    Kamar {{ $item->kamar->nomor_kamar }}
                    (Rp{{ number_format($item->total_harga, 0, ',', '.') }})
                </option>
            @endforeach
        </select>

        <label>Tanggal Pembayaran</label>
        <input type="date" name="tanggal_pembayaran"
            value="{{ old('tanggal_pembayaran', now()->toDateString()) }}" required>

        <label>Jumlah Pembayaran (Rp)</label>
        <input type="number" name="jumlah_pembayaran"
            min="1" step="0.01" value="{{ old('jumlah_pembayaran') }}" required>

        <label>Metode Pembayaran</label>
        <select name="metode_pembayaran" required>
            <option value="">-- Pilih Metode --</option>
            <option value="transfer" @selected(old('metode_pembayaran') == 'transfer')>Transfer</option>
            <option value="tunai" @selected(old('metode_pembayaran') == 'tunai')>Tunai</option>
            <option value="e-wallet" @selected(old('metode_pembayaran') == 'e-wallet')>E-Wallet</option>
        </select>

        <label>Status Pembayaran</label>
        <select name="status_pembayaran" required>
            <option value="menunggu" @selected(old('status_pembayaran', 'menunggu') == 'menunggu')>Menunggu</option>
            <option value="berhasil" @selected(old('status_pembayaran') == 'berhasil')>Berhasil</option>
            <option value="gagal" @selected(old('status_pembayaran') == 'gagal')>Gagal</option>
        </select>

        <label>Keterangan</label>
        <textarea name="keterangan">{{ old('keterangan') }}</textarea>

        <button class="btn">Simpan Pembayaran</button>
    </form>
</div>
@endsection
