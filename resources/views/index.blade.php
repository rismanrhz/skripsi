@extends('layouts.main')

@section('header')
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container my-5 py-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="display-3 text-white animated slideInLeft">Selamat Datang <br>di dunia kuliner Surabaya yang autentik!</h1>
                    <p class="text-white animated slideInLeft mb-4 pb-2">Tentukan keindahan rasa khas di setiap hidangan, dan jelajahi beragam pilihan makanan yang tidak hanya menggoda lidah Anda, tetapi juga bersahabat dengan kantong Anda.</p>
                    @if(session('user'))
                    <a href="{{ route('rekomendasi.form')}}" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft ">Cari Rekomendasi</a>
                    @endif
                    @if(!session('user'))
                    <a href="{{ route('login')}}" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft ">Cari Rekomendasi</a>
                    @endif
                </div>
                <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                    <img class="img-fluid" src="img/nasgor.png" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
<main>

        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6" id="about">
                        <div class="row g-3">
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="img/mie ayam.jpeg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="img/tahu tek.jpeg" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="img/batagor.jpeg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="img/lontong sayur.jpeg">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">About Us</h5>
                        <h1 class="mb-4">Welcome to <i class="fa fa-utensils text-primary me-2"></i>Website</h1>
                        <p class="mb-4">Sistem Rekomendasi Makanan Sesuai Budget di Kota Surabaya adalah platform yang dirancang untuk membantu Anda menemukan tempat makan terbaik yang sesuai dengan anggaran Anda di Surabaya. Dengan memanfaatkan algoritma canggih, kami memberikan rekomendasi yang akurat berdasarkan preferensi budget dan lokasi Anda, sehingga Anda dapat menikmati kuliner khas Surabaya tanpa harus khawatir tentang biaya. Kami berkomitmen untuk memudahkan pencarian tempat makan yang tepat, sehingga Anda bisa menikmati pengalaman kuliner yang memuaskan di kota ini.</p>
                        @if(!session('user'))
                        <a class="btn btn-primary py-3 px-5 mt-2" href="login">Baca Selengkapnya</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Menu Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Restaurant</h5>
                    <h1 class="mb-5">Most Popular Restaurant</h1>
                </div>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/soto ayam.jpg" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Soto Ayam "Cak To" Undaan Wetan</span>
                                                <span class="text-primary">4.7</span>
                                            </h5>
                                            <small class="fst-italic">Jl. Undaan Wetan Jl. Ngemplak 1 No.36, Ketabang, Kec. Genteng, Surabaya.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/ayam goreng.jpg" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Ayam Goreng Djakarta</span>
                                                <span class="text-primary">4.5</span>
                                            </h5>
                                            <small class="fst-italic">Jl. Kusuma Bangsa No.40, Ketabang, Kec. Genteng, Surabaya.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/padang.jpeg" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>RM Padang Bundo Sati</span>
                                                <span class="text-primary">4.5</span>
                                            </h5>
                                            <small class="fst-italic">Jl. Walikota Mustajab No.70, Ketabang, Kec. Genteng, Surabaya.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/sate.jpeg" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Sate Kambing & Thengkleng Rica-Rica Pak Manto</span>
                                                <span class="text-primary">4.6</span>
                                            </h5>
                                            <small class="fst-italic">Jl. Slamet No.6, RT.002/RW.04, Ketabang, Kec. Genteng, Surabaya.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/Nasi Hainan.jpeg" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Nasi Ayam Hai Nan</span>
                                                <span class="text-primary">4.5</span>
                                            </h5>
                                            <small class="fst-italic">Jl. Pahlawan No.91, Alun-alun Contong, Kec. Bubutan, Surabaya.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="img/bakso.jpeg" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Bakso dan Tahu Campur Cak Naim</span>
                                                <span class="text-primary">4.5</span>
                                            </h5>
                                            <small class="fst-italic">Jl. Dupak No.2, Gundih, Kec. Bubutan, Surabaya.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>        
                    </div>
                </div>
                @if(session('user'))
                <div class="text-center" style="margin-top: 20px;">
                    <a href="{{ route('menurestoran')}}" class="btn btn-primary py-sm-2 px-sm-4 me-2 animated slideInLeft">Lihat Selengkapnya</a>
                </div>
                @endif
                @if(!session('user'))
                <div class="text-center" style="margin-top: 20px;">
                    <a href="{{ route('login')}}" class="btn btn-primary py-sm-2 px-sm-4 me-2 animated slideInLeft">Lihat Selengkapnya</a>
                </div>
                @endif
            </div>
        </div>
        <!-- Menu End -->

</main>
@endsection