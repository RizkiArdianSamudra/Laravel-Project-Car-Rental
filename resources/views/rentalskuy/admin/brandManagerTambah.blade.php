@extends('rentalskuy/admin/layouts/master')

@section('title', 'admin/dashboard')

@section('content')

    <div class="bg-gray-100 w-full min-h-[87vh] px-16 py-8">
        <div class="bg-white p-5 min-h-[78vh]">
            <h1 class="pb-2 font-medium text-xl border-b-2 border-black">Register Brand</h1>
            <div>
                <form action="/admin/brand-manager/action" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <div class="mt-8 w-1/2 m-auto">
                            <p>Nama Brand</p>
                            <input type="text" name="nama_brand" class="w-full p-2 outline-none border-2 border-black">
                        </div>
                        <div class="mt-8 w-1/2 m-auto">
                            <p>Logo</p>
                            <input type="file" name="logo_brand" class="w-full p-[0.33rem] outline-none border-2 border-black pl-36">
                        </div>
                        <div class="mt-12 w-1/2 m-auto">
                            <button type="submit" name="submit" class="w-full p-2 outline-none border-2 border-black font-bold">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection