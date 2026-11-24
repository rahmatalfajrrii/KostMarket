<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - KostMarket</title>

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
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-icon {
            background: rgba(255, 255, 255, 0.18);
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
            letter-spacing: 0.5px;
        }

        .logout-btn {
            background: white;
            color: #dc2626;
            border: none;
            padding: 11px 21px;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #fee2e2;
            transform: translateY(-2px);
        }

        /* MAIN CONTENT */
        .container {
            max-width: 1250px;
            margin: auto;
            padding: 40px 25px;
        }

        /* WELCOME SECTION */
        .welcome-card {
            background: linear-gradient(120deg, #ffffff, #ecfdf5);
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.04);
            border: 1px solid #e5eee8;
            margin-bottom: 35px;
            position: relative;
            overflow: hidden;
        }

        .welcome-card::after {
            content: "🏡";
            position: absolute;
            right: 55px;
            top: 25px;
            font-size: 85px;
            opacity: 0.13;
        }

        .welcome-card h1 {
            color: #087f5b;
            font-size: 29px;
            margin-bottom: 12px;
        }

        .welcome-card p {
            color: #64748b;
            font-size: 15px;
            line-height: 1.8;
        }

        .welcome-tag {
            display: inline-block;
            background: #d1fae5;
            color: #047857;
            padding: 7px 13px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        /* SECTION TITLE */
        .section-header {
            margin-bottom: 22px;
        }

        .section-header h2 {
            font-size: 22px;
            color: #1f2937;
            margin-bottom: 7px;
        }

        .section-header p {
            color: #94a3b8;
            font-size: 14px;
        }

        /* MENU GRID */
        .menu-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 22px;
        }

        .menu-card {
            background: white;
            text-decoration: none;
            color: inherit;
            padding: 27px;
            border-radius: 18px;
            border: 1px solid #edf1ee;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.035);
            transition: all 0.3s ease;
            display: block;
        }

        .menu-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.08);
            border-color: #bbf7d0;
        }

        .menu-icon {
            width: 55px;
            height: 55px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 15px;
            font-size: 26px;
            margin-bottom: 20px;
        }

        .customer-icon {
            background: #dbeafe;
        }

        .kamar-icon {
            background: #d1fae5;
        }

        .fasilitas-icon {
            background: #fef3c7;
        }

        .user-icon {
            background: #ede9fe;
        }

        .pemesanan-icon {
            background: #dbeafe;
        }

        .pembayaran-icon {
            background: #fce7f3;
        }

        .menu-card h3 {
            font-size: 19px;
            margin-bottom: 9px;
            color: #1f2937;
        }

        .menu-card p {
            color: #94a3b8;
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .menu-link {
            color: #059669;
            font-size: 13px;
            font-weight: 700;
        }

        .menu-card:hover .menu-link {
            color: #047857;
        }

        /* FOOTER */
        .footer {
            text-align: center;
            color: #94a3b8;
            font-size: 13px;
            padding: 35px 15px;
        }

        /* RESPONSIVE */
        @media (max-width: 650px) {
            .navbar {
                padding: 17px 5%;
            }

            .brand h2 {
                font-size: 20px;
            }

            .container {
                padding: 25px 17px;
            }

            .welcome-card {
                padding: 25px;
            }

            .welcome-card h1 {
                font-size: 23px;
            }

            .welcome-card::after {
                right: 15px;
                top: 20px;
                font-size: 55px;
            }

            .menu-container {
                grid-template-columns: 1fr;
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

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">
                Logout ↗
            </button>
        </form>

    </nav>

    <!-- MAIN CONTENT -->
    <main class="container">

        <!-- WELCOME -->
        <section class="welcome-card">

            <span class="welcome-tag">DASHBOARD ADMIN</span>

            <h1>Selamat Datang di KostMarket!</h1>

            <p>
                Halo, <strong>{{ Auth::user()->name }}</strong>.
                <br>
                Selamat datang kembali! Kelola data kost kamu dengan
                mudah melalui dashboard KostMarket.
            </p>

        </section>

        <!-- MENU -->
        <div class="section-header">
            <h2>Menu Utama</h2>
            <p>Pilih menu yang ingin kamu kelola.</p>
        </div>

        <div class="menu-container">

            <!-- CUSTOMER -->
            <a href="{{ route('customers.index') }}" class="menu-card">

                <div class="menu-icon customer-icon">👥</div>

                <h3>Data Customer</h3>

                <p>
                    Kelola informasi pelanggan, mulai dari
                    menambahkan, melihat, mengedit, hingga menghapus data.
                </p>

                <span class="menu-link">Kelola Customer →</span>

            </a>

            <!-- KAMAR -->
            <a href="{{ route('kamars.index') }}" class="menu-card">

                <div class="menu-icon kamar-icon">🛏️</div>

                <h3>Data Kamar</h3>

                <p>
                    Kelola informasi kamar kost, tipe kamar,
                    harga sewa, dan status ketersediaan.
                </p>

                <span class="menu-link">Kelola Kamar →</span>

            </a>

            <!-- FASILITAS -->
            <a href="{{ route('fasilitas.index') }}" class="menu-card">

                <div class="menu-icon fasilitas-icon">✨</div>

                <h3>Data Fasilitas</h3>

                <p>
                    Kelola berbagai fasilitas kost untuk
                    memberikan informasi lengkap kepada pelanggan.
                </p>

                <span class="menu-link">Kelola Fasilitas →</span>

            </a>

            <!-- USER -->
            <a href="{{ route('users.index') }}" class="menu-card">

                <div class="menu-icon user-icon">👤</div>

                <h3>Data User</h3>

                <p>
                    Kelola informasi akun pengguna yang
                    terdaftar dalam sistem KostMarket.
                </p>

                <span class="menu-link">Kelola User →</span>

            </a>

            <!-- PEMESANAN -->
            <a href="{{ route('pemesanans.index') }}" class="menu-card">

                <div class="menu-icon pemesanan-icon">📝</div>

                <h3>Data Pemesanan</h3>

                <p>
                    Kelola transaksi pemesanan kamar kost,
                    mulai dari menambahkan, melihat, mengedit,
                    hingga menghapus data pemesanan.
                </p>

                <span class="menu-link">Kelola Pemesanan →</span>

            </a>

            <!-- PEMBAYARAN -->
            <a href="{{ route('pembayarans.index') }}" class="menu-card">

                <div class="menu-icon pembayaran-icon">💳</div>

                <h3>Data Pembayaran</h3>

                <p>
                    Kelola transaksi pembayaran pelanggan,
                    termasuk jumlah pembayaran, metode,
                    tanggal, dan status pembayaran.
                </p>

                <span class="menu-link">Kelola Pembayaran →</span>

                
            <!-- REVIEWS -->
            <a href="{{ route('reviews.index') }}" class="menu-card">

                <div class="menu-icon" style="background: #fef3c7;">⭐</div>

                <h3>Data Ulasan</h3>

                <p>
                    Kelola ulasan dan penilaian pelanggan terhadap
                    kamar kost, termasuk rating dan komentar.
                </p>

                <span class="menu-link">Kelola Ulasan →</span>

            </a>


            </a>

        </div>

    </main>

    <!-- FOOTER -->
    <footer class="footer">
        © {{ date('Y') }} KostMarket. All Rights Reserved.
    </footer>

</body>
</html>
