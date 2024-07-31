@extends('layouts.administrator')
@section('content')

<main>
    <!-- Begin Page Content -->
    <div class="container-fluid">
    
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Menu Makanan</h1>
    
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row-reverse">
                {{-- <h6 class=" font-weight-bold text-primary">Tabel Menu</h6> --}}
                <a class="btn btn-primary mb-1" href="{{route('menu.create', $id_resto)}}" role="button">Add</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="restoranTable" width="100%" cellspacing="0">
    
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Nama Menu</th>
                                <th>Kategori Menu</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
    </div>
    <!-- /.container-fluid -->
</main>

@endsection