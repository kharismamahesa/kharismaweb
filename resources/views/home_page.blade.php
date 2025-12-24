@extends('layouts.app')

@section('title', 'Toko Online | Kharisma Mahesa')

@section('content')

    {{-- HERO --}}
    <section class="hero min-vh-100 d-flex align-items-center text-center">
        <div class="container position-relative">
            <h1 class="display-4 fw-bold">
                Selamat Datang di Toko Kharisma <i class="bi bi-cart-check"></i>
            </h1>

            <p class="lead mt-3">
                Produk berkualitas dan harga terjangkau
            </p>

            <a href="#preorder" class="btn btn-light btn-lg mt-3">
                Lihat Pre Order
            </a>
        </div>
    </section>

    {{-- PREORDER --}}
    <section id="preorder" class="py-5 bg-light">
        <div class="container">

            @forelse ($preorders as $po)

                {{-- Judul Preorder --}}
                <h2 class="fw-bold text-center mb-2">
                    {{ $po->title }}
                </h2>

                <p class="text-center text-muted mb-4">
                    PO ditutup:
                    {{ optional($po->closed_at)->format('d M Y') ?? '-' }}

                    @if ($po->estimated_arrival_at)
                        | Estimasi tiba:
                        {{ optional($po->estimated_arrival_at)->format('d M Y') }}
                    @endif
                </p>

                {{-- GRID PRODUK --}}
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
                                <div class="card product-card h-100 shadow-sm position-relative">

                                    {{-- Badge --}}
                                    <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-2">
                                        Preorder
                                    </span>

                                    {{-- Image --}}
                                    <img src="{{ $image }}" class="card-img-top" alt="{{ $product->name }}"
                                        style="height:200px; object-fit:cover">

                                    {{-- Body --}}
                                    <div class="card-body d-flex flex-column">
                                        <h6 class="fw-semibold">
                                            {{ $product->name }}
                                        </h6>

                                        <p class="small text-muted">
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

@endsection
