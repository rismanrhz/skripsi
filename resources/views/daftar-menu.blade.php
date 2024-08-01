@extends('layouts.main')

@section('header')
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Detail Resto</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Daftar Menu</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')

<main>
    <div class="container py-5">
        <h2 class="mb-4">Daftar Menu Makanan</h2>

        @if(isset($menus) && $menus->isNotEmpty())
            <!-- Menu Card Section -->
            <div class="row">
                @foreach($menus as $menu)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('menu/' . $menu->image) }}" class="card-img-top" alt="{{ $menu->nama_menu }}" onerror="this.src='path/to/default-image.jpg';">
                            <div class="card-body">
                                <h5 class="card-title">{{ $menu->nama_menu }}</h5>
                                <p class="card-text">Kategori: {{ $menu->kategori_menu }}</p>
                                <p class="card-text">Harga: Rp{{ number_format($menu->harga, 0, ',') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center">Tidak ada menu untuk ditampilkan.</p>
        @endif
    </div>
</main>

@endsection
