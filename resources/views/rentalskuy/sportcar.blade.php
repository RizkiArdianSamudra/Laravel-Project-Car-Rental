@extends('rentalskuy/layouts/master')

@section('content')

    <main class="l-main">

        <!--========== DECORATION ==========-->
        <section class="decoration section bd-container" id="decoration" style="min-height: 90vh;">
            <h2 class="section-title">Sport Car</h2>
            <div class="decoration__container bd-grid">
                
                @foreach ($tbl_mobil as $mobil)
                    <div class="decoration__data">
                        <img src='{{ asset("images/$mobil->gambar") }}' class="decoration__img">
                        <h3 class="decoration__title" style="text-transform: capitalize">{{ $mobil->nama_mobil }}</h3>
                        <span class="accessory__preci">Rp. {{ $mobil->harga_sewa_hari }}K/hari</span><br>
                        <a href="/car-detail/{{ $mobil->id_mobil }}" class="button button-link">Go Rental</a>
                    </div>
                @endforeach

            </div>
        </section>

    </main>

@endsection