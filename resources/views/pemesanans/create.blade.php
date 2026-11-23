@extends('layouts.crud')

@section('title', 'Tambah Pemesanan')

@section('content')
<div class="header">
    <div>
        <h1>Tambah Pemesanan</h1>
        <div class="muted">Isi data transaksi pemesanan kamar.</div>
    </div>
    <a class="btn secondary" href="{{ route('pemesanans.index') }}">Kembali</a>
</div>

<div class="card">
    <form method="POST" action="{{ route('pemesanans.store') }}">
        @csrf

        <label>Customer</label>
        <select name="customer_id" required>
            <option value="">-- Pilih Customer --</option>
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}" @selected(old('customer_id') == $customer->id)>
                    {{ $customer->nama_customer }}
                </option>
            @endforeach
        </select>

        <label>Kamar</label>
        <select name="kamar_id" required>
            <option value="">-- Pilih Kamar --</option>
            @foreach($kamars as $kamar)
                <option value="{{ $kamar->id }}" @selected(old('kamar_id') == $kamar->id)>
                    {{ $kamar->nomor_kamar }} - {{ $kamar->tipe_kamar }}
                    (Rp{{ number_format($kamar->harga, 0, ',', '.') }}/malam)
                </option>
            @endforeach
        </select>

        <label>Tanggal Masuk</label>
        <input type="date" name="tanggal_masuk"
            value="{{ old('tanggal_masuk') }}"
            min="{{ now()->toDateString() }}" required>

        <label>Tanggal Keluar</label>
        <input type="date" name="tanggal_keluar"
            value="{{ old('tanggal_keluar') }}" required>

        <label>Catatan</label>
        <textarea name="catatan">{{ old('catatan') }}</textarea>

        <p class="muted">
            Total harga dihitung otomatis berdasarkan jumlah malam dikalikan harga kamar per malam.
        </p>

        <button class="btn">Simpan Pemesanan</button>
    </form>
</div>
@endsection
