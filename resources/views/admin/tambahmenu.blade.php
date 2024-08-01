@extends('layouts.administrator')

@section('content')

<main>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambahkan Menu Restoranmu</h1><br>
        <!-- DataTales Example -->
        <div class="card px-3 py-4 shadow">
            <div class="container">
                <form action="{{ route('menu.store', ['id' => $id_resto]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" name="id_resto" value="{{ $id_resto }}">
                    <div class="mb-3 row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="nama_menu" class="form-label">Nama Menu</label>
                                <input type="text" class="form-control" id="nama_menu" name="nama_menu" required>
                                @error('nama_menu')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="kategori_menu" class="form-label">Kategori Menu</label>
                            <select name="kategori_menu" id="kategori_menu" class="form-control">
                                <option value="">Pilih Kategori</option>
                                <option value="makanan">Makanan</option>
                                <option value="minuman">Minuman</option>
                            </select>
                            @error('kategori_menu')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="text" class="form-control" id="harga" name="harga" placeholder="10000">
                                @error('harga')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="image" class="form-label">Gambar</label>
                                <input type="file" class="form-control" id="image" name="image">
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
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
