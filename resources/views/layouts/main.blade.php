<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Rekomendasi Makananmu</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="container-xxl bg-white p-0">
        


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="{{ route('dashboard')}}" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Surabaya Foodies</h1>
                    <!-- <img src="img/logo1.jpg" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="{{ route('dashboard')}}#about" class="nav-item nav-link">Tentang Kami</a>
                        @if(session('user'))
                        <a href="{{ route('rekomendasi.form')}}" class="nav-item nav-link">Rekomendasi</a>
                        <a href="{{ route('menurestoran')}}" class="nav-item nav-link">Restoran</a>
                        <a href="{{ route('riwayat')}}" class="nav-item nav-link">Riwayat</a>
                        @if(session('user')->status == 2)
                        <a href="{{ route('resto') }}" class="nav-item nav-link">Kelola Resto</a>
                        @else
                        <a href="{{ route('daftarresto')}}" class="nav-item nav-link">Daftar Resto</a>
                        @endif
                        <a href="{{ route('profil')}}" class="nav-item nav-link">
                            <img src="{{asset('img/logo.png')}}" alt="Profil Logo" style="width: 24px; height: 24px;">
                        </a>
                        @endif
                    </div>
                    @if(!session('user'))
                    <a href="{{ route('login')}}" class="btn btn-primary py-2 px-4">Login</a>
                    @else
                    <a href="{{ route('logout')}}" class="btn btn-primary py-2 px-4">Logout</a>
                    @endif
                </div>
            </nav>
            @yield('header')
            
        </div>
        <!-- Navbar & Hero End -->

        @yield('content')

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div style="text-align: center; color: rgba(255, 255, 255, 0.5); padding-bottom: 10px;">
                &copy; 2024 - Sistem Rekomendasi Makanan Di Kota Surabaya
            </div>            
        </div>        
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>