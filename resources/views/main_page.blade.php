<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <title>Portofolio | Kharisma Mahesa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Devicon (Logo Teknologi) -->
    <link href="https://cdn.jsdelivr.net/npm/devicon@2.16.0/devicon.min.css" rel="stylesheet" />

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

        .skill-icon {
            font-size: 48px;
        }

        .card:hover {
            transform: translateY(-5px);
            transition: 0.3s;
        }
    </style>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">K.M</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="#about" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="#skills" class="nav-link">Skills</a>
                    </li>
                    <li class="nav-item">
                        <a href="#projects" class="nav-link">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section class="hero min-vh-100 d-flex align-items-center text-center">
        <div class="container">
            <h1 class="display-4 fw-bold">Halo, Saya Kharisma 👋</h1>
            <p class="lead mt-3">Web & Mobile Developer</p>
            <p>Mengembangkan aplikasi berbasis Laravel, CodeIgniter, dan Flutter</p>
            <a href="#projects" class="btn btn-light btn-lg mt-3">
                Lihat Project
            </a>
        </div>
    </section>

    <!-- ABOUT -->
    <section id="about" class="py-5">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Tentang Saya</h2>
            <p class="text-muted">
                Saya adalah seorang developer yang berpengalaman dalam membangun
                aplikasi web dan mobile, khususnya sistem pemerintahan, dan aplikasi internal berbasis database.
            </p>
        </div>
    </section>

    <!-- SKILLS -->
    <section id="skills" class="py-5 bg-light">
        <div class="container">
            <h2 class="fw-bold text-center mb-5">Tech Stack</h2>

            <div class="row text-center g-4">
                <!-- Laravel -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <i class="devicon-laravel-plain colored skill-icon"></i>
                            <h5 class="mt-3">Laravel</h5>
                            <p class="text-muted">CRUD, Filament</p>
                        </div>
                    </div>
                </div>

                <!-- CodeIgniter -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <i class="devicon-codeigniter-plain colored skill-icon"></i>
                            <h5 class="mt-3">CodeIgniter</h5>
                            <p class="text-muted">CI3, AJAX, Datatables</p>
                        </div>
                    </div>
                </div>

                <!-- Flutter -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <i class="devicon-flutter-plain colored skill-icon"></i>
                            <h5 class="mt-3">Flutter</h5>
                            <p class="text-muted">Mobile App, API Integration</p>
                        </div>
                    </div>
                </div>

                <!-- MySQL -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <i class="devicon-mysql-plain colored skill-icon"></i>
                            <h5 class="mt-3">MySQL</h5>
                            <p class="text-muted">
                                Relational Database, Query Optimization
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Bootstrap -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <i class="devicon-bootstrap-plain colored skill-icon"></i>
                            <h5 class="mt-3">Bootstrap</h5>
                            <p class="text-muted">CSS Framework, Responsive Design</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- PROJECTS -->
    <section id="projects" class="py-5">
        <div class="container">
            <h2 class="fw-bold text-center mb-5">Project Saya</h2>
            <div class="row g-4">
                <h5 class="text-center">COMING SOON ...</h5>
                <!-- <div class="col-md-4">
            <div class="card shadow-sm h-100">
              <div class="card-body">
                <h5 class="card-title">Sistem Apotek</h5>
                <p class="card-text">
                  Aplikasi kasir apotek dengan manajemen obat, supplier, dan
                  transaksi penjualan.
                </p>
                <span class="badge bg-primary">Laravel</span>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card shadow-sm h-100">
              <div class="card-body">
                <h5 class="card-title">Aplikasi Sekolah</h5>
                <p class="card-text">
                  Sistem absensi siswa & guru, keuangan, dan jadwal pelajaran.
                </p>
                <span class="badge bg-success">Laravel</span>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card shadow-sm h-100">
              <div class="card-body">
                <h5 class="card-title">Aplikasi Mobile Booking</h5>
                <p class="card-text">
                  Aplikasi Android untuk pemesanan kendaraan kantor.
                </p>
                <span class="badge bg-info">Flutter</span>
              </div>
            </div>
          </div> -->
            </div>
        </div>
    </section>

    <!-- CONTACT -->
    <section id="contact" class="py-5 bg-dark text-light">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Contact</h2>
            <p>Hubungi saya melalui</p>

            <div class="d-flex justify-content-center gap-4 mt-3">
                <a href="mailto:kharismamahesa27@gmail.com" class="fs-4 text-danger">
                    <i class="bi bi-envelope"></i>
                </a>

                <a href="https://github.com/kharismamahesa/" class="fs-4 text-light">
                    <i class="bi bi-github"></i>
                </a>

                <a href="https://www.linkedin.com/in/kharismamahesa12/" class="fs-4" style="color:#0A66C2;">
                    <i class="bi bi-linkedin"></i>
                </a>

                <a href="https://www.instagram.com/kharismamahesa12/" class="fs-4" style="color:#E4405F;">
                    <i class="bi bi-instagram"></i>
                </a>

            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-black text-center text-muted py-3">
        © 2025 Kharisma Mahesa v.1.0
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
