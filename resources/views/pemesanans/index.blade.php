@extends('layouts.crud')

@section('title', 'Data Pemesanan')

@section('content')
<div class="header">
    <div>
        <h1>Data Pemesanan</h1>
        <div class="muted">Daftar transaksi pemesanan kamar kost.</div>
    </div>
    <a class="btn" href="{{ route('pemesanans.create') }}">+ Tambah Pemesanan</a>
</div>

<div class="card table-wrap">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Customer</th>
                <th>Kamar</th>
                <th>Periode</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pemesanans as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->customer->nama_customer }}</td>
                    <td>{{ $item->kamar->nomor_kamar }}</td>
                    <td>
                        {{ $item->tanggal_masuk->format('d-m-Y') }}
                        s/d
                        {{ $item->tanggal_keluar->format('d-m-Y') }}
                    </td>
                    <td>Rp{{ number_format($item->total_harga, 0, ',', '.') }}</td>
                    <td>{{ ucfirst($item->status) }}</td>
                    <td>
                        <div class="actions">
                            <a class="btn blue" href="{{ route('pemesanans.show', $item) }}">Detail</a>
                            <a class="btn secondary" href="{{ route('pemesanans.edit', $item) }}">Edit</a>

                            <form method="POST" action="{{ route('pemesanans.destroy', $item) }}"
                                onsubmit="return confirm('Hapus pemesanan ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn red">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align:center">
                        Belum ada transaksi pemesanan.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
