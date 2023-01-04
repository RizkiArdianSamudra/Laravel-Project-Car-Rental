@extends('rentalskuy/admin/layouts/master')

@section('title', 'admin/dashboard')

@section('content')

    <div class="bg-gray-100 w-full min-h-[87vh] px-16 py-8">
        <div class="bg-white p-5 min-h-[78vh]">
            <h1 class="pb-2 font-medium text-xl border-b-2 border-black">Register Car</h1>
            <div>
                <form action="/admin/car-manager/update" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="hidden" name="id_mobil" value="{{ $tbl_mobil->id_mobil }}">
                    <div class="mt-5 grid grid-cols-2 gap-x-14 gap-y-5">
                        <div>
                            <p>Nama Mobil</p>
                            <input type="text" name="nama_mobil" class="w-full p-2 outline-none border-2 border-black" value="{{ $tbl_mobil->nama_mobil }}">
                        </div>
                        <div>
                            <p>Gambar</p>
                            <input type="file" name="gambar" class="w-full p-[0.33rem] outline-none border-2 border-black">
                            <input type="hidden" name="gambar_lama" value="{{ $tbl_mobil->gambar }}">
                        </div>
                        <div>
                            <p>Harga Sewa Per Hari</p>
                            <div class="flex items-center">
                                <input type="number" name="harga_sewa_hari" class="w-full p-2 outline-none border-2 border-r-0 border-black" value="{{ $tbl_mobil->harga_sewa_hari }}">
                                <p class="w-fit p-2 outline-none border-2 border-l-0 border-black">K</p>
                            </div>
                        </div>
                        <div>
                            <p>Tahun Model</p>
                            <input type="number" name="tahun_model" class="w-full p-2 outline-none border-2 border-black" value="{{ $tbl_mobil->tahun_model }}">
                        </div>
                        <div>
                            <p>Kapasitas Bagasi</p>
                            <input type="number" name="kapasitas_bagasi" class="w-full p-2 outline-none border-2 border-black" value="{{ $tbl_mobil->kapasitas_bagasi }}">
                        </div>
                        <div>
                            <p>Kapasitas Kursi</p>
                            <input type="number" name="kapasitas_kursi" class="w-full p-2 outline-none border-2 border-black" value="{{ $tbl_mobil->kapasitas_kursi }}">
                        </div>
                    </div>
                    <div class="mt-5 grid grid-cols-3 gap-x-14 gap-y-5">
                        <div>
                            <p>Jenis Mobil</p>
                            <select name="jenis_mobil" class="w-full p-2 outline-none border-2 border-black">
                                <option value="manual" {{ $tbl_mobil->jenis_mobil == 'manual' ? "selected" : "" }}>Manual</option>
                                <option value="matic" {{ $tbl_mobil->jenis_mobil == 'matic' ? "selected" : "" }}>Matic</option>
                            </select>
                        </div>
                        <div>
                            <p>Brand</p>
                            <select name="id_brand" class="w-full p-2 outline-none border-2 border-black">
                                @foreach ($tbl_brand as $brand)
                                    <option value="{{ $brand->id_brand }}" {{ $brand->id_brand == $tbl_mobil->id_brand ? "selected" : "" }}>{{ $brand->nama_brand }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <p>Kategori</p>
                            <select name="id_kategori" class="w-full p-2 outline-none border-2 border-black">
                                @foreach ($tbl_kategori as $kategori)
                                    <option value="{{ $kategori->id_kategori }}" {{ $kategori->id_kategori == $tbl_mobil->id_kategori ? "selected" : "" }}>{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mt-5">
                        <button type="submit" name="submit" class="w-full p-2 outline-none border-2 border-black font-bold">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection