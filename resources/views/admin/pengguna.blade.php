@extends('layouts.administrator')
@section('content')

<main>
    <!-- Begin Page Content -->
    <div class="container-fluid">
    
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Profil Pengguna</h1>
    
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                {{-- <h6 class="m-0 font-weight-bold text-primary">Tabel Pengguna</h6> --}}
                <a class="btn btn-primary mb-1" href="{{route('pengguna.create')}}" role="button">Add</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="penggunaTable" width="100%" cellspacing="0">
    
                        <thead>
                            <tr>
                                <th>Nama Depan</th>
                                <th>Nama Belakang</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengguna as $data)
                                <tr>
                                    <td>{{ $data->nama_depan }}</td>
                                    <td>{{ $data->nama_belakang }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->password }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Are you sure? ');" action="{{ route('pengguna.destroy', $data->id) }}" method="POST">
                                             <a href="{{ route('pengguna.edit', $data->id ) }}" class="btn btn-warning" >Ubah</a>
         
                                             @csrf
                                             @method('DELETE')
         
                                             <button type="submit" class="btn btn-danger">Hapus</button>
                                         </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
    
    </div>
</main>
<!-- /.container-fluid -->

@endsection