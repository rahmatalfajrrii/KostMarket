<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Fasilitas - KostMarket</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f4f7f5; color: #1f2937; }
        .navbar { background: linear-gradient(120deg, #087f5b, #16a34a); color: white; padding: 20px 6%; display: flex; justify-content: space-between; align-items: center; }
        .navbar h2 { font-size: 23px; }
        .back { color: white; text-decoration: none; background: #ffffff2b; padding: 10px 18px; border-radius: 9px; }
        .container { max-width: 1250px; margin: auto; padding: 40px 25px; }
        .header { display: flex; justify-content: space-between; align-items: center; gap: 15px; margin-bottom: 25px; }
        h1 { color: #087f5b; font-size: 28px; margin-bottom: 8px; }
        .muted { color: #94a3b8; font-size: 14px; }
        .add { background: #16a34a; color: white; text-decoration: none; padding: 12px 20px; border-radius: 10px; font-weight: 600; }
        .card { background: white; border: 1px solid #edf1ee; border-radius: 17px; padding: 25px; box-shadow: 0 5px 20px #00000008; }
        .alert { background: #d1fae5; color: #047857; padding: 14px; border-radius: 10px; margin-bottom: 20px; }
        .table-wrap { overflow-x: auto; margin-top: 20px; }
        table { width: 100%; min-width: 700px; border-collapse: collapse; }
        th { background: #ecfdf5; color: #047857; text-align: left; padding: 15px; font-size: 13px; }
        td { padding: 15px; border-bottom: 1px solid #f1f5f2; font-size: 14px; }
        tr:hover td { background: #f8fcf9; }
        .status { background: #d1fae5; color: #047857; padding: 6px 11px; border-radius: 20px; font-size: 12px; }
        .edit { background: #dbeafe; color: #2563eb; padding: 8px 12px; border-radius: 7px; text-decoration: none; font-size: 12px; }
        .delete { background: #fee2e2; color: #dc2626; padding: 8px 12px; border: 0; border-radius: 7px; font-size: 12px; cursor: pointer; }
        .actions { display: flex; gap: 8px; align-items: center; }
        .empty { text-align: center; padding: 30px; color: #94a3b8; }
        .footer { text-align: center; color: #94a3b8; padding: 30px; font-size: 13px; }
        @media(max-width:650px) { .container { padding: 25px 15px; } .header { align-items: flex-start; flex-direction: column; } h1 { font-size: 24px; } }
    </style>
</head>
<body>
    <nav class="navbar">
        <h2>🏡 KostMarket</h2>
        <a href="{{ route('dashboard') }}" class="back">← Dashboard</a>
    </nav>

    <main class="container">
        <div class="header">
            <div>
                <h1>Data Fasilitas</h1>
                <p class="muted">Kelola informasi fasilitas KostMarket.</p>
            </div>
            <a href="{{ route('fasilitas.create') }}" class="add">+ Tambah Fasilitas</a>
        </div>

        @if(session('success'))
            <div class="alert">✓ {{ session('success') }}</div>
        @endif

        <div class="card">
            <h3>Daftar Fasilitas</h3>
            <p class="muted" style="margin-top:6px;">Informasi fasilitas yang tersedia.</p>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Nama Fasilitas</th>
                            <th>Deskripsi</th>
                            <th>Lokasi</th>
                            <th>Kondisi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($fasilitas as $item)
                            <tr>
                                <td><strong>{{ $item->nama_fasilitas }}</strong></td>
                                <td>{{ $item->deskripsi ?? '-' }}</td>
                                <td>{{ $item->lokasi ?? '-' }}</td>
                                <td><span class="status">{{ ucfirst($item->kondisi) }}</span></td>
                                <td>
                                    <div class="actions">
                                        <a href="{{ route('fasilitas.edit', $item->id) }}" class="edit">Edit</a>
                                        <form action="{{ route('fasilitas.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus fasilitas ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="empty">✨ Belum ada data fasilitas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <footer class="footer">© {{ date('Y') }} KostMarket. All Rights Reserved.</footer>
</body>
</html>
