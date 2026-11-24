<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Ulasan - KostMarket</title>

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

        .navbar {
            background: linear-gradient(120deg, #087f5b, #16a34a);
            color: white;
            padding: 20px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h2 {
            font-size: 23px;
        }

        .back-btn, .add-btn {
            color: white;
            text-decoration: none;
            padding: 11px 18px;
            border-radius: 9px;
            font-size: 14px;
            font-weight: 600;
        }

        .back-btn {
            background: rgba(255,255,255,0.16);
        }

        .add-btn {
            background: #16a34a;
        }

        .container {
            max-width: 1250px;
            margin: auto;
            padding: 40px 25px;
        }

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

        .table-card {
            background: white;
            border-radius: 17px;
            padding: 25px;
            border: 1px solid #edf1ee;
            box-shadow: 0 5px 20px rgba(0,0,0,0.04);
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
        }

        thead {
            background: #ecfdf5;
        }

        th {
            color: #047857;
            font-size: 13px;
            text-align: left;
            padding: 16px;
        }

        td {
            padding: 16px;
            border-bottom: 1px solid #f1f5f2;
            font-size: 14px;
            color: #475569;
        }

        tbody tr:hover {
            background: #f8fcf9;
        }

        .edit-btn, .delete-btn {
            padding: 8px 12px;
            border: none;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
        }

        .edit-btn {
            background: #dbeafe;
            color: #2563eb;
        }

        .delete-btn {
            background: #fee2e2;
            color: #dc2626;
        }

        .alert {
            background: #d1fae5;
            color: #047857;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 22px;
        }

        .empty {
            text-align: center;
            padding: 35px;
            color: #94a3b8;
        }

        .footer {
            text-align: center;
            color: #94a3b8;
            font-size: 13px;
            padding: 30px;
        }

        @media (max-width: 650px) {
            .page-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .container {
                padding: 25px 15px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">
    <h2>⭐ KostMarket</h2>
    <a href="{{ route('dashboard') }}" class="back-btn">
        Kembali ke Dashboard
    </a>
</nav>

<div class="container">

    <div class="page-header">
        <div>
            <h1>Data Ulasan</h1>
            <p>Kelola ulasan dan penilaian kamar KostMarket.</p>
        </div>

        <a href="{{ route('reviews.create') }}" class="add-btn">
            + Tambah Ulasan
        </a>
    </div>

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-card">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Customer</th>
                        <th>Nomor Kamar</th>
                        <th>Rating</th>
                        <th>Komentar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($reviews as $review)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                {{ $review->customer->nama_customer ?? '-' }}
                            </td>

                            <td>
                                {{ $review->kamar->nomor_kamar ?? '-' }}
                            </td>

                            <td>
                                {{ $review->rating }} / 5 ⭐
                            </td>

                            <td>
                                {{ $review->komentar ?? '-' }}
                            </td>

                            <td>
                                <a href="{{ route('reviews.edit', $review->id) }}"
                                   class="edit-btn">
                                    Edit
                                </a>

                                <form action="{{ route('reviews.destroy', $review->id) }}"
                                      method="POST"
                                      style="display:inline;"
                                      onsubmit="return confirm('Yakin ingin menghapus ulasan ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="delete-btn">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="empty">
                                Belum ada data ulasan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<div class="footer">
    © {{ date('Y') }} KostMarket. All Rights Reserved.
</div>

</body>
</html>