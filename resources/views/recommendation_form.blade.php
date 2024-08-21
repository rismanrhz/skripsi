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
                    <h3 class="section-title ff-secondary text-start text-primary fw-normal">Mau makan apa hari ini?</h3>
                    <form action="{{ route('rekom_genetika') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="budget" name="budget" placeholder="Masukkan Budgetmu">
                            <label for="budget">Masukkan Budgetmu</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select name="kecamatan" id="kecamatan" class="form-control">
                                <option value="">PILIH KECAMATAN</option>
                                <option value="bubutan">Bubutan</option>
                                <option value="genteng">Genteng</option>
                            </select>
                            <label for="kecamatan" class="form-label">Kecamatan</label>
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
