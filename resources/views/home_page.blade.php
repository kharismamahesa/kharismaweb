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
            background: linear-gradient(135deg, #10b981, #059669);
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
            background: linear-gradient(135deg, #10b981, #059669);
            border: none;
            color: white;
        }

        .btn-buy:hover {
            background: linear-gradient(135deg, #059669, #10b981);
        }

        /* Thumbnail utility */
        .thumbnail {
            width: 100%;
            height: var(--thumb-height, 200px);
            object-fit: cover;
            display: block;
        }

        .thumbnail-sm {
            --thumb-height: 120px;
        }

        .thumbnail-md {
            --thumb-height: 200px;
        }

        .thumbnail-lg {
            --thumb-height: 300px;
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
                        <a href="#" class="nav-link">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Pre Order</a>
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
            <a href="#preorder" class="btn btn-light btn-lg mt-3">
                Lihat Pre Order
            </a>
        </div>
    </section>

    <!-- PREORDER (Active + list) -->
    <section id="preorder" class="py-5 bg-light">
        <div class="container">

            @forelse ($preorders as $po)
                <!-- Judul PO -->
                <h2 class="fw-bold text-center mb-3">{{ $po->title }}</h2>

                <p class="text-center mb-4">
                    PO ditutup:
                    {{ optional($po->closed_at)->format('d M Y') ?? '-' }}

                    @if (!empty($po->estimated_arrival_at))
                        | Estimasi tiba:
                        {{ optional($po->estimated_arrival_at)->format('d M Y') }}
                    @endif
                    </small>

                <div class="row g-4 mb-5">
                    @foreach ($po->items as $item)
                        @php
                            $product = $item->product;

                            $image =
                                $product && $product->media->first()
                                    ? asset('storage/' . $product->media->first()->file_path)
                                    : 'https://via.placeholder.com/400x300?text=No+Image';
                        @endphp

                        @if ($product)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                <div class="card product-card shadow-sm h-100 position-relative">
                                    <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-2">
                                        Preorder
                                    </span>

                                    <img src="{{ $image }}" class="card-img-top" alt="{{ $product->name }}">

                                    <div class="card-body d-flex flex-column">
                                        <h6 class="card-title">
                                            {{ $product->name }} </h6>

                                        <p class="card-text small text-muted">
                                            {{ \Illuminate\Support\Str::limit($product->description ?? '-', 60) }}
                                        </p>

                                        <div class="mt-auto">
                                            <div class="fw-bold mb-2">
                                                Rp
                                                {{ number_format($item->preorder_price ?? ($product->selling_price ?? 0), 0, ',', '.') }}
                                            </div>

                                            <button class="btn btn-warning w-100">
                                                Preorder Sekarang
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @empty
                <p class="text-center text-muted">
                    Saat ini belum ada preorder yang aktif.
                </p>
            @endforelse

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
