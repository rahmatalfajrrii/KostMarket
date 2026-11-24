<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Ulasan - KostMarket</title>
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f4f7f5;
            color: #1f2937;
            margin: 0;
        }
        .navbar {
            background: linear-gradient(120deg, #087f5b, #16a34a);
            color: white;
            padding: 20px 6%;
        }
        .container {
            max-width: 750px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,.04);
        }
        h1 { color: #087f5b; }
        label {
            display: block;
            margin: 18px 0 8px;
            font-weight: 600;
        }
        select, input, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font: inherit;
        }
        textarea { min-height: 110px; }
        .error { color: #dc2626; font-size: 13px; }
        .btn {
            display: inline-block;
            padding: 11px 18px;
            border: 0;
            border-radius: 8px;
            text-decoration: none;
            cursor: pointer;
            font-weight: 600;
            margin-top: 20px;
        }
        .save { background: #16a34a; color: white; }
        .back { background: #e5e7eb; color: #374151; }
    </style>
</head>
<body>
    <div class="navbar">
        <h2>⭐ KostMarket</h2>
    </div>

    <div class="container">
        <div class="card">
            <h1>Tambah Ulasan</h1>
            <p>Isi penilaian dan komentar untuk kamar.</p>

            <form action="{{ route('reviews.store') }}" method="POST">
                @csrf

                <label>Nama Customer</label>
                <select name="customer_id" required>
                    <option value="">-- Pilih Customer --</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}"
                            {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                            {{ $customer->nama_customer }}
                        </option>
                    @endforeach
                </select>
                @error('customer_id')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label>Nomor Kamar</label>
                <select name="kamar_id" required>
                    <option value="">-- Pilih Kamar --</option>
                    @foreach($kamars as $kamar)
                        <option value="{{ $kamar->id }}"
                            {{ old('kamar_id') == $kamar->id ? 'selected' : '' }}>
                            {{ $kamar->nomor_kamar }} - {{ $kamar->tipe_kamar }}
                        </option>
                    @endforeach
                </select>
                @error('kamar_id')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label>Rating</label>
                <select name="rating" required>
                    <option value="">-- Pilih Rating --</option>
                    @for($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}"
                            {{ old('rating') == $i ? 'selected' : '' }}>
                            {{ $i }} / 5 ⭐
                        </option>
                    @endfor
                </select>
                @error('rating')
                    <div class="error">{{ $message }}</div>
                @enderror

                <label>Komentar</label>
                <textarea name="komentar"
                    placeholder="Tuliskan ulasan kamar...">{{ old('komentar') }}</textarea>
                @error('komentar')
                    <div class="error">{{ $message }}</div>
                @enderror

                <button type="submit" class="btn save">Simpan Ulasan</button>
                <a href="{{ route('reviews.index') }}" class="btn back">Kembali</a>
            </form>
        </div>
    </div>
</body>
</html>
