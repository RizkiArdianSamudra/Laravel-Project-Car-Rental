@extends('rentalskuy/admin/layouts/master')

@section('title', 'admin/dashboard')

@section('content')

    <div class="bg-gray-100 w-full min-h-[87vh] px-16 py-8">
        <div class="grid grid-cols-4 gap-8">
            <div class="relative overflow-hidden bg-blue-400 px-10 py-5 h-36 rounded-2xl shadow-md"> 
                <h1 class="font-medium text-lg text-white">Admin Terdaftar</h1>
                <h1 class="mt-2 font-bold text-3xl text-white">{{ $tbl_admin }}</h1>
                <div class="absolute right-[-6rem] top-[-2rem] bg-white/20 w-36 h-36 rounded-full"></div>
                <div class="absolute right-[-2rem] top-[5rem] bg-white/20 w-36 h-36 rounded-full"></div>
                <div></div>
            </div>
            <div class="relative overflow-hidden bg-green-400 px-10 py-5 h-36 rounded-2xl shadow-md"> 
                <h1 class="font-medium text-lg text-white">User Terdaftar</h1>
                <h1 class="mt-2 font-bold text-3xl text-white">{{ $tbl_user }}</h1>
                <div class="absolute right-[-6rem] top-[-2rem] bg-white/20 w-36 h-36 rounded-full"></div>
                <div class="absolute right-[-2rem] top-[5rem] bg-white/20 w-36 h-36 rounded-full"></div>
                <div></div>
            </div>
            <div class="relative overflow-hidden bg-blue-400 px-10 py-5 h-36 rounded-2xl shadow-md"> 
                <h1 class="font-medium text-lg text-white">Mobil Terdaftar</h1>
                <h1 class="mt-2 font-bold text-3xl text-white">{{ $tbl_mobil }}</h1>
                <div class="absolute right-[-6rem] top-[-2rem] bg-white/20 w-36 h-36 rounded-full"></div>
                <div class="absolute right-[-2rem] top-[5rem] bg-white/20 w-36 h-36 rounded-full"></div>
                <div></div>
            </div>
            <div class="relative overflow-hidden bg-green-400 px-10 py-5 h-36 rounded-2xl shadow-md"> 
                <h1 class="font-medium text-lg text-white">Total Booking</h1>
                <h1 class="mt-2 font-bold text-3xl text-white">{{ $tbl_booking }}</h1>
                <div class="absolute right-[-6rem] top-[-2rem] bg-white/20 w-36 h-36 rounded-full"></div>
                <div class="absolute right-[-2rem] top-[5rem] bg-white/20 w-36 h-36 rounded-full"></div>
                <div></div>
            </div>
        </div>
    </div>

@endsection