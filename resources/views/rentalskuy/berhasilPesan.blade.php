@extends('rentalskuy/layouts/master')

@section('content')

    <script src="https://cdn.tailwindcss.com"></script>
    <main class="l-main">

        <!--========== DECORATION ==========-->
        <div class="pt-[4.5rem] px-20 min-h-[80vh]">
            <div class="text-center mt-5">
                <svg class="w-14 m-auto text-green-600" xmlns="http://www.w3.org/2000/svg" preservAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor " d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10s10-4.5 10-10S17.5 2 12 2m-2 15l-5-5l1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9Z"/></svg>
                <h1 class="mt-5 font-medium text-3xl">Mobil Berhasil Dipesan</h1>
            </div>
            <div class="mt-10 bg-white shadow-inner border-b-2 rounded-xl px-20 pb-20 pt-5">
                <h1 class="text-center text-xl font-semibold">E-Tiket Rental Mobil</h1>
                <div class="mt-5 mx-10 flex items-center justify-between">
                    <div>
                        <div class="ml-[-2rem] flex items-center">
                            <svg class="w-5" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8s8 3.58 8 8s-3.58 8-8 8zm.5-13H11v6l5.25 3.15l.75-1.23l-4.5-2.67z"/></svg>
                            <h1 class="ml-3 font-semibold">Durasi Rental</h1>
                        </div>
                        <div class="mt-2 leading-8 flex items-center justify-between">
                            <div>
                                <h2 class="text-sm">Pengambilan</h2>
                                <h1 class="font-semibold">{{ date("d F Y", strtotime($tbl_booking->from_date)) }}</h1>
                            </div>
                            <div class="ml-20">
                                <h2 class="text-sm">Pengembalian</h2>
                                <h1 class="font-semibold">{{ date("d F Y", strtotime($tbl_booking->to_date)) }}</h1>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h1 class="font-semibold text-xl capitalize">Mobil {{ $tbl_booking->nama_mobil }}</h1>
                    </div>
                </div>
                <div class="mt-3 mx-10 flex items-center justify-between leading-10 font-semibold">
                    <div>
                        <h1>Nama Pemesan: {{ $tbl_booking->nama_user }}</h1>
                        <h1>Pembayaran BRI: 5221 8430 2924 8031</h1>
                    </div>
                    <div>
                        <h1>Rp. {{ $tbl_booking->total_bayar }}</h1>
                    </div>
                </div>
                <h1 class="mt-5 text-center font-semibold text-red-600">Kami akan segera menghubungi anda via nomor WhatsApp</h1>
                <div class="mt-10 w-fit m-auto">
                    <a href="/"><button class="py-2 px-4 bg-red-600 rounded-full text-white font-semibold">Kembali Beranda</button></a>
                </div>
            </div>
        </div>
        
    </main>

@endsection