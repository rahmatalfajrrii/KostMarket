<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - KostMarket</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: white;
            width: 400px;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #16a34a;
        }

        p {
            text-align: center;
            color: #666;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 7px;
            margin-bottom: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #16a34a;
            color: white;
            border: none;
            border-radius: 7px;
            cursor: pointer;
        }

        .link {
            text-align: center;
            margin-top: 20px;
        }

        a {
            color: #16a34a;
            text-decoration: none;
        }

        .error {
            color: #b91c1c;
            background: #fee2e2;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>KostMarket</h2>

    <p>Buat akun baru</p>

    @if($errors->any())
        <div class="error">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ url('/register') }}" method="POST">

        @csrf

        <label>Nama Lengkap</label>

        <input
            type="text"
            name="name"
            placeholder="Masukkan nama"
            value="{{ old('name') }}"
            required
        >

        <label>Email</label>

        <input
            type="email"
            name="email"
            placeholder="Masukkan email"
            value="{{ old('email') }}"
            required
        >

        <label>Password</label>

        <input
            type="password"
            name="password"
            placeholder="Minimal 8 karakter"
            required
        >

        <label>Konfirmasi Password</label>

        <input
            type="password"
            name="password_confirmation"
            placeholder="Ulangi password"
            required
        >

        <button type="submit">Daftar</button>

    </form>

    <div class="link">
        Sudah punya akun?
        <a href="{{ route('login') }}">Login sekarang</a>
    </div>

</div>

</body>
</html>
