<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />
    <style>
        /* Hide scrollbar for Chrome, Safari and Opera */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .no-scrollbar {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }

        .navLink.aktif{
            background-color: white;
            color: red;
        }
    </style>
</head>
<body>

    <p class="hidden">{{ $photo = session('photo') }}</p>
    <p class="hidden">{{ $id_admin = session('id_admin') }}</p>
    
    <div class="flex min-h-screen">
        <div class="w-96 min-h-screen">
            <div class="p-5 h-32">
                <img src="{{ asset('assets/img/rentalskuy.png') }}" class="h-full m-auto">
            </div>
            {{-- <div class="flex items-center p-5">
                <div class="bg-red-100 rounded-full w-12 h-12 overflow-hidden">
                    <img src="{{ asset("images/$photo") }}" class="w-full h-full">
                </div>
                <div class="ml-2">
                    <h1 class="font-medium text-lg">Kuda Terbang</h1>
                    <h1>Car Rental</h1>
                </div>
            </div> --}}
            <div class="p-5 pr-10">
                <a href="/admin" class="navLink{{ Request::is('admin') ? ' aktif' : '' }}">
                    <div class="flex justify-between hover:bg-gray-200 hover:-m-5 hover:-mr-10 hover:p-5 hover:pr-10">
                        <h1 class="font-medium text-lg text-[1rem]">Dashboard</h1>
                        <div class="flex items-center">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
                            <svg class="ml-2 w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" /></svg>                          
                        </div>
                    </div>
                </a>
                <a href="/admin/car-manager" class="navLink{{ Request::is('admin/car-manager') ? ' aktif' : '' }}">
                    <div class="mt-8 flex justify-between hover:bg-gray-200 hover:-m-5 hover:-mr-10 hover:p-5 hover:pr-10 hover:mt-3">
                        <h1 class="font-medium text-lg text-[1rem]">Manajemen Mobil</h1>
                        <div class="flex items-center">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>                         
                            <svg class="ml-2 w-7 h-7" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="m5 11l1.5-4.5h11L19 11m-1.5 5a1.5 1.5 0 0 1-1.5-1.5a1.5 1.5 0 0 1 1.5-1.5a1.5 1.5 0 0 1 1.5 1.5a1.5 1.5 0 0 1-1.5 1.5m-11 0A1.5 1.5 0 0 1 5 14.5A1.5 1.5 0 0 1 6.5 13A1.5 1.5 0 0 1 8 14.5A1.5 1.5 0 0 1 6.5 16M18.92 6c-.2-.58-.76-1-1.42-1h-11c-.66 0-1.22.42-1.42 1L3 12v8a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1h12v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-8l-2.08-6Z"/></svg>
                        </div>
                    </div>
                </a>
                <a href="/admin/car-booking" class="navLink{{ Request::is('admin/car-booking') ? ' aktif' : '' }}">
                    <div class="mt-8 flex justify-between hover:bg-gray-200 hover:-m-5 hover:-mr-10 hover:p-5 hover:pr-10 hover:mt-3">
                        <h1 class="font-medium text-lg text-[1rem]">Manajemen Booking</h1>
                        <div class="flex items-center">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
                            <svg class="ml-2 w-7 h-7" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 20 20"><path fill="currentColor" d="M6 6V4.5c0-.344.065-.667.195-.969c.13-.307.31-.573.539-.797c.224-.229.49-.409.797-.539c.302-.13.625-.195.969-.195c.281 0 .549.044.805.133c.256.089.49.214.703.375A2.442 2.442 0 0 1 11.5 2a2.484 2.484 0 0 1 2.305 1.531c.13.302.195.625.195.969V6h1a1 1 0 0 1 1 1v2.591A2.508 2.508 0 0 0 14.383 9H12V6h1V4.5c0-.208-.039-.404-.117-.586A1.482 1.482 0 0 0 11.5 3c-.307 0-.583.086-.828.258A2.503 2.503 0 0 1 11 4.5v4.552a2.512 2.512 0 0 0-2 2.46v2.879c0 .657.258 1.289.718 1.758L11.53 18H7a3 3 0 0 1-2.117-.875a3.061 3.061 0 0 1-.648-.953A2.932 2.932 0 0 1 4 15V7a1 1 0 0 1 1-1h1Zm4 0V4.5c0-.208-.039-.404-.117-.586A1.482 1.482 0 0 0 8.5 3c-.208 0-.404.039-.586.117A1.482 1.482 0 0 0 7 4.5V6h3Zm.432 9.45A1.513 1.513 0 0 1 10 14.39v-2.878A1.51 1.51 0 0 1 11.51 10h2.873c.403 0 .789.161 1.072.447l3.107 3.14a1.513 1.513 0 0 1-.025 2.154l-2.947 2.837a1.508 1.508 0 0 1-2.124-.031l-3.034-3.098ZM12 12.75a.75.75 0 1 0 1.5 0a.75.75 0 0 0-1.5 0Z"/></svg>
                        </div>
                    </div>
                </a>
                <a href="/admin/brand-manager" class="navLink{{ Request::is('admin/brand-manager') ? ' aktif' : '' }}">
                    <div class="mt-8 flex justify-between hover:bg-gray-200 hover:-m-5 hover:-mr-10 hover:p-5 hover:pr-10 hover:mt-3">
                        <h1 class="font-medium text-lg text-[1rem]">Manajemen Brand</h1>
                        <div class="flex items-center">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
                            <svg class="ml-2 w-7 h-7" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M10.968 2.325a1.75 1.75 0 0 1 2.064 0l7.421 5.416c.977.712.474 2.257-.734 2.26H4.28c-1.208-.003-1.71-1.548-.734-2.26l7.421-5.416ZM13 6.25a1 1 0 1 0-2 0a1 1 0 0 0 2 0ZM11.25 16h-2v-5h2v5Zm3.5 0h-2v-5h2v5Zm3.75 0h-2.25v-5h2.25v5Zm.25 1H5.25A2.25 2.25 0 0 0 3 19.25v.5c0 .415.336.75.75.75h16.5a.75.75 0 0 0 .75-.75v-.5A2.25 2.25 0 0 0 18.75 17Zm-11-1H5.5v-5h2.25v5Z"/></svg>
                        </div>
                    </div>
                </a>
                <a href="/admin/admin-manager" class="navLink{{ Request::is('admin/admin-manager') ? ' aktif' : '' }}">
                    <div class="mt-8 flex justify-between hover:bg-gray-200 hover:-m-5 hover:-mr-10 hover:p-5 hover:pr-10 hover:mt-3">
                        <h1 class="font-medium text-lg text-[1rem]">Manajemen Admin</h1>
                        <div class="flex items-center">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
                            <svg class="ml-2 w-7 h-7" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 2a2 2 0 0 0-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2m0 7c2.67 0 8 1.33 8 4v3H4v-3c0-2.67 5.33-4 8-4m0 1.9c-2.97 0-6.1 1.46-6.1 2.1v1.1h12.2V17c0-.64-3.13-2.1-6.1-2.1Z"/></svg>
                        </div>
                    </div>
                </a>
                <a href="/admin/user-manager" class="navLink{{ Request::is('admin/user-manager') ? ' aktif' : '' }}">
                    <div class="mt-8 flex justify-between hover:bg-gray-200 hover:-m-5 hover:-mr-10 hover:p-5 hover:pr-10 hover:mt-3">
                        <h1 class="font-medium text-lg text-[1rem]">Manajemen User</h1>
                        <div class="flex items-center">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
                            <svg class="ml-2 w-7 h-7" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 2a2 2 0 0 0-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2m0 7c2.67 0 8 1.33 8 4v3H4v-3c0-2.67 5.33-4 8-4m0 1.9c-2.97 0-6.1 1.46-6.1 2.1v1.1h12.2V17c0-.64-3.13-2.1-6.1-2.1Z"/></svg>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="w-full min-h-screen">
            <nav class="flex border-2 w-full h-fit">
                <div class="w-1/2 p-5">
                    <div class="flex items-center">
                        {{-- <div>
                            <svg class="w-12 h-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" /></svg>                      
                        </div>
                        <form action="" method="GET" class="ml-8 flex items-center w-full">
                            <div class="p-2">
                                <button type="submit"><svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" /></svg></button>
                            </div>
                            <div class="p-2 w-full">
                                <input type="text" name="search" placeholder="Search Project" class="border-2 border-black h-8 rounded-full pl-4 w-full">
                            </div>
                        </form> --}}
                    </div>
                </div>
                <div class="w-1/2 py-5 px-20 flex items-center justify-between">
                    <div>
                        <form action="/admin/admin-manager/edit" method="GET">
                            @csrf
                            <input type="hidden" name="id_admin" value="{{ $id_admin }}">
                            <button type="submit">
                                <div class="flex items-center">
                                    <div class="bg-red-100 rounded-full w-12 h-12 overflow-hidden">
                                        <img src='{{ asset("images/$photo") }}' class="w-full h-full">
                                    </div>
                                    <div class="ml-4 font-bold text-lg">
                                        <h1>{{ session('nama_admin') }}</h1>
                                    </div>
                                </div>
                            </button>
                        </form>
                    </div>
                    <div>
                        <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" /></svg>                      
                    </div>
                    <div>
                        <a href="/logout">
                            <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1012.728 0M12 3v9" /></svg>                      
                        </a>
                    </div>
                </div>
            </nav>

            <div>
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>

</body>
</html>