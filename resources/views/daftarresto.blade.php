@extends('layouts.main')

@section('header')
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Daftar Resto</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Daftar Resto</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')

<main>
    <form action="{{ route('daftarresto.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Regis Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Daftarkan Restomu</h5>
                    <h1 class="mb-5">Daftar Resto Baru</h1>
                </div>
                <div class="row g-4 justify-content-center">
                    <div class="col-md-6">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="hidden" name="userid" value="{{session('user')->id}}">
                                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Restoran">
                                            <label for="nama">Nama Restoran</label>
                                            @error('nama')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <select name="kecamatan" id="kecamatan" class="form-control">
                                                <option value="">Pilih Kecamatan</option>
                                                <option value="genteng">Genteng</option>
                                                <option value="bubutan">Bubutan</option>
                                            </select>
                                            <label for="kecamatan">Kecamatan</label>
                                            @error('kecamatan')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="jam" id="jam" placeholder="Jam Buka">
                                            <label for="jam">Jam Buka <small class="text-danger" style="font-size: 10px">(ex. 07.00 - 18.00)</small></label>
                                            @error('jam')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>                                    
                                    <div class="col-6">
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="rating" id="rating" placeholder="Rating">
                                                <label for="rating">Rating<small class="text-danger" style="font-size: 10px"> (ex. 4.8)</small></label>
                                                @error('rating')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" name="detail_alamat" id="detail_alamat"></textarea>
                                            <label for="detail_alamat">Detail Alamat</label>
                                            @error('detail_alamat')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                            <label for="image" class="form-label"> Gambar </label>
                                            <input type="file" class="form-control" id="image" name="image" >
                                            @error('image')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                    </div>
                                    <div class="col-12"><br>
                                        <button class="btn btn-primary w-100 py-3" type="submit">Kirim</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- Regis End -->
    </form>
</main>
@endsection
