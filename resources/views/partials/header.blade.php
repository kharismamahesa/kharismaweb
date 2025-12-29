<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">Toko Kharisma</a>

        <div class="d-flex align-items-center gap-3 d-lg-none">
            @auth
                <a href="{{ route('cart.index') }}" class="text-white position-relative">
                    <i class="bi bi-cart3 fs-5"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        3
                    </span>
                </a>
            @endauth

            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ url('/') }}#produk" class="nav-link">Produk</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/') }}#preorder" class="nav-link">Pre Order</a>
                </li>
            </ul>

            {{-- RIGHT SIDE --}}
            <div class="ms-auto d-flex align-items-center gap-3">
                @auth
                    <a href="{{ route('cart.index') }}" class="text-white position-relative d-none d-lg-inline-block">
                        <i class="bi bi-cart3 fs-5"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            3
                        </span>
                    </a>
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                            data-bs-toggle="dropdown">

                            <img src="{{ auth()->user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}"
                                class="rounded-circle me-2" width="32" height="32">

                            <span class="fw-semibold">
                                {{ auth()->user()->name }}
                            </span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end shadow">
                            <li>
                                {{-- <a class="dropdown-item" href="#">
                                    <i class="bi bi-person"></i> Profil
                                </a> --}}

                                @auth
                                    @if (auth()->user()->role === 'customer')
                                        <a class="dropdown-item" href="{{ route('account.profile') }}">
                                            <i class="bi bi-person"></i> Profil
                                        </a>
                                    @endif

                                    @if (auth()->user()->role === 'admin')
                                        <a class="dropdown-item" href="/admin">
                                            <i class="bi bi-speedometer2"></i> Dashboard
                                        </a>
                                    @endif
                                @endauth

                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a class="btn btn-outline-light" href="{{ route('login') }}">
                        <i class="bi bi-box-arrow-in-right"></i> Masuk
                    </a>
                @endauth

            </div>
        </div>
    </div>
</nav>
