<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kamar - KostMarket</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f4f7f5;
            color: #1f2937;
        }

        /* NAVBAR */
        .navbar {
            background: linear-gradient(120deg, #087f5b, #16a34a);
            color: white;
            padding: 20px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-icon {
            background: rgba(255,255,255,0.18);
            width: 43px;
            height: 43px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 13px;
            font-size: 23px;
        }

        .brand h2 {
            font-size: 23px;
        }

        .back-btn {
            color: white;
            text-decoration: none;
            background: rgba(255,255,255,0.16);
            padding: 10px 18px;
            border-radius: 9px;
            font-size: 14px;
            transition: 0.3s;
        }

        .back-btn:hover {
            background: rgba(255,255,255,0.28);
        }

        /* CONTAINER */
        .container {
            max-width: 1250px;
            margin: auto;
            padding: 40px 25px;
        }

        /* HEADER */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        .page-header h1 {
            font-size: 28px;
            color: #087f5b;
            margin-bottom: 8px;
        }

        .page-header p {
            color: #94a3b8;
            font-size: 14px;
        }

        .add-btn {
            display: inline-block;
            background: #16a34a;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            transition: 0.3s;
            white-space: nowrap;
        }

        .add-btn:hover {
            background: #15803d;
            transform: translateY(-2px);
        }

        /* ALERT */
        .alert {
            background: #d1fae5;
            color: #047857;
            border: 1px solid #a7f3d0;
            padding: 15px 18px;
            border-radius: 10px;
            margin-bottom: 22px;
            font-size: 14px;
        }

        /* TABLE */
        .table-card {
            background: white;
            border-radius: 17px;
            padding: 25px;
            border: 1px solid #edf1ee;
            box-shadow: 0 5px 20px rgba(0,0,0,0.04);
        }

        .table-title {
            margin-bottom: 20px;
        }

        .table-title h3 {
            font-size: 18px;
            color: #1f2937;
            margin-bottom: 6px;
        }

        .table-title p {
            font-size: 13px;
            color: #94a3b8;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        thead {
            background: #ecfdf5;
        }

        th {
            color: #047857;
            font-size: 13px;
            font-weight: 700;
            text-align: left;
            padding: 16px;
            white-space: nowrap;
        }

        td {
            padding: 16px;
            border-bottom: 1px solid #f1f5f2;
            font-size: 14px;
            color: #475569;
        }

        tbody tr {
            transition: 0.2s;
        }

        tbody tr:hover {
            background: #f8fcf9;
        }

        .room-number {
            font-weight: 700;
            color: #1f2937;
        }

        .price {
            font-weight: 600;
            color: #047857;
            white-space: nowrap;
        }

        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            background: #d1fae5;
            color: #047857;
        }

        .status.unavailable {
            background: #fee2e2;
            color: #dc2626;
        }

        .action {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .edit-btn {
            background: #dbeafe;
            color: #2563eb;
            border: none;
            padding: 8px 13px;
            border-radius: 7px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
        }

        .edit-btn:hover {
            background: #bfdbfe;
        }

        .delete-btn {
            background: #fee2e2;
            color: #dc2626;
            border: none;
            padding: 8px 13px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
        }

        .delete-btn:hover {
            background: #fecaca;
        }

        .empty {
            text-align: center;
            padding: 35px 15px;
            color: #94a3b8;
        }

        .empty-icon {
            font-size: 35px;
            margin-bottom: 10px;
        }

        /* FOOTER */
        .footer {
            text-align: center;
            color: #94a3b8;
            font-size: 13px;
            padding: 30px 15px;
        }

        /* RESPONSIVE */
        @media (max-width: 650px) {
            .navbar {
                padding: 16px 5%;
            }

            .brand h2 {
                font-size: 19px;
            }

            .container {
                padding: 25px 15px;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .page-header h1 {
                font-size: 24px;
            }

            .table-card {
                padding: 17px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">

        <div class="brand">
            <div class="brand-icon">🏡</div>
            <h2>KostMarket</h2>
        </div>

        <a href="{{ route('dashboard') }}" class="back-btn">
            ← Dashboard
        </a>

    </nav>

    <!-- CONTENT -->
    <main class="container">

        <!-- PAGE HEADER -->
        <div class="page-header">

            <div>
                <h1>Data Kamar</h1>
                <p>Kelola informasi kamar kost KostMarket.</p>
            </div>

            <a href="{{ route('kamars.create') }}" class="add-btn">
                + Tambah Kamar
            </a>

        </div>

        <!-- SUCCESS MESSAGE -->
        @if(session('success'))
            <div class="alert">
                ✓ {{ session('success') }}
            </div>
        @endif

        <!-- ROOM TABLE -->
        <div class="table-card">

            <div class="table-title">
                <h3>Daftar Kamar</h3>
                <p>Informasi kamar, harga, dan ketersediaan.</p>
            </div>

            <div class="table-responsive">

                <table>

                    <thead>
                        <tr>
                            <th>Nomor Kamar</th>
                            <th>Tipe Kamar</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($kamars as $kamar)

                            <tr>
                                <td class="room-number">
                                    {{ $kamar->nomor_kamar }}
                                </td>

                                <td>
                                    {{ $kamar->tipe_kamar }}
                                </td>

                                <td class="price">
                                    Rp {{ number_format($kamar->harga, 0, ',', '.') }}
                                </td>

                                <td>
                                    <span class="status {{ strtolower($kamar->status) !== 'tersedia' ? 'unavailable' : '' }}">
                                        {{ ucfirst($kamar->status) }}
                                    </span>
                                </td>

                                <td>
                                    {{ $kamar->deskripsi ?? '-' }}
                                </td>

                                <td>
                                    <div class="action">

                                        <a href="{{ route('kamars.edit', $kamar->id) }}"
                                           class="edit-btn">
                                            Edit
                                        </a>

                                        <form action="{{ route('kamars.destroy', $kamar->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Apakah kamu yakin ingin menghapus kamar ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="delete-btn">
                                                Hapus
                                            </button>

                                        </form>

                                    </div>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="6">
                                    <div class="empty">
                                        <div class="empty-icon">🛏️</div>
                                        <strong>Belum Ada Data Kamar</strong>
                                        <p>Silakan tambahkan data kamar terlebih dahulu.</p>
                                    </div>
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </main>

    <!-- FOOTER -->
    <footer class="footer">
        © {{ date('Y') }} KostMarket. All Rights Reserved.
    </footer>

</body>
</html>
