<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Fasilitas - KostMarket</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: 'Segoe UI', Arial, sans-serif; background: #f4f7f5; color: #1f2937; }
        nav { background: linear-gradient(120deg, #087f5b, #16a34a); color: white; padding: 20px 6%; }
        nav a { color: white; text-decoration: none; }
        .container { max-width: 750px; margin: 40px auto; padding: 0 20px; }
        .card { background: white; padding: 30px; border-radius: 17px; box-shadow: 0 5px 20px #00000008; }
        h1 { color: #087f5b; margin-top: 0; }
        .muted { color: #94a3b8; font-size: 14px; }
        label { display: block; margin: 20px 0 8px; font-weight: 600; font-size: 14px; }
        input, textarea, select { width: 100%; padding: 12px; border: 1px solid #dce5df; border-radius: 9px; font: inherit; outline: none; }
        input:focus, textarea:focus, select:focus { border-color: #16a34a; }
        textarea { min-height: 100px; resize: vertical; }
        .error { color: #dc2626; font-size: 13px; margin-top: 5px; }
        .buttons { display: flex; gap: 10px; margin-top: 25px; }
        button, .cancel { padding: 12px 20px; border: 0; border-radius: 9px; font-weight: 600; cursor: pointer; text-decoration: none; font-size: 14px; }
        button { background: #16a34a; color: white; }
        .cancel { background: #e5e7eb; color: #374151; }
    </style>
</head>
<body>
    <nav><a href="{{ route('dashboard') }}">🏡 KostMarket</a></nav>

    <main class="container">
        <div class="card">
            <h1>Tambah Fasilitas</h1>
            <p class="muted">Masukkan informasi fasilitas baru.</p>

            <form action="{{ route('fasilitas.store') }}" method="POST">
                @csrf

                <label>Nama Fasilitas</label>
                <input type="text" name="nama_fasilitas" value="{{ old('nama_fasilitas') }}" required>
                @error('nama_fasilitas') <div class="error">{{ $message }}</div> @enderror

                <label>Deskripsi</label>
                <textarea name="deskripsi">{{ old('deskripsi') }}</textarea>
                @error('deskripsi') <div class="error">{{ $message }}</div> @enderror

                <label>Lokasi</label>
                <input type="text" name="lokasi" value="{{ old('lokasi') }}">
                @error('lokasi') <div class="error">{{ $message }}</div> @enderror

                <label>Kondisi</label>
                <select name="kondisi" required>
                    <option value="baik" {{ old('kondisi', 'baik') == 'baik' ? 'selected' : '' }}>Baik</option>
                    <option value="perlu perbaikan" {{ old('kondisi') == 'perlu perbaikan' ? 'selected' : '' }}>Perlu Perbaikan</option>
                    <option value="rusak" {{ old('kondisi') == 'rusak' ? 'selected' : '' }}>Rusak</option>
                </select>
                @error('kondisi') <div class="error">{{ $message }}</div> @enderror

                <div class="buttons">
                    <button type="submit">Simpan Fasilitas</button>
                    <a href="{{ route('fasilitas.index') }}" class="cancel">Kembali</a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
