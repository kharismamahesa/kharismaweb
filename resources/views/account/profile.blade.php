@extends('layouts.app')

@section('title', 'Akun Saya')

@section('content')
    <div class="container py-5">
        <div class="row">

            {{-- SIDEBAR --}}
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center border-bottom">
                        <img src="{{ auth()->user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}"
                            class="rounded-circle mb-2" width="80" height="80">

                        <h6 class="fw-bold mb-0">{{ auth()->user()->name }}</h6>
                        <small class="text-muted">{{ auth()->user()->email }}</small>
                    </div>

                    <div class="list-group list-group-flush">
                        <a href="{{ route('account.profile') }}" class="list-group-item list-group-item-action active">
                            <i class="bi bi-person me-2"></i> Profile
                        </a>

                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="bi bi-key me-2"></i> Ubah Password
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="list-group-item list-group-item-action text-danger">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- CONTENT --}}
            <div class="col-md-9">
                <div class="card shadow-sm">
                    <div class="card-header bg-white fw-bold">
                        Profile Akun
                    </div>

                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-4 text-muted">Nama</div>
                            <div class="col-md-8 fw-semibold">{{ auth()->user()->name }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4 text-muted">Email</div>
                            <div class="col-md-8 fw-semibold">{{ auth()->user()->email }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4 text-muted">Login via</div>
                            <div class="col-md-8 fw-semibold">
                                {{ auth()->user()->provider ?? 'Email & Password' }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4 text-muted">Bergabung sejak</div>
                            <div class="col-md-8 fw-semibold">
                                {{ auth()->user()->created_at->translatedFormat('d F Y') }}
                            </div>
                        </div>

                        <hr>

                        <button class="btn btn-outline-primary">
                            <i class="bi bi-pencil"></i> Edit Profile
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
