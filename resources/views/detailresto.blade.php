@extends('layouts.main')

@section('header')
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Detail Resto</h1>
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
                        <h3 class="section-title ff-secondary text-start text-primary fw-normal">Mau makan apa hari ini?</h3>
                        <form>    
                            <div class="form-floating">
                                <input type="numeric" class="form-control" id="budget" placeholder="Masukkan Budgetmu">
                                <label for="budget">Masukkan Budgetmu</label>
                            </div>
                            <div class="form-floating">
                                <input type="numeric" class="form-control" id="titikx" placeholder="Titik X">
                                <label for="titikx">Masukkan Lokasimu Berdasarkan Koordinat Titik X</label>
                            </div>
                            <div class="form-floating">
                                <input type="numeric" class="form-control" id="titiky" placeholder="Titik Y">
                                <label for="titiky">Masukkan Lokasimu Berdasarkan Koordinat Titik Y</label>
                            </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">CARI</button>
                                </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
    
        
</main>

@endsection