@extends('layouts.crud')

@section('title', 'Detail Pembayaran')

@section('content')
<div class="header">
    <h1>Detail Pembayaran #{{ $pembayaran->id }}</h1>
    <a class="btn secondary" href="{{ route('pembayarans.index') }}">Kembali</a>
</div>

<div class="card">
    <div class="detail">
        <div>
            <strong>Customer</strong>
            {{ $pembayaran->pemesanan->customer->nama_customer }}
        </div>

        <div>
            <strong>Kamar</strong>
            {{ $pembayaran->pemesanan->kamar->nomor_kamar }}
        </div>

        <div>
            <strong>Tanggal Pembayaran</strong>
            {{ $pembayaran->tanggal_pembayaran->format('d-m-Y') }}
        </div>

        <div>
            <strong>Jumlah Pembayaran</strong>
            Rp{{ number_format($pembayaran->jumlah_pembayaran, 0, ',', '.') }}
        </div>

        <div>
            <strong>Metode</strong>
            {{ ucfirst($pembayaran->metode_pembayaran) }}
        </div>

        <div>
            <strong>Status</strong>
            {{ ucfirst($pembayaran->status_pembayaran) }}
        </div>

        <div>
            <strong>Keterangan</strong>
            {{ $pembayaran->keterangan ?: '-' }}
        </div>
    </div>
</div>
@endsection
