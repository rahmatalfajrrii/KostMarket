@extends('layouts.crud')

@section('title', 'Data Pembayaran')

@section('content')
<div class="header">
    <div>
        <h1>Data Pembayaran</h1>
        <div class="muted">Daftar pembayaran pelanggan.</div>
    </div>
    <a class="btn" href="{{ route('pembayarans.create') }}">+ Tambah Pembayaran</a>
</div>

<div class="card table-wrap">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Customer</th>
                <th>Kamar</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Metode</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pembayarans as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->pemesanan->customer->nama_customer }}</td>
                    <td>{{ $item->pemesanan->kamar->nomor_kamar }}</td>
                    <td>{{ $item->tanggal_pembayaran->format('d-m-Y') }}</td>
                    <td>Rp{{ number_format($item->jumlah_pembayaran, 0, ',', '.') }}</td>
                    <td>{{ ucfirst($item->metode_pembayaran) }}</td>
                    <td>{{ ucfirst($item->status_pembayaran) }}</td>
                    <td>
                        <div class="actions">
                            <a class="btn blue" href="{{ route('pembayarans.show', $item) }}">Detail</a>
                            <a class="btn secondary" href="{{ route('pembayarans.edit', $item) }}">Edit</a>

                            <form method="POST" action="{{ route('pembayarans.destroy', $item) }}"
                                onsubmit="return confirm('Hapus pembayaran ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn red">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" style="text-align:center">Belum ada data pembayaran.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
