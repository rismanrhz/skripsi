@extends('layouts.administrator')
@section('content')

<main>
    <!-- Begin Page Content -->
    <div class="container-fluid">
    
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambahkan Restoranmu</h1><br>
        <!-- DataTales Example -->
        <div class="card px-3 py-4 shadow">
            <div class="container">
                <form action="{{ route('resto.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" name="id" value="1">
                    <div class="mb-3 row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Restoran</label>
                                <input type="text" class="form-control" id="nama" name="nama"  required>
                                @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-4">
                            <label for="jam" class="form-label">Jam Buka</label>
                            <input type="text" class="form-control" id="jam" name="jam" placeholder="10.00 - 23.00" >
                            @error('jam')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="rating" class="form-label">Rating</label>
                                <input type="number" min="1" max="5" class="form-control" id="rating" name="rating" value="1" >
                                @error('rating')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                <select name="kecamatan" id="kecamatan" class="form-control">
                                    <option value="">PILIH KECAMATAN</option>
                                    <option value="bubutan">Bubutan</option>
                                    <option value="genteng">Genteng</option>
                                </select>
                                @error('kecamatan')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="jam" class="form-label"> Detail Alamat </label>
                                <textarea name="detail_alamat" class="form-control" cols="30" rows="4"></textarea>
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="jam" class="form-label"> Gambar </label>
                                <input type="file" class="form-control" id="image" name="image" >
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-3 col-sm-2">Tambah</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</main>

@endsection