@extends('layouts.main')

@section('header')
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Hasil Rekomendasi</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Rekomendasi</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')
<main>
    <div class="container-fluid text-center">
        <div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-0">
                <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                    <h3 class="section-title ff-secondary text-start text-primary fw-normal">Rekomendasi Menu Makanan dan Minuman</h3>
                    @if(isset($recommend) && count($recommend) > 0)
                        <div class="row">
                            @foreach($recommend as $menu)
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $menu['name'] }}</h5>
                                            <p class="card-text">Harga: Rp{{ number_format($menu['harga'], 0, ',', '.') }}</p>
                                            <p class="card-text">Restoran: {{ $menu['restaurant'] }}</p>
                                            <p class="card-text">District: {{ $menu['kecamatan'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted">Tidak ada rekomendasi yang ditemukan berdasarkan kriteria yang diberikan.</p>
                    @endif
                    <div class="mt-4">
                        <a href="#" class="btn btn-primary">Cari Lagi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
