@extends('rentalskuy/layouts/master')

@section('content')

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">

  <main class="l-main" style="min-height: 90vh">

    <div class="container">
      <form class="form-container" action="/login" method="POST">
        @csrf
        <h3 class="textJudul mb-5 mt-2">Masuk</h3>
        <div class="mb-3 text-danger">
          @if (session()->has('notvalid'))
              {{ session('notvalid') }}
          @endif
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label textForm">Email</label>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="masukkan email" value="{{ Session::get('email') }}">
          </div>
          @error('email')
            <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label textForm">Password</label>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="masukkan password" value="{{ Session::get('password') }}">
          </div>
          @error('password')
            <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="mt-4 d-grid">
          <button type="submit" name="submit" class="btn btn-primary textForm">Masuk</button>
        </div>
        <div class="mt-2">
          <span class="textForm">Belum punya akun? <a href="/register" class="textForm text-hover">Daftar</a></span>
        </div>

      </form>
    </div>
  </main>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@endsection