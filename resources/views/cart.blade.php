@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
    <div class="container py-5">

        <h3 class="fw-bold mb-4">
            <i class="bi bi-cart3"></i> Keranjang Belanja
        </h3>

        <div class="row g-4">

            {{-- CART ITEMS --}}
            <div class="col-lg-8">

                {{-- ITEM --}}
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">

                        <div class="row align-items-center">
                            <div class="col-3 col-md-2">
                                <img src="https://via.placeholder.com/150" class="img-fluid rounded">
                            </div>

                            <div class="col-9 col-md-4">
                                <h6 class="mb-1 fw-semibold">Amplang 1 KG</h6>
                                <small class="text-muted">Rp 80.000</small>
                            </div>

                            <div class="col-md-3 mt-3 mt-md-0">
                                <input type="number" class="form-control form-control-sm text-center" min="1"
                                    max="10" value="1">
                            </div>

                            <div class="col-md-2 mt-3 mt-md-0 text-md-end">
                                <div class="fw-bold">
                                    Rp 80.000
                                </div>
                            </div>

                            <div class="col-md-1 text-end mt-3 mt-md-0">
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- ITEM --}}
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">

                        <div class="row align-items-center">
                            <div class="col-3 col-md-2">
                                <img src="https://via.placeholder.com/150" class="img-fluid rounded">
                            </div>

                            <div class="col-9 col-md-4">
                                <h6 class="mb-1 fw-semibold">Amplang 1/2 KG</h6>
                                <small class="text-muted">Rp 40.000</small>
                            </div>

                            <div class="col-md-3 mt-3 mt-md-0">
                                <input type="number" class="form-control form-control-sm text-center" min="1"
                                    max="10" value="2">
                            </div>

                            <div class="col-md-2 mt-3 mt-md-0 text-md-end">
                                <div class="fw-bold">
                                    Rp 80.000
                                </div>
                            </div>

                            <div class="col-md-1 text-end mt-3 mt-md-0">
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            {{-- SUMMARY --}}
            <div class="col-lg-4">

                <div class="card shadow-sm">
                    <div class="card-body">

                        <h5 class="fw-bold mb-3">Ringkasan</h5>

                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal</span>
                            <span>Rp 160.000</span>
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <span>Biaya Lain</span>
                            <span>Rp 0</span>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between fw-bold fs-5">
                            <span>Total</span>
                            <span>Rp 160.000</span>
                        </div>

                        <button class="btn btn-success w-100 mt-3">
                            <i class="bi bi-whatsapp"></i> Checkout
                        </button>

                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
