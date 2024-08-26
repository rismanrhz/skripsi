@extends('layouts.main')

@section('header')
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Riwayat Rekomendasi</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Riwayat</li>
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
                    <h3 class="section-title ff-secondary text-start text-primary fw-normal">Riwayat Rekomendasi Anda</h3>
                    @if(isset($riwayat) && count($riwayat) > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Restoran</th>
                                        <th>Nama Menu</th>
                                        <th>Harga</th>
                                        <th>Kecamatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($riwayat as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->nama_restaurant ?? 'Tidak Diketahui' }}</td>
                                            <td>{{ $item->nama_menu ?? 'Tidak Diketahui' }}</td>
                                            <td>Rp{{ number_format($item->harga ?? 0, 0, ',', '.') }}</td>
                                            <td>{{ $item->kecamatan }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted">Tidak ada riwayat rekomendasi yang ditemukan.</p>
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
