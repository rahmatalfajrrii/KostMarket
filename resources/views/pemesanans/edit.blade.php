@extends('layouts.crud')

@section('title', 'Edit Pemesanan')

@section('content')
<div class="header">
    <h1>Edit Pemesanan</h1>
    <a class="btn secondary" href="{{ route('pemesanans.index') }}">Kembali</a>
</div>

<div class="card">
    <form method="POST" action="{{ route('pemesanans.update', $pemesanan) }}">
        @csrf
        @method('PUT')

        <label>Customer</label>
        <select name="customer_id" required>
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}"
                    @selected(old('customer_id', $pemesanan->customer_id) == $customer->id)>
                    {{ $customer->nama_customer }}
                </option>
            @endforeach
        </select>

        <label>Kamar</label>
        <select name="kamar_id" required>
            @foreach($kamars as $kamar)
                <option value="{{ $kamar->id }}"
                    @selected(old('kamar_id', $pemesanan->kamar_id) == $kamar->id)>
                    {{ $kamar->nomor_kamar }} - {{ $kamar->tipe_kamar }}
                    (Rp{{ number_format($kamar->harga, 0, ',', '.') }}/malam)
                </option>
            @endforeach
        </select>

        <label>Tanggal Masuk</label>
        <input type="date" name="tanggal_masuk"
            value="{{ old('tanggal_masuk', $pemesanan->tanggal_masuk->format('Y-m-d')) }}"
            min="{{ now()->toDateString() }}" required>

        <label>Tanggal Keluar</label>
        <input type="date" name="tanggal_keluar"
            value="{{ old('tanggal_keluar', $pemesanan->tanggal_keluar->format('Y-m-d')) }}"
            required>

        <label>Catatan</label>
        <textarea name="catatan">{{ old('catatan', $pemesanan->catatan) }}</textarea>

        <label>Status Pemesanan</label>
        <select name="status" required>
            @foreach(['menunggu' => 'Menunggu', 'dikonfirmasi' => 'Dikonfirmasi', 'dibatalkan' => 'Dibatalkan', 'selesai' => 'Selesai'] as $value => $label)
                <option value="{{ $value }}"
                    @selected(old('status', $pemesanan->status) == $value)>
                    {{ $label }}
                </option>
            @endforeach
        </select>

        <button class="btn">Perbarui Pemesanan</button>
    </form>
</div>
@endsection
