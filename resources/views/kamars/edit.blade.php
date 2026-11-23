<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kamar</title>
</head>
<body>
    <h2>Edit Kamar</h2>

    <form action="{{ route('kamars.update', $kamar->id) }}"
          method="POST">
        @csrf
        @method('PUT')

        <label>Nomor Kamar</label><br>
        <input type="text" name="nomor_kamar"
               value="{{ old('nomor_kamar', $kamar->nomor_kamar) }}" required><br><br>

        <label>Tipe Kamar</label><br>
        <input type="text" name="tipe_kamar"
               value="{{ old('tipe_kamar', $kamar->tipe_kamar) }}" required><br><br>

        <label>Harga</label><br>
        <input type="number" name="harga"
               value="{{ old('harga', $kamar->harga) }}" min="0" required><br><br>

        <label>Status</label><br>
        <select name="status" required>
            <option value="tersedia"
                {{ $kamar->status == 'tersedia' ? 'selected' : '' }}>
                Tersedia
            </option>
            <option value="terisi"
                {{ $kamar->status == 'terisi' ? 'selected' : '' }}>
                Terisi
            </option>
        </select><br><br>

        <label>Deskripsi</label><br>
        <textarea name="deskripsi">{{ old('deskripsi', $kamar->deskripsi) }}</textarea><br><br>

        <button type="submit">Perbarui</button>
        <a href="{{ route('kamars.index') }}">Kembali</a>
    </form>

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
</body>
</html>
