@extends('rentalskuy/admin/layouts/master')

@section('title', 'admin/dashboard')

@section('content')

    <div class="bg-gray-100 w-full min-h-[87vh] px-16 py-8">
        <div class="bg-white min-h-[78vh] pb-10">
            <h1 class="p-5 border-b-2 font-medium text-xl">Manajemen Brand</h1>
            <div class="mt-4 px-5 flex items-center justify-between">
                <div class="flex items-center">
                    <a href="/admin/brand-manager/tambah">
                        <button class="border-2 border-black px-2 py-[0.2rem] rounded-full bg-blue-600 text-white font-medium">Tambah</button>
                    </a>
                </div>
                <div>
                    <form action="/admin/brand-manager/search" method="GET">
                        @csrf
                        <label>Search: </label>
                        <input type="text" name="searchManagerBrand" class="pl-2 h-8 w-60 border-2 border-black" placeholder="cari...">
                        <button type="submit" name="searchManager"></button>
                    </form>
                </div>
            </div>
            <div class="mt-5 px-5 flex items-center">
                <h1 class="w-1/3 px-2 py-[0.4rem] border-2 border-black font-medium text-center">No</h1>
                <h1 class="w-full px-2 py-[0.4rem] border-2 border-l-0 border-black font-medium text-center">Logo Brand</h1>
                <h1 class="w-full px-2 py-[0.4rem] border-2 border-l-0 border-black font-medium text-center">Nama Brand</h1>
                <h1 class="w-full px-2 py-[0.4rem] border-2 border-l-0 border-black font-medium text-center">Action</h1>
            </div>
            @foreach ($tbl_brand as $brand)
                <div class="px-5 flex items-center">
                    <div class="w-1/3 h-20 px-2 py-[0.4rem] border-2 border-t-0 border-black text-center overflow-x-auto no-scrollbar capitalize">{{ $loop->iteration }}</div>
                    <div class="w-full h-20 px-2 py-[0.4rem] border-2 border-t-0 border-l-0 border-black text-center overflow-x-auto no-scrollbar capitalize"><img src='{{ asset("images/$brand->logo_brand") }}' class="m-auto h-full"></div>
                    <div class="w-full h-20 px-2 py-[0.4rem] border-2 border-t-0 border-l-0 border-black text-center overflow-x-auto no-scrollbar capitalize">{{ $brand->nama_brand }}</div>
                    <div class="gap-2 flex justify-center items-center w-full h-20 px-2 py-[0.4rem] border-2 border-t-0 border-l-0 border-black text-center overflow-x-auto no-scrollbar">
                        <form action="/admin/brand-manager/edit" method="GET">
                            @csrf
                            <input type="hidden" name="id_brand" value="{{ $brand->id_brand }}">
                            <button type="submit" class="bg-green-600 rounded-full px-4 py-2 text-white font-medium">Edit</button>
                        </form>
                        <form action="/admin/brand-manager/delete" method="POST">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="id_brand" value="{{ $brand->id_brand }}">
                            <button type="submit" class="bg-red-600 rounded-full px-4 py-2 text-white font-medium" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection