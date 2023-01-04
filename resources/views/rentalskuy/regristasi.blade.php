@extends('rentalskuy/layouts/master')

@section('content')

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('assets/css/regristasi.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
  
  <main class="l-main" style="min-height: 90vh">
    <div class="container" style="height: 100%">
        <form class="form-container" action="/register" method="POST">
            @csrf
            <h3 class="textJudul mb-5 mt-2">Daftar</h3>
            <div class="mb-3">
                <label for="exampleInputNama" class="form-label textForm">Nama</label>
                @error('nama_user')
                  <p class="text-danger d-inline-block">* {{ $message }}</p>
                @enderror
                  <div class="input-group mb-3">
                      <input type="text" name="nama_user" class="form-control" id="exampleInputNama" aria-describedby="emailHelp" placeholder="masukkan nama" value="{{ Session::get('nama_user') }}">
                  </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail" class="form-label textForm">Email</label>
                @error('email')
                  <p class="text-danger d-inline-block">* {{ $message }}</p>
                @enderror
                  <div class="input-group mb-3">
                      <input type="email" name="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="masukkan email" value="{{ Session::get('email') }}">
                  </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword" class="form-label textForm">Password</label>
                @error('password')
                  <p class="text-danger d-inline-block">* {{ $message }}</p>
                @enderror
                  <div class="input-group mb-3">
                      <input type="password" name="password" class="form-control" id="exampleInputPassword" aria-describedby="emailHelp" placeholder="masukkan password" value="{{ Session::get('password') }}">
                  </div>
              </div>
            <div class="mb-3">
              <label for="exampleInputTglLahir" class="form-label textForm">Tanggal Lahir</label>
              @error('tgl_lahir')
                <p class="text-danger d-inline-block">* {{ $message }}</p>
              @enderror
                <div class="input-group mb-3">
                  <input type="date" name="tgl_lahir" class="form-control" id="exampleInputTglLahir" placeholder="masukkan tgl lahir" value="{{ Session::get('tgl_lahir') }}">
                </div>
            </div>
            <div class="mt-4 d-grid">
                <button type="submit" class="btn btn-primary textForm">Daftar</button>
            </div>
            <div class="mt-2 mb-4">
              <span class="textForm">Sudah punya akun? <a href="/login" class="textForm text-hover">Login</a></span>
            </div>
        </form>
    </div>
  </main>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@endsection