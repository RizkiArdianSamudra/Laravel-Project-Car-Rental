@extends('rentalskuy/admin/layouts/master')

@section('title', 'admin/dashboard')

@section('content')

    <div class="bg-gray-100 w-full min-h-[87vh] px-16 py-8">
        <div class="bg-white min-h-[78vh]">
            <h1 class="p-5 border-b-2 font-medium text-xl">Manajemen User</h1>
            <div class="mt-4 px-5 flex items-center justify-between">
                <div class="flex items-center">
                    <h1>Show</h1>
                    <h1 class="ml-2">Entries</h1>
                </div>
                <div>
                    <form action="/admin/user-manager/search" method="GET">
                        @csrf
                        <label>Search: </label>
                        <input type="text" name="searchManagerUser" class="pl-2 h-8 w-60 border-2 border-black" placeholder="cari...">
                        <button type="submit" name="searchManager"></button>
                    </form>
                </div>
            </div>
            <div class="mt-5 px-5 flex items-center">
                <h1 class="w-1/3 px-2 py-[0.4rem] border-2 border-black font-medium text-center">No</h1>
                <h1 class="w-full px-2 py-[0.4rem] border-2 border-l-0 border-black font-medium text-center">Nama</h1>
                <h1 class="w-full px-2 py-[0.4rem] border-2 border-l-0 border-black font-medium text-center">Email</h1>
                <h1 class="w-full px-2 py-[0.4rem] border-2 border-l-0 border-black font-medium text-center">Tgl Lahir</h1>
                <h1 class="w-full px-2 py-[0.4rem] border-2 border-l-0 border-black font-medium text-center">Action</h1>
            </div>
            @foreach ($tbl_user as $user)
                <div class="px-5 flex items-center">
                    <div class="w-1/3 px-2 py-[0.4rem] border-2 border-t-0 border-black text-center overflow-x-auto no-scrollbar capitalize">{{ $loop->iteration }}</div>
                    <div class="w-full px-2 py-[0.4rem] border-2 border-t-0 border-l-0 border-black text-center overflow-x-auto no-scrollbar capitalize">{{ $user->nama_user }}</div>
                    <div class="w-full px-2 py-[0.4rem] border-2 border-t-0 border-l-0 border-black text-center overflow-x-auto no-scrollbar">{{ $user->email }}</div>
                    <div class="w-full px-2 py-[0.4rem] border-2 border-t-0 border-l-0 border-black text-center overflow-x-auto no-scrollbar capitalize">{{ $user->tgl_lahir }}</div>
                    <div class="flex justify-center items-center w-full px-2 py-[0.4rem] border-2 border-t-0 border-l-0 border-black text-center overflow-x-auto no-scrollbar">
                        <form action="/admin/user-manager/delete" method="POST">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="id_user" value="{{ $user->id_user }}">
                            <button type="submit" class="bg-red-600 rounded-full px-2 text-white font-medium" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection