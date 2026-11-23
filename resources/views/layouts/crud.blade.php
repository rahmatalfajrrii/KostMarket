<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - KostMarket</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f4f7f5;
            color: #1f2937;
        }

        .navbar {
            background: linear-gradient(120deg, #087f5b, #16a34a);
            color: white;
            padding: 18px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            background: #ffffff24;
            padding: 9px 14px;
            border-radius: 8px;
        }

        .container {
            max-width: 1200px;
            margin: 35px auto;
            padding: 0 22px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 22px;
            flex-wrap: wrap;
        }

        h1 {
            color: #087f5b;
            margin: 0 0 6px;
        }

        .muted {
            color: #64748b;
            font-size: 14px;
        }

        .card {
            background: white;
            border: 1px solid #e5eee8;
            border-radius: 14px;
            padding: 22px;
            margin-bottom: 20px;
            box-shadow: 0 4px 16px #00000008;
        }

        .btn {
            display: inline-block;
            border: 0;
            border-radius: 8px;
            padding: 10px 15px;
            text-decoration: none;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            background: #16a34a;
            color: white;
        }

        .btn.secondary {
            background: #64748b;
        }

        .btn.blue {
            background: #2563eb;
        }

        .btn.red {
            background: #dc2626;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 9px;
            margin-bottom: 15px;
            background: #d1fae5;
            color: #047857;
        }

        .alert.error {
            background: #fee2e2;
            color: #b91c1c;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 750px;
        }

        th, td {
            text-align: left;
            padding: 13px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 14px;
        }

        th {
            background: #ecfdf5;
            color: #047857;
        }

        td form {
            display: inline;
        }

        .table-wrap {
            overflow-x: auto;
        }

        label {
            display: block;
            font-weight: 600;
            margin: 14px 0 6px;
        }

        input, select, textarea {
            width: 100%;
            padding: 11px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font: inherit;
            background: white;
        }

        textarea {
            min-height: 90px;
        }

        .actions {
            display: flex;
            gap: 7px;
            flex-wrap: wrap;
        }

        .detail {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        .detail div {
            padding: 12px;
            background: #f8fafc;
            border-radius: 8px;
        }

        .detail strong {
            display: block;
            color: #64748b;
            font-size: 12px;
            margin-bottom: 5px;
        }

        @media(max-width: 650px) {
            .detail {
                grid-template-columns: 1fr;
            }

            .navbar {
                padding: 15px 5%;
            }
        }
    </style>
</head>

<body>
    <header class="navbar">
        <strong>🏠 KostMarket</strong>
        <a href="{{ route('dashboard') }}">← Kembali ke Dashboard</a>
    </header>

    <main class="container">
        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert error">{{ session('error') }}</div>
        @endif

        @if($errors->any())
            <div class="alert error">
                <strong>Periksa kembali data:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
