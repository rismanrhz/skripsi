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
                                <div class="col-lg-6 col-md-6 mb-4">
                                    <div class="card h-100">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">{{ $menu['nama_restaurant'] }}</h5>
                                            <div class="card mb-3">
                                                <div class="row g-0">
                                                    <div class="col-md-4">
                                                        <img src="{{ asset('menu')  }}/{{$menu['image']}}" class="img-fluid rounded-start" alt="Gambar {{ $menu['image'] }}">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title"><small>{{ $menu['nama_menu'] }}</small></h5>
                                                            <p class="card-text">Harga: Rp{{ number_format($menu['harga'], 0, ',', '.') }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                                <a href="{{ $menu['lokasi'] }}" target="_blank" class="btn btn-warning text-white btn-sm col-sm-5">Lokasi</a>
                                                <a href="{{ route('detailresto', ['id_resto' => $menu['id_resto']]) }}" class="btn btn-success btn-sm col-sm-6">Detail</a>
                                            </div>
                                            {{-- <a href="{{ $menu['lokasi'] }}" target="_blank" class="btn btn-secondary btn-sm mt-2">Lihat di Google Maps</a> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted">Tidak ada rekomendasi yang ditemukan berdasarkan kriteria yang diberikan.</p>
                    @endif
                    <div class="mt-4">
                        <a href="{{ route('rekomendasi.form')}}" class="btn btn-primary">Cari Lagi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
