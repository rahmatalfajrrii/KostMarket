<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User - KostMarket</title>

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f4f7f5;
            color: #1f2937;
        }

        .navbar {
            background: linear-gradient(120deg, #087f5b, #16a34a);
            color: white; padding: 20px 6%;
            display: flex; justify-content: space-between;
            align-items: center;
        }

        .brand { display: flex; align-items: center; gap: 12px; }
        .brand-icon {
            background: rgba(255,255,255,.18);
            width: 43px; height: 43px;
            display: flex; justify-content: center;
            align-items: center; border-radius: 13px;
            font-size: 23px;
        }

        .brand h2 { font-size: 23px; }

        .back-btn {
            color: white; text-decoration: none;
            background: rgba(255,255,255,.16);
            padding: 10px 18px; border-radius: 9px;
        }

        .container {
            max-width: 750px; margin: auto;
            padding: 40px 25px;
        }

        .page-header { margin-bottom: 25px; }
        .page-header h1 { color: #087f5b; font-size: 28px; margin-bottom: 8px; }
        .page-header p { color: #94a3b8; font-size: 14px; }

        .form-card {
            background: white; padding: 30px;
            border-radius: 17px; border: 1px solid #edf1ee;
            box-shadow: 0 5px 20px rgba(0,0,0,.04);
        }

        .form-group { margin-bottom: 20px; }

        label {
            display: block; font-size: 14px;
            font-weight: 600; margin-bottom: 9px;
            color: #374151;
        }

        input {
            width: 100%; padding: 13px 15px;
            border: 1px solid #dbe4de; border-radius: 9px;
            font-size: 14px; outline: none;
        }

        input:focus {
            border-color: #16a34a;
            box-shadow: 0 0 0 3px rgba(22,163,74,.10);
        }

        .error-text { color: #dc2626; font-size: 12px; margin-top: 6px; }

        .form-actions {
            display: flex; justify-content: flex-end;
            gap: 10px; margin-top: 25px;
        }

        .cancel-btn, .save-btn {
            padding: 12px 20px; border-radius: 9px;
            text-decoration: none; border: none;
            font-size: 14px; font-weight: 600; cursor: pointer;
        }

        .cancel-btn { background: #f1f5f2; color: #475569; }
        .save-btn { background: #16a34a; color: white; }
        .save-btn:hover { background: #15803d; }

        .footer {
            text-align: center; color: #94a3b8;
            font-size: 13px; padding: 30px 15px;
        }

        @media (max-width: 650px) {
            .navbar { padding: 16px 5%; }
            .brand h2 { font-size: 19px; }
            .container { padding: 25px 15px; }
            .form-card { padding: 20px; }
            .page-header h1 { font-size: 24px; }
        }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="brand">
        <div class="brand-icon">🏡</div>
        <h2>KostMarket</h2>
    </div>

    <a href="{{ route('users.index') }}" class="back-btn">← Kembali</a>
</nav>

<main class="container">

    <div class="page-header">
        <h1>Tambah User</h1>
        <p>Masukkan informasi akun pengguna baru.</p>
    </div>

    <div class="form-card">

        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="name"
                       value="{{ old('name') }}"
                       placeholder="Masukkan nama lengkap" required>
                @error('name')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email"
                       value="{{ old('email') }}"
                       placeholder="contoh@email.com" required>
                @error('email')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password"
                       placeholder="Minimal 8 karakter" required>
                @error('password')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" id="password_confirmation"
                       name="password_confirmation"
                       placeholder="Ulangi password" required>
            </div>

            <div class="form-actions">
                <a href="{{ route('users.index') }}" class="cancel-btn">
                    Batal
                </a>

                <button type="submit" class="save-btn">
                    Simpan User
                </button>
            </div>
        </form>

    </div>
</main>

<footer class="footer">
    © {{ date('Y') }} KostMarket. All Rights Reserved.
</footer>

</body>
</html>
