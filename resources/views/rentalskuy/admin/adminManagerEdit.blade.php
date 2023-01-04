@extends('rentalskuy/admin/layouts/master')

@section('title', 'admin/dashboard')

@section('content')

    <div class="bg-gray-100 w-full min-h-[87vh] px-16 py-8">
        <div class="bg-white p-5 min-h-[78vh]">
            <h1 class="pb-2 font-medium text-xl border-b-2 border-black">Register Admin</h1>
            <div>
                <form action="/admin/admin-manager/update" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mt-5 grid grid-cols-2 gap-x-14 gap-y-5">
                        <input type="hidden" name="id_admin" value="{{ $tbl_admin->id_admin }}">
                        <div>
                            <p>Nama</p>
                            <input type="text" name="nama_admin" class="w-full p-2 outline-none border-2 border-black" value="{{ $tbl_admin->nama_admin }}">
                        </div>
                        <div>
                            <p>Email</p>
                            <input type="email" name="email" class="w-full p-2 outline-none border-2 border-black" value="{{ $tbl_admin->email }}">
                        </div>
                        <div>
                            <p>Password</p>
                            <input type="password" name="password" class="w-full p-2 outline-none border-2 border-black" placeholder="******">
                        </div>
                        <div>
                            <p>Nomer Telepon</p>
                            <input type="tel" name="mobile_number" pattern="[0-9]{10,13}" class="w-full p-2 outline-none border-2 border-black" value="{{ $tbl_admin->mobile_number }}">
                        </div>
                    </div>
                    <div class="mt-5 m-auto w-fit flex items-center gap-5">
                        <div class="h-28">
                            <img src='{{ asset("images/$tbl_admin->photo") }}' class="h-full">
                        </div>
                        <div>
                            <p class="text-center">Photo</p>
                            <input type="file" name="photo" class="w-full px-3 p-[0.33rem] outline-none border-2 border-black">
                            <input type="hidden" name="photo_lama" value="{{ $tbl_admin->photo }}">
                        </div>
                    </div>
                    <div class="mt-10">
                        <button type="submit" name="submit" class="w-full p-2 outline-none border-2 border-black font-bold">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection