@extends('layouts.main')

@section('header')
<style>
    .container {
        margin: 0 auto;
        width: 50%; /* Mengatur lebar tabel */
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
</style>
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Profil</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Profil</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')

<main>
    
    <div class="container">
        <h2 style="text-align:center;">Profil Pribadi</h2>
        <table>
            <tr>
                <th>Informasi</th>
                <th>Detail</th>
            </tr>
            <tr>
                <td>Nama Depan</td>
                <td>asdasd</td>
            </tr>
            <tr>
                <td>Nama Belakang</td>
                <td>asdasd</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>asdasd</td>
            </tr>
            <tr>
                <td>Password</td>
                <td>asdasd</td>
            </tr>
        </table><br><br>
    </div>

    <div class="container">

        @section('content')
        <div class="container">
            <h2>Edit Profil</h2>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('profil.update',$pengguna->id) }}" method="POST">
                @csrf
                
                    
                <div class="form-group">
                    <label for="nama_depan">Nama Depan:</label>
                    <input type="text" name="nama_depan" class="form-control" id="nama_depan" value="{{old('nama_depan', $pengguna->nama_depan) }}" required>
                </div>
                <div class="form-group">
                    <label for="nama_belakang">Nama Belakang:</label>
                    <input type="text" name="nama_belakang" class="form-control" id="nama_belakang" value="{{old('nama_belakang', $pengguna->nama_belakang) }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{old('email', $pengguna->email) }}" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" id="password" value="{{old('password', $pengguna->password) }}" required>
                </div>  
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
        @endsection

    </div>
    

</main>
@endsection