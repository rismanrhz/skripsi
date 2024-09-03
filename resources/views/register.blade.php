<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('folder/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('folder/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <form action="{{ route('register.store') }}" method="POST">
            @csrf
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            @if (Session::get('error'))
                                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                    <strong>Oops!</strong> Data tidak lengkap. Akun anda gagal dibuat.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="name" name='nama_depan' placeholder="Nama Depan">
                                        @error('nama_depan')
                                            <small class="text-danger">Must be filled</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="name" name='nama_belakang' placeholder="Nama Belakang">
                                        @error('nama_belakang')
                                            <small class="text-danger">Must be filled</small>
                                        @enderror
                                    </div>
                                </div>
                                @php
                                    $email = old('email');
                                    $emailExists = $email ? \App\Models\User::where('email', $email)->exists() : false;
                                @endphp
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="{{ old('email') }}">

                                    @if($errors->has('email'))
                                        <small class="text-danger">{{ $errors->first('email') }}</small>
                                    @elseif($emailExists)
                                        <small class="text-danger">Must be filled</small>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control form-control-user" id="Password" name='password' placeholder="Password">
                                        @error('password')
                                            <small class="text-danger">Must be filled</small>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mb-3">Register</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ route('login')}}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('folder/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('folder/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('folder/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('folder/js/sb-admin-2.min.js')}}"></script>

</body>

</html>