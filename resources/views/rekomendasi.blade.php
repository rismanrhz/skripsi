@extends('layouts.main')

@section('header')
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Rekomendasi</h1>
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
                    <h3 class="section-title ff-secondary text-start text-primary fw-normal">Rekomendasi Menu</h3>
                    @if (!empty($recommendations))
                        <ul>
                            @foreach ($recommendations as $recommendation)
                                <li>{{ $recommendation['name'] }} - Rp{{ $recommendation['price'] }} - Restoran: {{ $recommendation['restaurant'] }} - Kecamatan: {{ $recommendation['district'] }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>Tidak ada rekomendasi yang ditemukan.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
