@extends('rentalskuy/layouts/master')

@section('content')

    <script src="https://cdn.tailwindcss.com"></script>
    <main class="l-main">

        <!--========== DECORATION ==========-->
        <div class="pt-[4.5rem] px-20 min-h-[80vh]">
            <form action="/car-pesan" method="POST">
            @csrf
            @foreach ($tbl_mobil as $mobil)                
            <input type="hidden" name="id_user" value="{{ session('id_user') }}">
            <input type="hidden" name="id_mobil" value="{{ $mobil->id_mobil }}">
            <input type="hidden" name="harga_sewa_hari" value="{{ $mobil->harga_sewa_hari * 1000 }}">
            
            <h1 class="pt-4 pb-8 text-center font-semibold text-3xl">{{ $mobil->nama_kategori }}</h1>
            <div>
                <div class="relative min-h-[15rem] bg-white shadow-inner border-b-2 rounded-xl px-20 pb-20 pt-10">
                    <div class="flex justify-between">
                        <div class="w-2/3">
                            <div class="mr-20">
                                <h1 class="font-bold text-xl text-center capitalize">{{ $mobil->nama_mobil }}</h1>
                                <img src='{{ asset("images/$mobil->gambar") }}' class="w-80 m-auto">
                            </div>
                            <div>
                                {{-- <h1 class="flex items-center text-xl font-semibold">Durasi Rental</h1> --}}
                            </div>
                        </div>
                        <div class="w-1/3">
                            <div>
                                <div class="flex items-center text-xl font-semibold gap-2">
                                    <svg class="w-5" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path fill="currentColor" d="M5.673 0a.7.7 0 0 1 .7.7v1.309h7.517v-1.3a.7.7 0 0 1 1.4 0v1.3H18a2 2 0 0 1 2 1.999v13.993A2 2 0 0 1 18 20H2a2 2 0 0 1-2-1.999V4.008a2 2 0 0 1 2-1.999h2.973V.699a.7.7 0 0 1 .7-.699ZM1.4 7.742v10.259a.6.6 0 0 0 .6.6h16a.6.6 0 0 0 .6-.6V7.756L1.4 7.742Zm5.267 6.877v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15Zm-8.333-3.977v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15ZM4.973 3.408H2a.6.6 0 0 0-.6.6v2.335l17.2.014V4.008a.6.6 0 0 0-.6-.6h-2.71v.929a.7.7 0 0 1-1.4 0v-.929H6.373v.92a.7.7 0 0 1-1.4 0v-.92Z"/></svg>
                                    <h1>Tanggal Peminjaman</h1>
                                </div>
                                <div class="mt-5 pt-[12px] relative w-full h-full">
                                    <h1 class="px-1 ml-5 top-[0] absolute font-semibold bg-white w-fit">Dari <span class="text-red-600">*</span></h1>
                                    <input type="date" name="from_date" class="w-full p-2 outline-none border-2 border-black rounded-xl" value="{{ Session::get('from_date') }}">
                                    @error('from_date')
                                        <p class="text-red-800">* {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-8">
                                <div class="flex items-center text-xl font-semibold gap-2">
                                    <svg class="w-5" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path fill="currentColor" d="M5.673 0a.7.7 0 0 1 .7.7v1.309h7.517v-1.3a.7.7 0 0 1 1.4 0v1.3H18a2 2 0 0 1 2 1.999v13.993A2 2 0 0 1 18 20H2a2 2 0 0 1-2-1.999V4.008a2 2 0 0 1 2-1.999h2.973V.699a.7.7 0 0 1 .7-.699ZM1.4 7.742v10.259a.6.6 0 0 0 .6.6h16a.6.6 0 0 0 .6-.6V7.756L1.4 7.742Zm5.267 6.877v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15Zm-8.333-3.977v1.666H5v-1.666h1.667Zm4.166 0v1.666H9.167v-1.666h1.666Zm4.167 0v1.666h-1.667v-1.666H15ZM4.973 3.408H2a.6.6 0 0 0-.6.6v2.335l17.2.014V4.008a.6.6 0 0 0-.6-.6h-2.71v.929a.7.7 0 0 1-1.4 0v-.929H6.373v.92a.7.7 0 0 1-1.4 0v-.92Z"/></svg>
                                    <h1>Tanggal Pengembalian</h1>
                                </div>
                                <div class="mt-5 pt-[12px] relative w-full h-full">
                                    <h1 class="px-1 ml-5 top-[0] absolute font-semibold bg-white w-fit">Sampai <span class="text-red-600">*</span></h1>
                                    <input type="date" name="to_date" class="w-full p-2 outline-none border-2 border-black rounded-xl" value="{{ Session::get('to_date') }}">
                                    @error('to_date')
                                        <p class="text-red-800">* {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-8">
                                <div class="flex items-center text-xl font-semibold gap-2">
                                    <svg class="w-5" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M19.95 21q-3.225 0-6.287-1.438q-3.063-1.437-5.425-3.8q-2.363-2.362-3.8-5.425Q3 7.275 3 4.05q0-.45.3-.75t.75-.3H8.1q.35 0 .625.225t.325.575l.65 3.5q.05.35-.012.637q-.063.288-.288.513L7 10.9q1.05 1.8 2.625 3.375T13.1 17l2.35-2.35q.225-.225.588-.338q.362-.112.712-.062l3.45.7q.35.075.575.337q.225.263.225.613v4.05q0 .45-.3.75t-.75.3Z"/></svg>
                                    <h1>Nomer Telepon</h1>
                                </div>
                                <div class="mt-5 pt-[12px] relative w-full h-full">
                                    <h1 class="px-1 ml-5 top-[0] absolute font-semibold bg-white w-fit">Telepon <span class="text-red-600">*</span></h1>
                                    <input type="tel" name="telepon" placeholder="08*****" pattern="[0-9]{10,13}" class="w-full p-2 outline-none border-2 border-black rounded-xl" value="{{ Session::get('telepon') }}">
                                    @error('telepon')
                                        <p class="text-red-800">* {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-8">
                                <div class="flex items-center text-xl font-semibold gap-2">
                                    <svg class="w-5" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M19 9.3V4h-3v2.6L12 3L2 12h3v8h5v-6h4v6h5v-8h3l-3-2.7zm-9 .7c0-1.1.9-2 2-2s2 .9 2 2h-4z"/></svg>
                                    <h1>Tempat Tinggal</h1>
                                </div>
                                <div class="mt-5 pt-[12px] relative w-full h-full">
                                    <h1 class="px-1 ml-5 top-[0] absolute font-semibold bg-white w-fit">Alamat <span class="text-red-600">*</span></h1>
                                    <input type="text" name="alamat" placeholder="masukkan alamat" class="w-full p-2 outline-none border-2 border-black rounded-xl" value="{{ Session::get('alamat') }}">
                                    @error('alamat')
                                        <p class="text-red-800">* {{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="z-10 relative mt-[-2rem] bg-white shadow-inner border-b-2 rounded-xl p-5 px-20">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-10">
                            <div>
                                <h1 class="font-bold">Harga Per Hari</h1>
                                <h1 class="mt-2 font-medium">Anda Bayar</h1>
                            </div>
                            <h1 class="text-red-600 font-semibold">Rp. {{ $mobil->harga_sewa_hari * 1000 }}</h1>
                            <h1 class="font-medium">Termasuk Pajak dan Semua Biaya</h1>
                        </div>
                        <div>
                            <button class="mt-2 py-2 px-4 bg-red-600 rounded-full text-white font-semibold" type="submit">Pesan Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            </form>
        </div>
        
    </main>

@endsection