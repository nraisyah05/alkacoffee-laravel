<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Palantha Breakfast & Cafe - Sarapan Terbaik di Kota" />
    <title>Palantha Breakfast & Cafe</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets-general/assets/favicon.ico') }}" />

    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Google Fonts: Playfair Display + DM Sans -->
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400&family=DM+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        :root {
            --hijau-tua: #1F5E4A;
            --hijau-muda: #2D7A5F;
            --hijau-accent: #3A9B78;
            --krem: #F5EFE6;
            --krem-gelap: #EBE0CE;
            --coklat: #8B5E3C;
            --teks-gelap: #1A2E25;
            --teks-abu: #5A6B64;
            --putih: #FEFEFE;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background-color: var(--krem);
            color: var(--teks-gelap);
            overflow-x: hidden;
        }

        /* ===== NAVBAR ===== */
        #mainNav {
            background: transparent;
            padding: 1.2rem 0;
            transition: all 0.4s ease;
        }

        #mainNav.scrolled {
            background: var(--hijau-tua) !important;
            padding: 0.8rem 0;
            box-shadow: 0 4px 20px rgba(31, 94, 74, 0.3);
        }

        .navbar-brand-text {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--putih) !important;
            letter-spacing: 0.05em;
        }

        .nav-link {
            font-family: 'DM Sans', sans-serif;
            font-weight: 500;
            font-size: 0.85rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.85) !important;
            padding: 0.5rem 1rem !important;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: var(--putih) !important;
        }

        .nav-logo {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            border: 2px solid rgba(255, 255, 255, 0.4);
            object-fit: cover;
            margin-right: 0.6rem;
        }

        /* ===== HERO / MASTHEAD ===== */
        .masthead {
            min-height: 100vh;
            background: linear-gradient(135deg, var(--hijau-tua) 0%, #0D3D2C 50%, #0A2A1E 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .masthead::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(ellipse 60% 40% at 70% 30%, rgba(58, 155, 120, 0.15) 0%, transparent 60%),
                radial-gradient(ellipse 40% 60% at 20% 70%, rgba(31, 94, 74, 0.2) 0%, transparent 50%);
        }

        /* Dekorasi lingkaran */
        .masthead::after {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.05);
            top: -200px;
            right: -200px;
        }

        .hero-deco {
            position: absolute;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.04);
            bottom: -150px;
            left: -100px;
        }

        .masthead-content {
            position: relative;
            z-index: 2;
            text-align: center;
            padding: 2rem;
        }

        .masthead-badge {
            display: inline-block;
            background: rgba(58, 155, 120, 0.2);
            border: 1px solid rgba(58, 155, 120, 0.4);
            color: #7DC4AC;
            font-size: 0.75rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            padding: 0.4rem 1.2rem;
            border-radius: 50px;
            margin-bottom: 1.5rem;
            animation: fadeInDown 0.8s ease both;
        }

        .masthead-heading {
            font-family: 'Playfair Display', serif;
            font-size: clamp(3rem, 8vw, 6.5rem);
            font-weight: 900;
            color: var(--putih);
            line-height: 1.05;
            margin-bottom: 0.3rem;
            animation: fadeInUp 0.8s ease 0.2s both;
        }

        .masthead-heading span {
            color: #7DC4AC;
            font-style: italic;
        }

        .masthead-subheading {
            font-size: 1rem;
            font-weight: 300;
            color: rgba(255, 255, 255, 0.65);
            letter-spacing: 0.05em;
            margin-bottom: 2.5rem;
            animation: fadeInUp 0.8s ease 0.4s both;
        }

        .btn-hero {
            background: linear-gradient(135deg, var(--hijau-accent), var(--hijau-muda));
            color: var(--putih);
            font-family: 'DM Sans', sans-serif;
            font-weight: 600;
            font-size: 0.85rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            padding: 0.9rem 2.2rem;
            border-radius: 50px;
            border: none;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(31, 94, 74, 0.4);
            animation: fadeInUp 0.8s ease 0.6s both;
        }

        .btn-hero:hover {
            transform: translateY(-3px);
            box-shadow: 0 14px 35px rgba(31, 94, 74, 0.5);
            color: var(--putih);
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ===== SECTION UMUM ===== */
        .page-section {
            padding: 5rem 0;
        }

        .section-heading {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.8rem, 4vw, 2.6rem);
            font-weight: 900;
            color: var(--teks-gelap);
            margin-bottom: 0.5rem;
        }

        .section-subheading {
            font-family: 'DM Sans', sans-serif;
            font-weight: 300;
            font-size: 1rem;
            color: var(--teks-abu);
            margin-bottom: 3rem;
        }

        .section-divider {
            width: 50px;
            height: 3px;
            background: var(--hijau-tua);
            margin: 0.8rem auto 1rem;
            border-radius: 2px;
        }

        /* ===== SERVICES ===== */
        #services {
            background: var(--putih);
        }

        .service-card {
            padding: 2.5rem 1.5rem;
            border-radius: 16px;
            transition: all 0.3s ease;
            position: relative;
        }

        .service-card:hover {
            background: var(--krem);
            transform: translateY(-5px);
        }

        .service-icon-wrap {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            background: linear-gradient(135deg, var(--hijau-tua), var(--hijau-accent));
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            box-shadow: 0 8px 20px rgba(31, 94, 74, 0.25);
        }

        .service-icon-wrap i {
            color: white;
            font-size: 1.6rem;
        }

        .service-card h4 {
            font-family: 'Playfair Display', serif;
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--teks-gelap);
            margin-bottom: 0.8rem;
        }

        .service-card p {
            font-size: 0.9rem;
            line-height: 1.7;
            color: var(--teks-abu);
        }

        /* ===== PRODUK ===== */
        #portfolio {
            background: var(--krem);
        }

        .bulan-badge {
            display: inline-block;
            background: var(--hijau-tua);
            color: white;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 0.35rem 1rem;
            border-radius: 50px;
            margin-bottom: 1.5rem;
        }

        .produk-card {
            background: var(--putih);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.35s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            cursor: pointer;
            height: 100%;
        }

        .produk-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 16px 40px rgba(31, 94, 74, 0.18);
        }

        .produk-img-wrap {
            position: relative;
            overflow: hidden;
            height: 220px;
            background: var(--krem-gelap);
        }

        .produk-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .produk-card:hover .produk-img-wrap img {
            transform: scale(1.05);
        }

        .produk-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(31, 94, 74, 0.8), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            align-items: flex-end;
            padding: 1rem;
        }

        .produk-card:hover .produk-overlay {
            opacity: 1;
        }

        .produk-overlay-text {
            color: white;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .produk-rank {
            position: absolute;
            top: 12px;
            left: 12px;
            width: 32px;
            height: 32px;
            background: var(--hijau-tua);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 700;
            z-index: 2;
        }

        .produk-rank.rank-1 {
            background: #C9933A;
        }

        .produk-rank.rank-2 {
            background: #8A8A8A;
        }

        .produk-rank.rank-3 {
            background: var(--coklat);
        }

        .produk-body {
            padding: 1.2rem;
        }

        .produk-kategori {
            font-size: 0.7rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--hijau-tua);
            font-weight: 600;
            margin-bottom: 0.3rem;
        }

        .produk-nama {
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--teks-gelap);
            margin-bottom: 0.5rem;
        }

        .produk-harga {
            font-size: 1rem;
            font-weight: 600;
            color: var(--hijau-muda);
        }

        .produk-terjual {
            font-size: 0.78rem;
            color: var(--teks-abu);
            margin-top: 0.2rem;
        }

        /* ===== ABOUT / TIMELINE ===== */
        #about {
            background: var(--putih);
        }

        .timeline {
            list-style: none;
            padding: 0;
            position: relative;
        }

        .timeline::before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            width: 2px;
            background: linear-gradient(to bottom, var(--hijau-tua), var(--krem-gelap));
            transform: translateX(-50%);
        }

        .timeline li {
            position: relative;
            margin-bottom: 3rem;
            display: flex;
            align-items: center;
        }

        .timeline li:nth-child(odd) {
            flex-direction: row;
        }

        .timeline li:nth-child(even) {
            flex-direction: row-reverse;
        }

        .timeline-img-wrap {
            flex: 0 0 100px;
            z-index: 2;
            display: flex;
            justify-content: center;
        }

        .timeline-img-wrap img {
            width: 90px;
            height: 90px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid var(--putih);
            box-shadow: 0 4px 15px rgba(31, 94, 74, 0.2);
        }

        .timeline-img-wrap.last-item {
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, var(--hijau-tua), var(--hijau-accent));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .timeline-img-wrap.last-item h4 {
            color: white;
            font-family: 'Playfair Display', serif;
            font-size: 0.65rem;
            text-align: center;
            font-weight: 700;
            line-height: 1.3;
        }

        .timeline-panel {
            flex: 1;
            background: var(--krem);
            border-radius: 16px;
            padding: 1.5rem 2rem;
            margin: 0 2rem;
            position: relative;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
        }

        .timeline-panel::before {
            content: '';
            position: absolute;
            top: 50%;
            width: 20px;
            height: 2px;
            background: var(--krem-gelap);
            transform: translateY(-50%);
        }

        .timeline li:nth-child(odd) .timeline-panel::before {
            right: -20px;
        }

        .timeline li:nth-child(even) .timeline-panel::before {
            left: -20px;
        }

        .timeline-year {
            font-size: 0.75rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--hijau-tua);
            font-weight: 600;
            margin-bottom: 0.3rem;
        }

        .timeline-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--teks-gelap);
            margin-bottom: 0.7rem;
        }

        .timeline-desc {
            font-size: 0.9rem;
            line-height: 1.7;
            color: var(--teks-abu);
        }

        /* ===== TEAM ===== */
        #team {
            background: var(--hijau-tua);
        }

        #team .section-heading {
            color: var(--putih);
        }

        #team .section-subheading {
            color: rgba(255, 255, 255, 0.6);
        }

        #team .section-divider {
            background: var(--hijau-accent);
        }

        .team-card {
            text-align: center;
            padding: 1.5rem;
        }

        .team-img-wrap {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 1.2rem;
            border: 4px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .team-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .team-card h4 {
            font-family: 'Playfair Display', serif;
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--putih);
            margin-bottom: 0.2rem;
        }

        .team-card .nim {
            font-size: 0.82rem;
            color: rgba(255, 255, 255, 0.55);
            letter-spacing: 0.05em;
        }

        .team-tagline {
            font-size: 0.95rem;
            color: rgba(255, 255, 255, 0.6);
            font-style: italic;
            line-height: 1.7;
            max-width: 500px;
            margin: 2rem auto 0;
        }

        /* ===== LOCATION ===== */
        #location {
            background: var(--krem);
        }

        .location-address {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            font-size: 0.95rem;
            color: var(--hijau-tua);
            font-weight: 500;
            margin-bottom: 2.5rem;
        }

        .map-wrap {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(31, 94, 74, 0.15);
        }

        /* ===== FOOTER ===== */
        footer {
            background: var(--teks-gelap);
            padding: 2rem 0;
        }

        footer .copy {
            font-size: 0.82rem;
            color: rgba(255, 255, 255, 0.45);
        }

        .social-btn {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
            color: rgba(255, 255, 255, 0.6);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: 0.85rem;
            transition: all 0.3s;
            margin: 0 0.2rem;
        }

        .social-btn:hover {
            background: var(--hijau-tua);
            color: white;
        }

        .footer-link {
            font-size: 0.82rem;
            color: rgba(255, 255, 255, 0.45);
            text-decoration: none;
            transition: color 0.3s;
            margin-left: 1rem;
        }

        .footer-link:hover {
            color: rgba(255, 255, 255, 0.8);
        }

        /* ===== MODAL PRODUK ===== */
        .modal-content {
            border: none;
            border-radius: 20px;
            overflow: hidden;
        }

        .modal-produk-img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .modal-produk-body {
            padding: 2rem;
        }

        .modal-produk-body h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--teks-gelap);
        }

        .modal-produk-kategori {
            font-size: 0.75rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--hijau-tua);
            font-weight: 600;
        }

        .modal-harga {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--hijau-muda);
            margin: 1rem 0;
        }

        .btn-close-modal {
            background: var(--hijau-tua);
            color: white;
            border: none;
            padding: 0.7rem 1.8rem;
            border-radius: 50px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-close-modal:hover {
            background: var(--hijau-muda);
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .timeline::before {
                left: 20px;
            }

            .timeline li {
                flex-direction: column !important;
                align-items: flex-start;
                padding-left: 50px;
            }

            .timeline-img-wrap {
                position: absolute;
                left: 0;
            }

            .timeline-panel {
                margin: 0;
                margin-top: 0.5rem;
            }

            .timeline-panel::before {
                display: none;
            }
        }

        /* ===== PRODUK PLACEHOLDER (jika tidak ada gambar) ===== */
        .produk-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--krem-gelap), var(--krem));
        }

        .produk-placeholder i {
            font-size: 3rem;
            color: var(--hijau-accent);
            opacity: 0.4;
        }
    </style>
</head>

<body id="page-top">

    <!-- ===== NAVBAR ===== -->
    <nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
        <div class="container">
            <img src="{{ asset('assets-admin/img/brand/logo.jpg') }}" class="nav-logo" alt="Palantha Logo">
            <a class="navbar-brand-text" href="#">Palantha</a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive">
                <i class="fas fa-bars text-white"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#services">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">Tim</a></li>
                    <li class="nav-item"><a class="nav-link" href="#location">Lokasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login.admin') }}">Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ===== HERO ===== -->
    <header class="masthead">
        <div class="hero-deco"></div>
        <div class="masthead-content">
            <div class="masthead-badge">☕ Breakfast & Cafe · Sejak 2021</div>
            <h1 class="masthead-heading">
                Palantha<br><span>Breakfast & Cafe</span>
            </h1>
            <p class="masthead-subheading mt-4">Mulai harimu dengan cita rasa terbaik</p>
            <a class="btn-hero" href="#services">Lihat Selengkapnya</a>
        </div>
    </header>

    <!-- ===== SERVICES ===== -->
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading">Layanan Kami</h2>
                <div class="section-divider"></div>
                <p class="section-subheading">Kami selalu memberikan pelayanan terbaik untuk setiap tamu yang datang</p>
            </div>
            <div class="row g-4 text-center">
                <div class="col-md-4">
                    <div class="service-card">
                        <div class="service-icon-wrap">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h4>Penuh Kehangatan</h4>
                        <p>Setiap tamu disambut dengan senyuman dan pelayanan yang tulus dari hati. Kami percaya bahwa
                            pengalaman makan yang menyenangkan dimulai dari keramahan tim kami.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-card">
                        <div class="service-icon-wrap">
                            <i class="fas fa-utensils"></i>
                        </div>
                        <h4>Menu Segar Setiap Hari</h4>
                        <p>Bahan-bahan segar dipilih setiap pagi untuk memastikan setiap hidangan yang tersaji memiliki
                            cita rasa terbaik. Dari sarapan ringan hingga menu andalan cafe.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-card">
                        <div class="service-icon-wrap">
                            <i class="fas fa-wifi"></i>
                        </div>
                        <h4>Suasana Nyaman</h4>
                        <p>Nikmati Wi-Fi cepat, area duduk yang luas dan nyaman, serta suasana yang cocok untuk bekerja,
                            bersantai, atau berkumpul bersama keluarga dan sahabat.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== PRODUK TERLARIS ===== -->
    <section class="page-section" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading">Menu Terlaris</h2>
                <div class="section-divider"></div>
                <div class="bulan-badge">
                    <i class="fas fa-fire-flame-curved me-1"></i>
                    Top 6 Bulan {{ $namaBulan }}
                </div>
                <p class="section-subheading">Menu-menu favorit pelanggan kami bulan ini</p>
            </div>

            <div class="row g-4">
                @forelse($produkTerlaris as $index => $produk)
                    <div class="col-lg-4 col-md-6">
                        <div class="produk-card" data-bs-toggle="modal"
                            data-bs-target="#modalProduk{{ $produk->produk_id }}">
                            <div class="produk-img-wrap">
                                @if ($index < 3)
                                    <div class="produk-rank rank-{{ $index + 1 }}">
                                        @if ($index == 0)
                                            🥇
                                        @elseif($index == 1)
                                            🥈
                                        @else
                                            🥉
                                        @endif
                                    </div>
                                @else
                                    <div class="produk-rank">{{ $index + 1 }}</div>
                                @endif

                                @if ($produk->gambar)
                                    <img src="{{ asset('storage/' . $produk->gambar) }}"
                                        alt="{{ $produk->nama_produk }}" />
                                @else
                                    <div class="produk-placeholder">
                                        <i class="fas fa-mug-hot"></i>
                                    </div>
                                @endif

                                <div class="produk-overlay">
                                    <div class="produk-overlay-text">
                                        <i class="fas fa-eye me-1"></i> Lihat Detail
                                    </div>
                                </div>
                            </div>
                            <div class="produk-body">
                                <div class="produk-kategori">{{ $produk->kategori ?? 'Menu Utama' }}</div>
                                <div class="produk-nama">{{ $produk->nama_produk }}</div>
                                <div class="produk-harga">Rp {{ number_format($produk->harga, 0, ',', '.') }}</div>
                                @if (isset($produk->total_terjual))
                                    <div class="produk-terjual">
                                        <i class="fas fa-chart-simple me-1"></i>
                                        {{ $produk->total_terjual }} porsi terjual bulan ini
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Modal Produk -->
                    <div class="modal fade" id="modalProduk{{ $produk->produk_id }}" tabindex="-1"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                @if ($produk->gambar)
                                    <img src="{{ asset('storage/' . $produk->gambar) }}" class="modal-produk-img"
                                        alt="{{ $produk->nama_produk }}">
                                @endif
                                <div class="modal-produk-body">
                                    <div class="modal-produk-kategori">{{ $produk->kategori ?? 'Menu' }}</div>
                                    <h2>{{ $produk->nama_produk }}</h2>
                                    <p class="text-muted mt-2" style="font-size:0.9rem; line-height:1.7;">
                                        {{ $produk->deskripsi ?? 'Menu andalan Palantha Breakfast & Cafe yang selalu dicintai pelanggan kami.' }}
                                    </p>
                                    <div class="modal-harga">Rp {{ number_format($produk->harga, 0, ',', '.') }}</div>
                                    @if (isset($produk->total_terjual))
                                        <p style="font-size:0.82rem; color: var(--teks-abu);">
                                            <i class="fas fa-fire-flame-curved text-danger me-1"></i>
                                            Terjual <strong>{{ $produk->total_terjual }}</strong> porsi bulan ini
                                        </p>
                                    @endif
                                    <div class="mt-3">
                                        <button class="btn-close-modal" data-bs-dismiss="modal">
                                            <i class="fas fa-xmark me-1"></i> Tutup
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                    <div class="col-12 text-center py-5">
                        <i class="fas fa-mug-hot fa-3x mb-3" style="color: var(--hijau-accent); opacity:0.4;"></i>
                        <p class="text-muted">Belum ada data produk tersedia.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ===== ABOUT / TIMELINE ===== -->
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-heading">Perjalanan Kami</h2>
                <div class="section-divider"></div>
                <p class="section-subheading">"Dari dapur kecil yang penuh cinta, tumbuh menjadi cafe pilihan kota."
                </p>
            </div>

            <ul class="timeline">
                <!-- 2021 -->
                <li>
                    <div class="timeline-img-wrap">
                        <img src="{{ asset('assets-general/assets/img/about/1.jpg') }}" alt="2021" />
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-year">2021</div>
                        <div class="timeline-title">Mimpi di Balik Dapur</div>
                        <p class="timeline-desc">Palantha lahir dari semangat dua sahabat yang bermimpi menyajikan
                            sarapan berkualitas restoran dengan harga yang ramah di kantong. Modal awal hanya berupa
                            peralatan sederhana dan satu resep rahasia yang hingga kini menjadi andalan.</p>
                    </div>
                </li>
                <!-- 2022 -->
                <li class="timeline-inverted">
                    <div class="timeline-img-wrap">
                        <img src="{{ asset('assets-general/assets/img/about/2.jpg') }}" alt="2022" />
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-year">2022</div>
                        <div class="timeline-title">Membuka Pintu Pertama</div>
                        <p class="timeline-desc">Setelah setahun mempersiapkan segalanya, Palantha Breakfast & Cafe
                            resmi membuka gerai pertama di pusat kota. Antusiasme warga sangat tinggi — di hari pertama,
                            semua menu habis terjual dalam tiga jam.</p>
                    </div>
                </li>
                <!-- 2023 -->
                <li>
                    <div class="timeline-img-wrap">
                        <img src="{{ asset('assets-general/assets/img/about/3.jpg') }}" alt="2023" />
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-year">2023</div>
                        <div class="timeline-title">Tumbuh Bersama Pelanggan</div>
                        <p class="timeline-desc">Berkat kepercayaan pelanggan setia, Palantha berhasil memperluas
                            kapasitas tempat duduk, menambahkan menu baru berbasis feedback pelanggan, dan membangun
                            sistem pemesanan digital yang memudahkan pengunjung.</p>
                    </div>
                </li>
                <!-- 2024 -->
                <li class="timeline-inverted">
                    <div class="timeline-img-wrap">
                        <img src="{{ asset('assets-general/assets/img/about/4.jpg') }}" alt="2024" />
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-year">2024 – Sekarang</div>
                        <div class="timeline-title">Inovasi Tanpa Henti</div>
                        <p class="timeline-desc">Memasuki tahun keempat, Palantha terus berinovasi dengan menghadirkan
                            menu seasonal, program loyalitas pelanggan, dan rencana ekspansi ke kota-kota lain.
                            Perjalanan kami baru saja dimulai.</p>
                    </div>
                </li>
                <!-- Be Part -->
                <li>
                    <div class="timeline-img-wrap">
                        <div class="timeline-img-wrap last-item" style="width:90px; height:90px;">
                            <h4>Be Part<br>Of Our<br>Story!</h4>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <section class="page-section" id="team">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading">Tim Pengembang</h2>
                <div class="section-divider" style="background: var(--hijau-accent);"></div>
                <p class="section-subheading">"Dedikasi kami, kepuasan Anda."</p>
            </div>

            <div class="row justify-content-center g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="team-card">
                        <div class="team-img-wrap">
                            <img src="{{ asset('assets-general/assets/img/team/1.jpg') }}" alt="Nuraisyah" />
                        </div>
                        <h4>Nuraisyah</h4>
                        <p class="nim">2357301097</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="team-card">
                        <div class="team-img-wrap">
                            <img src="{{ asset('assets-general/assets/img/team/2.jpg') }}" alt="Nurul Aiza" />
                        </div>
                        <h4>Nurul Aiza</h4>
                        <p class="nim">2357301098</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="team-card">
                        <div class="team-img-wrap">
                            <img src="{{ asset('assets-general/assets/img/team/3.jpg') }}" alt="Miyako" />
                        </div>
                        <h4>Anlisa Elekda Nainggolan</h4>
                        <p class="nim">2357301018</p>
                    </div>
                </div>
            </div>

            <p class="team-tagline text-center">
                Palantha Breakfast & Cafe — lebih dari sekadar tempat makan, kami menghadirkan momen berharga dalam
                setiap suapan dan tegukan.
            </p>
        </div>
    </section>

    <!-- ===== LOCATION ===== -->
    <section class="page-section" id="location">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading">Lokasi Kami</h2>
                <div class="section-divider"></div>
                <div class="location-address">
                    <i class="fas fa-location-dot"></i>
                    <span>Jalan Kartika Sari Kelurahan Sri Meranti, Umban Sari, Kota Pekanbaru, Riau 28261</span>
                </div>
            </div>
            <div class="map-wrap">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6220455132157!2d101.41321037496482!3d0.5683228994261251!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5aba250c5e3d1%3A0x784c2a84de2cf426!2sPalantha%20Breakfast%20%26%20Cafe!5e0!3m2!1sid!2sid!4v1776448210100!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

    <!-- ===== FOOTER ===== -->
    <footer>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <p class="copy">© 2024 Palantha Breakfast & Cafe. All rights reserved.</p>
                </div>
                <div class="col-lg-4 text-center my-2 my-lg-0">
                    <a href="#!" class="social-btn"><i class="fab fa-instagram"></i></a>
                    <a href="#!" class="social-btn"><i class="fab fa-facebook-f"></i></a>
                    <a href="#!" class="social-btn"><i class="fab fa-tiktok"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="#!" class="footer-link">Kebijakan Privasi</a>
                    <a href="#!" class="footer-link">Syarat & Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const nav = document.getElementById('mainNav');
            if (window.scrollY > 60) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        });
    </script>
</body>

</html>
