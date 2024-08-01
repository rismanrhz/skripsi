@extends('layouts.main')

@section('header')
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Restoran</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Restoran</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')

<main>
    <!-- Restaurant Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Restaurant</h5>
                <h1 class="mb-5">Most Popular Restaurant</h1>
            </div>
            <div class="row">
                @foreach($resto as $data)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <img class="card-img-top" src="{{ asset('resto/'.$data->image) }}" alt="{{ $data->nama }}">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $data->nama }}</h5>
                                <p class="card-text">{{ $data->detail_alamat }}</p>
                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                    <span class="text-primary"><i class="bi bi-star-fill"></i> {{ $data->rating }}</span>
                                    <a href="{{ route('detailresto', ['id_resto' => $data->id]) }}" class="btn btn-primary">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Restaurant End -->
</main>

@endsection
