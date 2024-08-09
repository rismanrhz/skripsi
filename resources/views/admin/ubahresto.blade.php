@extends('layouts.administrator')
@section('content')

<main>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Ubah Restoran</h1><br>

        <!-- DataTales Example -->
        <body>   
            <div class="container">
                <form action="{{ route('resto.update', $resto->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="1">
        <div class="mb-3 row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Restoran</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $resto->nama }}" required>
                    @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-md-4">
                <label for="jam" class="form-label">Jam Buka</label>
                <input type="text" class="form-control" id="jam" name="jam" value="{{ $resto->jam }}" placeholder="10.00 - 23.00" >
                @error('jam')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <input type="number" min="1" max="5" class="form-control" id="rating" name="rating" value="{{ $resto->rating }}" >
                    @error('rating')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="kecamatan" class="form-label" >Kecamatan</label>
                    <select name="kecamatan" id="kecamatan" class="form-control" >
                        <option value="">PILIH KECAMATAN</option>
                        <option value="bubutan" @if($resto->kecamatan == 'bubutan') @selected(true) @endif>Bubutan</option>
                        <option value="genteng" @if($resto->kecamatan == 'genteng') @selected(true) @endif>Genteng</option>
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
                    <label for="detail_alamat" class="form-label"> Detail Alamat </label>
                    <textarea name="detail_alamat" class="form-control" cols="30" rows="4">{{ $resto->detail_alamat }}</textarea>
                    @error('detail_alamat')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="google_maps_link" class="form-label">Link Lokasi</label>
                    <input type="text" class="form-control" id="google_maps_link" name="google_maps_link" value="{{$resto->google_maps_link}}"  required>
                    @error('google_maps_link')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="gambar" class="form-label"> Gambar </label>
                    <input type="file" class="form-control" id="image" name="image" >
                    @error('gambar')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>                        
            </div>
            <button type="submit" class="btn btn-primary mb-3">Submit</button><br>
                    <a href="{{ route('resto') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </body>
    </div>
    <!-- /.container-fluid -->
</main>

@endsection