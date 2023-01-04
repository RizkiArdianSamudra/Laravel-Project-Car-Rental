@extends('rentalskuy/admin/layouts/master')

@section('title', 'admin/dashboard')

@section('content')

    <div class="bg-gray-100 w-full min-h-[87vh] px-16 py-8">
        <div class="bg-white min-h-[78vh]">
            <h1 class="p-5 border-b-2 font-medium text-xl">Manajemen Mobil</h1>
            <div class="mt-4 px-5 flex items-center justify-between">
                <div class="flex items-center">
                    <a href="/admin/car-manager/tambah">
                        <button class="border-2 border-black px-2 py-[0.2rem] rounded-full bg-blue-600 text-white font-medium">Tambah</button>
                    </a>
                </div>
                <div>
                    <form action="/admin/car-manager/search" method="GET">
                        @csrf
                        <label>Search: </label>
                        <input type="text" name="searchManagerCars" class="pl-2 h-8 w-60 border-2 border-black" placeholder="cari...">
                        <button type="submit" name="searchManager"></button>
                    </form>
                </div>
            </div>
            <div class="mt-5 px-5 flex items-center">
                <h1 class="w-1/3 px-2 py-[0.6rem] border-b-[0.1rem] border-black/20 font-medium text-center">No</h1>
                <h1 class="w-full px-2 py-[0.6rem] border-b-[0.1rem] border-black/20 font-medium text-center">Nama Mobil</h1>
                <h1 class="w-full px-2 py-[0.6rem] border-b-[0.1rem] border-black/20 font-medium text-center">Brand</h1>
                <h1 class="w-full px-2 py-[0.6rem] border-b-[0.1rem] border-black/20 font-medium text-center">Harga Sewa</h1>
                <h1 class="w-full px-2 py-[0.6rem] border-b-[0.1rem] border-black/20 font-medium text-center">Tahun Model</h1>
                <h1 class="w-full px-2 py-[0.6rem] border-b-[0.1rem] border-black/20 font-medium text-center">Kapasitas Kursi</h1>
                <h1 class="w-full px-2 py-[0.6rem] border-b-[0.1rem] border-black/20 font-medium text-center">Action</h1>
            </div>
            @foreach ($tbl_mobil as $mobil)
                <div class="px-5 flex items-center">
                    <div class="w-1/3 px-2 py-[0.4rem] border-b-[0.1rem] border-black/20 text-center overflow-x-auto no-scrollbar">{{ $loop->iteration }}</div>
                    <div class="w-full px-2 py-[0.4rem] border-b-[0.1rem] border-black/20 text-center overflow-x-auto no-scrollbar">{{ $mobil->nama_mobil }}</div>
                    <div class="w-full px-2 py-[0.4rem] border-b-[0.1rem] border-black/20 text-center overflow-x-auto no-scrollbar">{{ $mobil->nama_brand }}</div>
                    <div class="w-full px-2 py-[0.4rem] border-b-[0.1rem] border-black/20 text-center overflow-x-auto no-scrollbar">{{ $mobil->harga_sewa_hari }}K</div>
                    <div class="w-full px-2 py-[0.4rem] border-b-[0.1rem] border-black/20 text-center overflow-x-auto no-scrollbar">{{ $mobil->tahun_model }}</div>
                    <div class="w-full px-2 py-[0.4rem] border-b-[0.1rem] border-black/20 text-center overflow-x-auto no-scrollbar">{{ $mobil->kapasitas_kursi }}</div>
                    <div class="gap-2 flex justify-center items-center w-full px-2 py-[0.4rem] border-b-[0.1rem] border-black/20 text-center overflow-x-auto no-scrollbar">
                        <form action="/admin/car-manager/edit" method="GET">
                            @csrf
                            <input type="hidden" name="id_mobil" value="{{ $mobil->id_mobil }}">
                            <button type="submit" class="bg-green-600 rounded-full px-2 text-white font-medium">Edit</button>
                        </form>
                        <form action="/admin/car-manager/delete" method="POST">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="id_mobil" value="{{ $mobil->id_mobil }}">
                            <button type="submit" class="bg-red-600 rounded-full px-2 text-white font-medium" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection