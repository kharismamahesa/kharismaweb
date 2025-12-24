@extends('layouts.app')

@section('title', 'Masuk Akun')

@section('content')
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="col-md-5 col-lg-4">

            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">

                {{-- Header --}}
                <div class="text-center py-4 text-white" style="background: linear-gradient(135deg,#10b981,#059669)">
                    <h4 class="fw-bold mb-1">Toko Kharisma</h4>
                    <small class="p-2">Silakan masuk untuk melanjutkan pembelian</small>
                </div>

                {{-- Body --}}
                <div class="card-body p-4">

                    {{-- ERROR --}}
                    @if ($errors->any())
                        <div class="alert alert-danger small">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    {{-- FORM LOGIN --}}
                    <form method="POST" action="{{ route('login.process') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                    placeholder="email@email.com" required autofocus>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                            </div>
                        </div>

                        <button class="btn btn-success w-100 py-2 fw-semibold">
                            Masuk
                        </button>
                    </form>

                    {{-- DIVIDER --}}
                    <div class="text-center my-3 text-muted small">
                        — atau —
                    </div>

                    {{-- GOOGLE LOGIN --}}
                    <a href="{{ route('google.login') }}"
                        class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center gap-2">
                        <i class="bi bi-google"></i>
                        Login dengan Google
                    </a>

                </div>

            </div>
        </div>
    </div>
@endsection
