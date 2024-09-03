@extends('layouts.administrator')
@section('content')

<main>
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Ubah Profil Pengguna</h1><br>
        
    <!-- DataTales Example -->
        <body>   
            <div class="container">
                <form action="{{ route('pengguna.update', $pengguna->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                        <input type="hidden" name="id" value="1">
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Depan</label>
                                        <input type="text" class="form-control" id="name" name="nama_depan" value="{{ $pengguna->nama_depan }}" required>
                                        @error('nama_depan')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Belakang</label>
                                        <input type="text" class="form-control" id="name" name="nama_belakang" value="{{ $pengguna->nama_belakang }}" >
                                        @error('nama_belakang')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $pengguna->email }}" >
                                        @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" value="{{ $pengguna->password }}" >
                                        @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        <button type="submit" class="btn btn-primary mb-3">Submit</button><br>
                        <a href="{{ route('pengguna') }}" class="btn btn-secondary">Cancel</a>         
                </form>   
            </div>
        </body>    
    </div>
                <!-- /.container-fluid -->
</main>
@endsection