<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <title>@yield('title', 'Toko Online | Kharisma Mahesa')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans+Code&display=swap" rel="stylesheet">

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

        .hero {
            min-height: 45vh;
        }

        @media (min-width: 992px) {
            .hero {
                min-height: 60vh;
            }
        }

        .product-card {
            transition: .3s;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, .2);
        }

        .navbar {
            height: 80px;
        }

        .app-content {
            flex: 1 0 auto;
            padding-top: 80px;
            /* offset navbar fixed-top */
        }

        /* footer */
        footer {
            margin-top: auto;
        }
    </style>

    @stack('styles')
</head>

<body>

    @include('partials.header')

    <main class="app-content">
        @yield('content')
    </main>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
