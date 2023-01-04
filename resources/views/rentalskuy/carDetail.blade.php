@extends('rentalskuy/layouts/master')

@section('content')

    <script src="https://cdn.tailwindcss.com"></script>
    <main class="l-main">

        <!--========== DECORATION ==========-->
        <div class="pt-[4.5rem] px-20 min-h-[80vh]">
            @foreach ($tbl_mobil as $mobil)                
            <h1 class="pt-4 pb-8 text-center font-semibold text-3xl">{{ $mobil->nama_kategori }}</h1>
            <div>
                <div class="relative min-h-[15rem] bg-white flex items-center justify-between shadow-inner border-b-2 rounded-xl p-5 px-10">
                    <div class="flex items-center">
                        <div>
                            <img src='{{ asset("images/$mobil->gambar") }}' class="w-80">
                        </div>
                        <div class="ml-16 leading-7">
                            <h1 class="font-bold text-xl capitalize">{{ $mobil->nama_mobil }}</h1>
                            <h2>9.0/10.0</h2>
                            <h2>Disediakan oleh <span class="font-bold">Rentalskuy</span></h2>
                        </div>
                    </div>
                    <div class="leading-8 text-center">
                        <h1 class="font-bold text-xl">Harga Total</h1>
                        <h2 class="font-semibold">Rp. {{ $mobil->harga_sewa_hari }}K/day</h2>
                        <a href="/car-pesan/{{ $mobil->id_mobil }}"><button class="mt-2 px-8 bg-red-600 rounded-full text-white">Lanjutkan</button></a>
                    </div>
                </div>
                <div class="min-h-[15rem] mt-[-2rem] bg-white p-14 shadow-md">
                    <h1 class="font-bold text-lg">Deskripsi Mobil</h1>
                    <div class="mt-2 pl-4 leading-8">
                        <div class="flex items-center">
                            <svg class="w-5" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M7 18S4 10 4 6s2-4 2-4h1s1 0 1 1s-1 1-1 3s3 4 3 7s-3 5-3 5m5-1c-1 0-4 2.5-4 2.5c-.3.2-.2.5 0 .8c0 0 1 1.8 3 1.8h6c1.1 0 2-.9 2-2v-1c0-1.1-.9-2-2-2h-5Z"/></svg>
                            <p class="ml-3">{{ $mobil->kapasitas_kursi }} Kursi</p>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256"><path fill="currentColor" d="M216 64h-40v-8a24.1 24.1 0 0 0-24-24h-48a24.1 24.1 0 0 0-24 24v8H40a16 16 0 0 0-16 16v128a16 16 0 0 0 16 16h176a16 16 0 0 0 16-16V80a16 16 0 0 0-16-16ZM96 56a8 8 0 0 1 8-8h48a8 8 0 0 1 8 8v8H96Zm64 24v128H96V80ZM40 80h40v128H40Zm176 128h-40V80h40v128Z"/></svg>
                            <p class="ml-3">{{ $mobil->kapasitas_bagasi }} Bagasi</p>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512 512"><path fill="currentColor" d="M256 25C128.3 25 25 128.3 25 256s103.3 231 231 231s231-103.3 231-231S383.7 25 256 25zm0 30c110.9 0 201 90.1 201 201s-90.1 201-201 201S55 366.9 55 256S145.1 55 256 55zM80.52 203.9c-4.71 19.2-7.52 37-7.52 54c144.7 30.3 121.5 62.4 148 177.8c11.4 2.1 23 3.3 35 3.3s23.6-1.2 35-3.3c26.5-115.4 3.3-147.5 148-177.8c-.6-18.9-3-38.4-7.5-54C346.7 182.7 301.1 172 256 172c-45.1 0-90.7 10.7-175.48 31.9zM256 183c40.2 0 73 32.8 73 73s-32.8 73-73 73s-73-32.8-73-73s32.8-73 73-73zm0 18c-30.5 0-55 24.5-55 55s24.5 55 55 55s55-24.5 55-55s-24.5-55-55-55z"/></svg>
                            <p class="ml-3">{{ $mobil->jenis_mobil }}</p>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.85 7h10.29l1.04 3H5.81l1.04-3zM19 17H5v-5h14v5z"/><circle cx="7.5" cy="14.5" r="1.5" fill="currentColor"/><circle cx="16.5" cy="14.5" r="1.5" fill="currentColor"/></svg>
                            <p class="ml-3">Model Tahun {{ $mobil->tahun_model }}</p>
                        </div>
                    </div>
                </div>
                <div class="z-10 relative min-h-[15rem] mt-[-2rem] bg-white shadow-inner border-b-2 rounded-xl p-5 px-14">
                    <h1 class="mt-2 font-bold text-lg">Kebijakan Rentalskuy</h1>
                    <div class="mt-2 pl-4 leading-8 flex items-center">
                        <div>
                            <div class="flex items-center">
                                <svg class="w-5" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M3 19V4a1 1 0 0 1 1-1h9a1 1 0 0 1 1 1v8h2a2 2 0 0 1 2 2v4a1 1 0 0 0 2 0v-7h-2a1 1 0 0 1-1-1V6.414l-1.657-1.657l1.414-1.414l4.95 4.95A.997.997 0 0 1 22 9v9a3 3 0 0 1-6 0v-4h-2v5h1v2H2v-2h1zM5 5v6h7V5H5z"/></svg>
                                <p class="ml-3">Kembalikan bensin seperti semula Penuh ke Penuh</p>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8s8 3.58 8 8s-3.58 8-8 8zm.5-13H11v6l5.25 3.15l.75-1.23l-4.5-2.67z"/></svg>
                                <p class="ml-3">Penggunaan dari 00.00 hingga 23.59 per hari</p>
                            </div>
                        </div>
                        <div class="ml-20">
                            <div class="flex items-center">
                                <svg class="w-5 text-green-600" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="m10 17l-4-4l1.41-1.41L10 14.17l6.59-6.59L18 9m-6-8L3 5v6c0 5.55 3.84 10.74 9 12c5.16-1.26 9-6.45 9-12V5l-9-4Z"/></svg>
                                <p class="ml-3">Asuransi Mobil</p>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 text-green-600" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="m10 17l-4-4l1.41-1.41L10 14.17l6.59-6.59L18 9m-6-8L3 5v6c0 5.55 3.84 10.74 9 12c5.16-1.26 9-6.45 9-12V5l-9-4Z"/></svg>
                                <p class="ml-3">Jaminan uang kembali</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="min-h-[15rem] mt-[-2rem] bg-white p-14 shadow-md">
                    <h1 class="font-bold text-lg">Syarat Mobil</h1>
                    <div class="mt-2 pl-4 leading-8">
                        <div class="flex items-center">
                            <svg class="w-5 text-green-600" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10s10-4.5 10-10S17.5 2 12 2m-2 15l-5-5l1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9Z"/></svg>
                            <p class="ml-3">KTP / Passport</p>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 text-green-600" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10s10-4.5 10-10S17.5 2 12 2m-2 15l-5-5l1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9Z"/></svg>
                            <p class="ml-3">SIM A / SIM Internasional</p>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 text-green-600" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10s10-4.5 10-10S17.5 2 12 2m-2 15l-5-5l1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9Z"/></svg>
                            <p class="ml-3">Menyetujui semua prosedur dari Rentalskuy</p>
                        </div>
                    </div>
                </div>
                <div class="z-10 relative min-h-[15rem] mt-[-2rem] bg-white shadow-inner border-b-2 rounded-xl p-5 px-14">
                    <h1 class="mt-2 font-bold text-lg">Informasi Penting</h1>
                    <div class="mt-2 leading-8">
                        <h1 class="font-bold">Sebelum anda pesan Mobil</h1>
                        <ul class="ml-10 list-disc">
                            <li>Pastikan untuk membaca syarat Rentalskuy</li>
                        </ul>
                        <h1 class="font-bold">Setelah anda pesan mobil</h1>
                        <ul class="ml-10 list-disc">
                            <li>Rentalskuy akan menghubungi melalui WhatsApp untuk <br> Meminta foto beberapa dokumen wajib</li>
                        </ul>
                        <h1 class="font-bold">Mengambil foto</h1>
                        <ul class="ml-10 list-disc">
                            <li>Bawa KTP, SIM A, dan dokumen - dokumen lain yang dibutuhkan oleh Rentalskuy.</li>
                            <li>Saat Anda bertemu dengan staff rental, cek kondisi mobil dengan staff.</li>
                            <li>Setelah itu, baca dan tanda tangan perjanjian rental.</li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
    </main>

@endsection