@extends('rentalskuy/admin/layouts/master')

@section('title', 'admin/dashboard')

@section('content')

    <div class="bg-gray-100 w-full min-h-[87vh] px-16 py-8">
        <div class="bg-white min-h-[78vh]">
            <h1 class="p-5 border-b-2 font-medium text-xl">Manajemen Booking</h1>
            <div class="mt-4 px-5 flex items-center justify-between">
                <div class="flex items-center">
                    <h1>Show</h1>
                    <h1 class="ml-2">Entries</h1>
                </div>
                <div>
                    <form action="/admin/car-booking/search" method="GET">
                        @csrf
                        <label>Search: </label>
                        <input type="text" name="searchManagerBooking" class="pl-2 h-8 w-60 border-2 border-black" placeholder="cari...">
                        <button type="submit" name="searchManager"></button>
                    </form>
                </div>
            </div>
            <div class="mt-5 px-5 flex items-center">
                <h1 class="w-1/3 px-2 py-[0.4rem] border-2 border-black font-medium text-center">No</h1>
                <h1 class="w-full px-2 py-[0.4rem] border-2 border-l-0 border-black font-medium text-center">Nama</h1>
                <h1 class="w-full px-2 py-[0.4rem] border-2 border-l-0 border-black font-medium text-center">ID Booking</h1>
                <h1 class="w-full px-2 py-[0.4rem] border-2 border-l-0 border-black font-medium text-center">Mobil</h1>
                <h1 class="w-full px-2 py-[0.4rem] border-2 border-l-0 border-black font-medium text-center">From Date</h1>
                <h1 class="w-full px-2 py-[0.4rem] border-2 border-l-0 border-black font-medium text-center">To Date</h1>
                <h1 class="w-full px-2 py-[0.4rem] border-2 border-l-0 border-black font-medium text-center">Status</h1>
                <h1 class="w-full px-2 py-[0.4rem] border-2 border-l-0 border-black font-medium text-center">Action</h1>
            </div>
            @foreach ($tbl_booking as $booking)
                <div class="px-5 flex items-center">
                    <div class="w-1/3 px-2 py-[0.4rem] border-2 border-t-0 border-black text-center overflow-x-auto no-scrollbar capitalize">{{ $loop->iteration }}</div>
                    <div class="w-full px-2 py-[0.4rem] border-2 border-t-0 border-l-0 border-black text-center overflow-x-auto no-scrollbar capitalize">{{ $booking->nama_user }}</div>
                    <div class="w-full px-2 py-[0.4rem] border-2 border-t-0 border-l-0 border-black text-center overflow-x-auto no-scrollbar capitalize">{{ $booking->id_booking }}</div>
                    <div class="w-full px-2 py-[0.4rem] border-2 border-t-0 border-l-0 border-black text-center overflow-x-auto no-scrollbar capitalize">{{ $booking->nama_mobil }}</div>
                    <div class="w-full px-2 py-[0.4rem] border-2 border-t-0 border-l-0 border-black text-center overflow-x-auto no-scrollbar capitalize">{{ $booking->from_date }}</div>
                    <div class="w-full px-2 py-[0.4rem] border-2 border-t-0 border-l-0 border-black text-center overflow-x-auto no-scrollbar capitalize">{{ $booking->to_date }}</div>
                    <div class="w-full px-2 py-[0.4rem] border-2 border-t-0 border-l-0 border-black text-center overflow-x-auto no-scrollbar capitalize whitespace-nowrap">{{ $booking->status }}</div>
                    <div class="flex justify-center items-center w-full px-2 py-[0.4rem] border-2 border-t-0 border-l-0 border-black text-center overflow-x-auto no-scrollbar">
                        <button type="button" class="bg-blue-600 px-2 rounded-full text-white font-medium" data-modal-toggle="popup-modal{{ $booking->id_booking }}">Konfirmasi?</button>
                        <div id="popup-modal{{ $booking->id_booking }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                            <div class="relative w-full h-full max-w-md md:h-auto">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal{{ $booking->id_booking }}">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    <div class="p-6 text-center">
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah anda ingin mengkonfirmasi</h3>
                                        <div class="flex items-center justify-center">
                                            <form action="/admin/car-booking/iya" method="POST">
                                                @csrf
                                                <input type="hidden" name="id_booking" value="{{ $booking->id_booking }}">
                                                <input type="hidden" name="status" value="dikonfirmasi">
                                                <button data-modal-toggle="popup-modal{{ $booking->id_booking }}" type="submit" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">Iya</button>
                                            </form>
                                            <form action="/admin/car-booking/tidak" method="POST">
                                                @csrf
                                                <input type="hidden" name="id_booking" value="{{ $booking->id_booking }}">
                                                <input type="hidden" name="status" value="ditolak">
                                                <button data-modal-toggle="popup-modal{{ $booking->id_booking }}" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">Tidak</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection