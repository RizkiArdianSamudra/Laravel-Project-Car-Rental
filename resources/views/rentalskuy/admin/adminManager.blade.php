@extends('rentalskuy/admin/layouts/master')

@section('title', 'admin/dashboard')

@section('content')

    <div class="bg-gray-100 w-full min-h-[87vh] px-16 py-8">
        <div class="bg-white min-h-[78vh]">
            <h1 class="p-5 border-b-2 font-medium text-xl">Manajemen Admin</h1>
            <div class="mt-4 px-5 flex items-center justify-between">
                <div class="flex items-center">
                    <a href="/admin/admin-manager/tambah">
                        <button class="border-2 border-black px-2 py-[0.2rem] rounded-full bg-blue-600 text-white font-medium">Tambah</button>
                    </a>
                </div>
                <div>
                    <form action="/admin/admin-manager/search" method="GET">
                        @csrf
                        <label>Search: </label>
                        <input type="text" name="searchManagerAdmin" class="pl-2 h-8 w-60 border-2 border-black" placeholder="cari...">
                        <button type="submit" name="searchManager"></button>
                    </form>
                </div>
            </div>
            <div class="mt-5 px-5 flex items-center">
                <h1 class="w-1/3 px-2 py-[0.4rem] border-2 border-black font-medium text-center">No</h1>
                <h1 class="w-full px-2 py-[0.4rem] border-2 border-l-0 border-black font-medium text-center">Nama</h1>
                <h1 class="w-full px-2 py-[0.4rem] border-2 border-l-0 border-black font-medium text-center">Status</h1>
                <h1 class="w-full px-2 py-[0.4rem] border-2 border-l-0 border-black font-medium text-center">Email</h1>
                <h1 class="w-full px-2 py-[0.4rem] border-2 border-l-0 border-black font-medium text-center">Nomer HP</h1>
                <h1 class="w-full px-2 py-[0.4rem] border-2 border-l-0 border-black font-medium text-center">Action</h1>
            </div>
            @foreach ($tbl_admin as $admin)
                <div class="px-5 flex items-center">
                    <div class="w-1/3 px-2 py-[0.4rem] border-2 border-t-0 border-black text-center overflow-x-auto no-scrollbar capitalize">{{ $loop->iteration }}</div>
                    <div class="w-full px-2 py-[0.4rem] border-2 border-t-0 border-l-0 border-black text-center overflow-x-auto no-scrollbar capitalize">{{ $admin->nama_admin }}</div>
                    <div class="w-full px-2 py-[0.4rem] border-2 border-t-0 border-l-0 border-black text-center overflow-x-auto no-scrollbar capitalize">{{ $admin->status }}</div>
                    <div class="w-full px-2 py-[0.4rem] border-2 border-t-0 border-l-0 border-black text-center overflow-x-auto no-scrollbar">{{ $admin->email }}</div>
                    <div class="w-full px-2 py-[0.4rem] border-2 border-t-0 border-l-0 border-black text-center overflow-x-auto no-scrollbar capitalize">{{ $admin->mobile_number }}</div>
                    <div class="gap-2 flex justify-center items-center w-full px-2 py-[0.4rem] border-2 border-t-0 border-l-0 border-black text-center overflow-x-auto no-scrollbar">
                        <form action="/admin/admin-manager/edit" method="GET">
                            @csrf
                            <input type="hidden" name="id_admin" value="{{ $admin->id_admin }}">
                            <button type="submit" class="bg-green-600 rounded-full px-2 text-white font-medium">Edit</button>
                        </form>
                        <form action="/admin/admin-manager/delete" method="POST">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="id_admin" value="{{ $admin->id_admin }}">
                            <button type="submit" class="bg-red-600 rounded-full px-2 text-white font-medium" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection