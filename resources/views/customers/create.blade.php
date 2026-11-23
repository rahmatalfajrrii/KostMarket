<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Customer - KostMarket</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: #f4f8f5;
            color: #263b2e;
        }

        .navbar {
            background: #176b45;
            color: white;
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 23px;
            font-weight: bold;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-size: 14px;
        }

        .container {
            max-width: 750px;
            margin: 45px auto;
            padding: 0 20px;
        }

        .form-card {
            background: white;
            padding: 35px;
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.06);
        }

        .header {
            margin-bottom: 28px;
        }

        .header h2 {
            font-size: 25px;
            color: #176b45;
            margin-bottom: 8px;
        }

        .header p {
            color: #7b8b80;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            font-size: 14px;
        }

        input, textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #dce5df;
            border-radius: 9px;
            outline: none;
            font-size: 14px;
            background: #fbfdfb;
        }

        input:focus, textarea:focus {
            border-color: #238653;
            box-shadow: 0 0 0 3px rgba(35,134,83,0.1);
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        .error {
            color: #dc3545;
            font-size: 12px;
            margin-top: 6px;
        }

        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 28px;
        }

        .btn {
            padding: 12px 22px;
            border-radius: 9px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
        }

        .btn-save {
            background: #176b45;
            color: white;
        }

        .btn-save:hover {
            background: #105536;
        }

        .btn-back {
            background: #e8eee9;
            color: #405448;
        }

        .btn-back:hover {
            background: #dce6df;
        }

        @media (max-width: 600px) {
            .form-card {
                padding: 23px;
            }

            .buttons {
                flex-direction: column;
            }

            .btn {
                text-align: center;
            }
        }
    </style>
</head>
<body>

    <div class="navbar">
        <div class="logo">KostMarket</div>
        <a href="{{ route('customers.index') }}">← Kembali ke Data Customer</a>
    </div>

    <div class="container">
        <div class="form-card">

            <div class="header">
                <h2>Tambah Customer</h2>
                <p>Silakan isi formulir berikut untuk menambahkan data customer baru.</p>
            </div>

            <form action="{{ route('customers.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Nama Customer</label>
                    <input type="text" name="nama_customer"
                        value="{{ old('nama_customer') }}"
                        placeholder="Masukkan nama customer">

                    @error('nama_customer')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email"
                        value="{{ old('email') }}"
                        placeholder="Masukkan alamat email">

                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>No. HP</label>
                    <input type="text" name="no_hp"
                        value="{{ old('no_hp') }}"
                        placeholder="Masukkan nomor handphone">

                    @error('no_hp')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat"
                        placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>

                    @error('alamat')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="buttons">
                    <button type="submit" class="btn btn-save">
                        Simpan Customer
                    </button>

                    <a href="{{ route('customers.index') }}" class="btn btn-back">
                        Kembali
                    </a>
                </div>

            </form>
        </div>
    </div>

</body>
</html>
