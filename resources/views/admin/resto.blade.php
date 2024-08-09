@extends('layouts.administrator')
@section('content')

<main>
    <!-- Begin Page Content -->
    <div class="container-fluid">
    
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Profil Resto</h1>
    
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            @if(session('user')->status == 3)
            <div class="card-header py-3 d-flex flex-row-reverse">
                {{-- <h6 class=" font-weight-bold text-primary">Tabel Resto</h6> --}}
                <a class="btn btn-primary mb-1" href="{{route('resto.create')}}" role="button">Add</a>
            </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="restoranTable" width="100%" cellspacing="0">
    
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Nama Restoran</th>
                                <th>Kecamatan</th>
                                <th>Detail Alamat</th>
                                <th>Jam Buka</th>
                                <th>Rating</th>
                                <th>Lokasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(session('user')->status == 2)
                            <tr>
                                <td>
                                    <img src="{{asset('resto/'.$resto->image)}}" alt="{{$resto->image}}" width="100%">
                                </td>
                                <td>{{ $resto->nama }}</td>
                                <td>{{ $resto->kecamatan }}</td>
                                <td>{{ $resto->detail_alamat }}</td>
                                <td>{{ $resto->jam }}</td>
                                <td>{{ $resto->rating }}</td>
                                <td><a href="{{ $resto->google_maps_link }}">{{ $resto->google_maps_link }}</a> </td>
                                <td>
                                    <form onsubmit="return confirm('Are you sure? ');" action="{{ route('resto.destroy', $resto->id) }}" method="POST">
                                        <a href="{{ route('resto.edit', $resto->id ) }}" class="btn btn-warning" >Ubah</a>
    
                                        @csrf
                                        @method('DELETE')
    
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                        <a href="{{ route('menu', $resto->id) }}" class="btn btn-primary">Menu</a>

                                    </form>
                                </td>
                            </tr>
                            @else
                            @foreach($resto as $data)
                                <tr>
                                    <td>
                                        <img src="{{asset('resto/'.$data->image)}}" alt="{{$data->image}}" width="100%">
                                    </td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->kecamatan }}</td>
                                    <td>{{ $data->detail_alamat }}</td>
                                    <td>{{ $data->jam }}</td>
                                    <td>{{ $data->rating }}</td>
                                    <td>{{ $data->google_maps_link }} </td>
                                    <td>
                                        <form onsubmit="return confirm('Are you sure? ');" action="{{ route('resto.destroy', $data->id) }}" method="POST">
                                            <a href="{{ route('resto.edit', $data->id ) }}" class="btn btn-warning" >Ubah</a>
        
                                            @csrf
                                            @method('DELETE')
        
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                            <a href="{{ route('menu', $data->id ) }}" class="btn btn-primary" >Menu</a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
    </div>
    <!-- /.container-fluid -->
</main>

@endsection