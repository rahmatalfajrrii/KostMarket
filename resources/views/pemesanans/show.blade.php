@extends('layouts.crud')

@section('title', 'Detail Pemesanan')

@section('content')
<div class="header">
    <h1>Detail Pemesanan #{{ $pemesanan->id }}</h1>
    <a class="btn secondary" href="{{ route('pemesanans.index') }}">Kembali</a>
</div>

<div class="card">
    <div class="detail">
        <div><strong>Customer</strong>{{ $pemesanan->customer->nama_customer }}</div>
        <div><strong>Kamar</strong>{{ $pemesanan->kamar->nomor_kamar }} - {{ $pemesanan->kamar->tipe_kamar }}</div>
        <div><strong>Tanggal Pemesanan</strong>{{ $pemesanan->tanggal_pemesanan->format('d-m-Y') }}</div>
        <div><strong>Tanggal Masuk</strong>{{ $pemesanan->tanggal_masuk->format('d-m-Y') }}</div>
        <div><strong>Tanggal Keluar</strong>{{ $pemesanan->tanggal_keluar->format('d-m-Y') }}</div>
        <div><strong>Jumlah Malam</strong>{{ $pemesanan->jumlah_malam }} malam</div>
        <div><strong>Harga per Malam</strong>Rp{{ number_format($pemesanan->harga_per_malam, 0, ',', '.') }}</div>
        <div><strong>Total Harga</strong>Rp{{ number_format($pemesanan->total_harga, 0, ',', '.') }}</div>
        <div><strong>Status</strong>{{ ucfirst($pemesanan->status) }}</div>
        <div><strong>Catatan</strong>{{ $pemesanan->catatan ?: '-' }}</div>
    </div>
</div>

<div class="card">
    <h3>Riwayat Pembayaran</h3>
    <p>
        <a class="btn" href="{{ route('pembayarans.create', ['pemesanan_id' => $pemesanan->id]) }}">
            + Tambah Pembayaran
        </a>
    </p>

    @forelse($pemesanan->pembayarans as $bayar)
        <p>
            {{ $bayar->tanggal_pembayaran->format('d-m-Y') }}
            — Rp{{ number_format($bayar->jumlah_pembayaran, 0, ',', '.') }}
            — {{ ucfirst($bayar->status_pembayaran) }}
        </p>
    @empty
        <p class="muted">Belum ada pembayaran.</p>
    @endforelse
</div>
@endsection
