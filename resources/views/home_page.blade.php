<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <title>Toko Online | Kharisma Mahesa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans+Code:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <style>
        body {
            scroll-behavior: smooth;
            font-family: "Google Sans Code", monospace;
        }

        .hero {
            background: linear-gradient(135deg, #198754, #20c997);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background: url("https://www.transparenttextures.com/patterns/cubes.png");
            opacity: 0.1;
        }

        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .btn-buy {
            background: linear-gradient(135deg, #198754, #20c997);
            border: none;
            color: white;
        }

        .btn-buy:hover {
            background: linear-gradient(135deg, #20c997, #198754);
        }
    </style>
</head>

<body>
    <!-- NAVBAR (Header) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Toko Kharisma</a>
            <button class="navbar-toggler ms-2" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#products" class="nav-link">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link">Kontak</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center mt-2 mt-lg-0 ms-lg-auto">
                    <a class="btn btn-outline-light" href="{{ url('/login') }}">Sign In</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- HERO (Jumbotron) -->
    <section class="hero min-vh-100 d-flex align-items-center text-center">
        <div class="container">
            <h1 class="display-4 fw-bold">Selamat Datang di Toko Kharisma! <i class="bi bi-cart-check"></i></h1>
            <p class="lead mt-3">Produk berkualitas dan harga terjangkau</p>
            <a href="#products" class="btn btn-light btn-lg mt-3">
                Lihat Produk
            </a>
        </div>
    </section>

    <!-- PRODUCTS (List Produk) -->
    <section id="products" class="py-5 bg-light">
        <div class="container">
            <h2 class="fw-bold text-center mb-5">Produk Unggulan</h2>
            <div class="row g-4">
                <!-- Produk 1: Nasi Goreng -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
                    <div class="card product-card shadow-sm h-100">
                        <img src="{{ url('storage/products/01KD22DG3QHJJ8E7TFKGNE5HV8.png') }}"
                            class="card-img-top thumbnail thumbnail-sm" alt="Nasi Goreng">
                        <div class="card-body">
                            <h5 class="card-title">Nasi Goreng Spesial</h5>
                            <p class="card-text">Nasi goreng hangat dengan telur dan sambal khas. Harga: Rp 25.000</p>
                            <button class="btn btn-buy w-100">Beli Sekarang</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
                    <div class="card product-card shadow-sm h-100">
                        <img src="https://source.unsplash.com/300x200/?rendang,food"
                            class="card-img-top thumbnail thumbnail-sm" alt="Rendang">
                        <div class="card-body">
                            <h5 class="card-title">Rendang Daging</h5>
                            <p class="card-text">Rendang empuk dengan bumbu meresap. Harga: Rp 60.000</p>
                            <button class="btn btn-buy w-100">Beli Sekarang</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
                    <div class="card product-card shadow-sm h-100">
                        <img src="https://source.unsplash.com/300x200/?sate,skewer"
                            class="card-img-top thumbnail thumbnail-md" alt="Sate Ayam">
                        <div class="card-body">
                            <h5 class="card-title">Sate Ayam Madura</h5>
                            <p class="card-text">Sate juicy dengan bumbu kacang khas. Harga: Rp 30.000</p>
                            <button class="btn btn-buy w-100">Beli Sekarang</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
                    <div class="card product-card shadow-sm h-100">
                        <img src="https://source.unsplash.com/300x200/?bread,roti"
                            class="card-img-top thumbnail thumbnail-md" alt="Roti">
                        <div class="card-body">
                            <h5 class="card-title">Roti Tawar Spesial</h5>
                            <p class="card-text">Roti lembut cocok untuk sarapan. Harga: Rp 15.000</p>
                            <button class="btn btn-buy w-100">Beli Sekarang</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
                    <div class="card product-card shadow-sm h-100">
                        <img src="https://source.unsplash.com/300x200/?kopi,coffee"
                            class="card-img-top thumbnail thumbnail-md" alt="Kopi">
                        <div class="card-body">
                            <h5 class="card-title">Kopi Tubruk</h5>
                            <p class="card-text">Kopi pilihan, aroma kuat dan nikmat. Harga: Rp 18.000</p>
                            <button class="btn btn-buy w-100">Beli Sekarang</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
                    <div class="card product-card shadow-sm h-100">
                        <img src="https://source.unsplash.com/300x200/?cake,kue"
                            class="card-img-top thumbnail thumbnail-md" alt="Kue">
                        <div class="card-body">
                            <h5 class="card-title">Kue Lapis</h5>
                            <p class="card-text">Kue tradisional manis dan lembut. Harga: Rp 20.000</p>
                            <button class="btn btn-buy w-100">Beli Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Catatan: Produk ini contoh makanan (mockup). Gambar diambil dari Unsplash (query image) untuk keperluan demo. Ganti dengan data dari database menggunakan loop. -->
        </div>
    </section>

    <!-- CONTACT (Footer untuk Kontak) -->
    <section id="contact" class="py-5 bg-dark text-light">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Kontak Kami</h2>
            <p>Hubungi kami melalui</p>

            <div class="d-flex justify-content-center gap-4 mt-3">

                <a href="tel:+6281234567890" class="fs-4" style="color:#25D366;">
                    <i class="bi bi-telephone"></i>
                </a>

                <a href="https://www.instagram.com/kharismamahesa12/" class="fs-4" style="color:#E4405F;">
                    <i class="bi bi-instagram"></i>
                </a>

            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-black text-center text-muted py-3">
        © 2025 Toko Online Kharisma v.1.0
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
