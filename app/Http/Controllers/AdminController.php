<?php

namespace App\Http\Controllers;

use App\Models\tbl_user;
use App\Models\tbl_admin;
use App\Models\tbl_brand;
use App\Models\tbl_mobil;
use App\Models\tbl_booking;
use Illuminate\Support\Str;
use App\Models\tbl_kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        $tbl_admin = DB::table('tbl_admin')->count();
        $tbl_user = DB::table('tbl_user')->count();
        $tbl_mobil = DB::table('tbl_mobil')->count();
        $tbl_booking = DB::table('tbl_booking')->count();
        return view('rentalskuy/admin/index', compact(['tbl_admin', 'tbl_user', 'tbl_mobil', 'tbl_booking']));
    }

    public function profilEdit()
    {
        return view('rentalskuy/admin/profilEdit');
    }

    public function carBooking()
    {
        // $tbl_booking = tbl_booking::all();
        $tbl_booking = DB::table('tbl_booking')
            ->select('tbl_booking.*', 'tbl_user.nama_user', 'tbl_mobil.nama_mobil')
            ->join('tbl_user', 'tbl_booking.id_user', '=', 'tbl_user.id_user')
            ->join('tbl_mobil', 'tbl_booking.id_mobil', '=', 'tbl_mobil.id_mobil')
            ->get();
        return view('rentalskuy/admin/carBooking', compact(['tbl_booking']));
    }

    public function carBookingSearch(Request $request)
    {
        $cari = $request->searchManagerBooking;
        $tbl_booking = DB::table('tbl_booking')
            ->select('tbl_booking.*', 'tbl_user.nama_user', 'tbl_mobil.nama_mobil')
            ->join('tbl_user', 'tbl_booking.id_user', '=', 'tbl_user.id_user')
            ->join('tbl_mobil', 'tbl_booking.id_mobil', '=', 'tbl_mobil.id_mobil')
            ->where('nama_user', 'LIKE', "%$cari%")
            ->orwhere('id_booking', 'LIKE', "%$cari%")
            ->orwhere('nama_mobil', 'LIKE', "%$cari%")
            ->get();
        return view('rentalskuy/admin/carBooking', compact(['tbl_booking']));
    }

    public function carBookingIya(Request $request)
    {
        $tbl_booking = tbl_booking::find($request->id_booking);
        $tbl_booking->update(['status' => $request->status]);
        return redirect('/admin/car-booking');
    }

    public function carBookingTidak(Request $request)
    {
        $tbl_booking = tbl_booking::find($request->id_booking);
        $tbl_booking->update(['status' => $request->status]);
        return redirect('/admin/car-booking');
    }

    public function carManager()
    {
        $tbl_mobil = DB::table('tbl_mobil')
            ->select('tbl_mobil.*', 'tbl_brand.nama_brand', 'tbl_kategori.nama_kategori')
            ->join('tbl_brand', 'tbl_mobil.id_brand', '=', 'tbl_brand.id_brand')
            ->join('tbl_kategori', 'tbl_mobil.id_kategori', '=', 'tbl_kategori.id_kategori')
            ->get();
        return view('rentalskuy/admin/carManager', compact('tbl_mobil'));
    }

    public function carManagerSearch(Request $request)
    {
        // $validasi =$request->validate(['searchManagerCars' => 'required']);
        // $cari = $validasi['searchManagerCars'];
        $cari = $request->searchManagerCars;
        $tbl_mobil = DB::table('tbl_mobil')
            ->select('tbl_mobil.*', 'tbl_brand.nama_brand', 'tbl_kategori.nama_kategori')
            ->join('tbl_brand', 'tbl_mobil.id_brand', '=', 'tbl_brand.id_brand')
            ->join('tbl_kategori', 'tbl_mobil.id_kategori', '=', 'tbl_kategori.id_kategori')
            ->where('nama_mobil', 'LIKE', "%$cari%")
            ->orwhere('nama_brand', 'LIKE', "%$cari%")
            ->orwhere('harga_sewa_hari', 'LIKE', "%$cari%")
            ->orwhere('tahun_model', 'LIKE', "%$cari%")
            ->get();
        return view('rentalskuy/admin/carManager', compact('tbl_mobil'));
    }

    public function carManagerTambah()
    {
        $tbl_brand = tbl_brand::all();
        $tbl_kategori = tbl_kategori::all();
        return view('rentalskuy/admin/carManagerTambah', compact(['tbl_brand', 'tbl_kategori']));
    }

    public function carManagerAction(Request $request)
    {
        $validasi = $request->validate(
            [
                'id_brand' => 'required',
                'id_kategori' => 'required',
                'nama_mobil' => 'required',
                'harga_sewa_hari' => 'required',
                'tahun_model' => 'required',
                'kapasitas_bagasi' => 'required',
                'kapasitas_kursi' => 'required',
                'jenis_mobil' => 'required',
                'gambar' => 'required',
            ],
            [
                'id_brand' => 'brand wajib diisi',
                'id_kategori' => 'kategori wajib diisi',
                'nama_mobil' => 'nama mobil wajib diisi',
                'harga_sewa_hari' => 'harga sewa wajib diisi',
                'tahun_model' => 'tahun model wajib diisi',
                'kapasitas_bagasi' => 'kapasitas bagasi wajib diisi',
                'kapasitas_kursi' => 'kapasitas kursi wajib diisi',
                'jenis_mobil' => 'jenis mobil wajib diisi',
                'gambar' => 'gambar wajib diisi',
            ]
        );

        $data = $request->file('gambar'); //mengambil data file yang diupload
        $nama_file = $data->getClientOriginalName(); //mengambil nama file
        $data->move('images', $data->getClientOriginalName()); //memindahkan file ke folder tujuan

        $validasi['gambar'] = $nama_file;
        tbl_mobil::create($validasi);
        return redirect('/admin/car-manager');
    }

    public function carManagerEdit(Request $request)
    {
        $tbl_mobil = tbl_mobil::find($request->id_mobil);
        $tbl_brand = tbl_brand::all();
        $tbl_kategori = tbl_kategori::all();
        return view('rentalskuy/admin/carManagerEdit', compact(['tbl_mobil', 'tbl_brand', 'tbl_kategori']));
    }

    public function carManagerUpdate(Request $request)
    {
        $validasi = $request->validate(
            [
                'id_brand' => 'required',
                'id_kategori' => 'required',
                'nama_mobil' => 'required',
                'harga_sewa_hari' => 'required',
                'tahun_model' => 'required',
                'kapasitas_bagasi' => 'required',
                'kapasitas_kursi' => 'required',
                'jenis_mobil' => 'required',
            ],
            [
                'id_brand' => 'brand wajib diisi',
                'id_kategori' => 'kategori wajib diisi',
                'nama_mobil' => 'nama mobil wajib diisi',
                'harga_sewa_hari' => 'harga sewa wajib diisi',
                'tahun_model' => 'tahun model wajib diisi',
                'kapasitas_bagasi' => 'kapasitas bagasi wajib diisi',
                'kapasitas_kursi' => 'kapasitas kursi wajib diisi',
                'jenis_mobil' => 'jenis mobil wajib diisi',
            ]
        );

        if ($request->gambar) {
            $gambar_lama = public_path('/images/') . $request->gambar_lama; //mengambil path atau url tempat file disimpan
            unlink($gambar_lama); //menghapus file

            $data = $request->file('gambar'); //mengambil data file yang diupload
            $nama_file = $data->getClientOriginalName(); //mengambil nama file
            $data->move('images', $data->getClientOriginalName()); //memindahkan file ke folder tujuan

            $validasi['gambar'] = $nama_file;
        }

        $tbl_mobil = tbl_mobil::find($request->id_mobil);
        $tbl_mobil->update($validasi);
        return redirect('/admin/car-manager');
    }

    public function carManagerDelete(Request $request)
    {
        $tbl_mobil = tbl_mobil::find($request->id_mobil);
        $gambar = public_path('/images/') . $tbl_mobil->gambar; //mengambil path atau url
        unlink($gambar); //menghapus file
        $tbl_mobil->delete();
        return redirect('/admin/car-manager');
    }

    public function userManager()
    {
        $tbl_user = tbl_user::all();
        return view('rentalskuy/admin/userManager', compact(['tbl_user']));
    }

    public function userManagerSearch(Request $request)
    {
        $cari = $request->searchManagerUser;
        $tbl_user = DB::table('tbl_user')
            ->select('*')
            ->where('nama_user', 'LIKE', "%$cari%")
            ->get();
        return view('rentalskuy/admin/userManager', compact(['tbl_user']));
    }

    public function userManagerDelete(Request $request)
    {
        $tbl_user = tbl_user::find($request->id_user);
        $tbl_user->delete();
        return redirect('/admin/user-manager');
    }

    public function adminManager()
    {
        $tbl_admin = tbl_admin::all();
        return view('rentalskuy/admin/adminManager', compact(['tbl_admin']));
    }

    public function adminManagerSearch(Request $request)
    {
        $cari = $request->searchManagerAdmin;
        $tbl_admin = DB::table('tbl_admin')
            ->select('*')
            ->where('nama_admin', 'LIKE', "%$cari%")
            ->get();
        return view('rentalskuy/admin/adminManager', compact(['tbl_admin']));
    }

    public function adminManagerTambah()
    {
        return view('rentalskuy/admin/adminManagerTambah');
    }

    public function adminManagerAction(Request $request)
    {
        $validasi = $request->validate(
            [
                'nama_admin' => 'required',
                'email' => 'required',
                'password' => 'required',
                'mobile_number' => 'required',
                'photo' => 'required | image | file | max:1024',
            ],
            [
                'nama_admin' => 'nama wajib diisi',
                'email' => 'email wajib diisi',
                'password' => 'password wajib diisi',
                'mobile_number' => 'nomer telepon wajib diisi',
                'photo' => 'photo wajib diisi',
            ]
        );

        $uniq = Str::random(9); //uniq random

        $data = $request->file('photo'); //mengambil data file yang diupload
        $nama_file = $data->getClientOriginalName(); //mengambil nama file
        $nama_file_tanpa_extension = pathinfo($nama_file, PATHINFO_FILENAME); //nama file tanpa extension
        $extension = $data->getClientOriginalExtension(); //nama extension
        $nama_file_simpan = $nama_file_tanpa_extension . '_' . $uniq . '_' . time() . '.' . $extension; //nama file yang akan disimpan di folder dan database

        $data->move('images', $nama_file_simpan); //memindahkan file ke folder tujuan

        $validasi['photo'] = $nama_file_simpan;
        // $validasi['password'] = bcrypt($validasi['password']);
        tbl_admin::create($validasi);
        return redirect('/admin/admin-manager');
    }

    public function adminManagerEdit(Request $request)
    {
        $tbl_admin = tbl_admin::find($request->id_admin);
        return view('rentalskuy/admin/adminManagerEdit', compact(['tbl_admin']));
    }

    public function adminManagerUpdate(Request $request)
    {
        $validasi = $request->validate(
            [
                'nama_admin' => 'required',
                'email' => 'required',
                'mobile_number' => 'required',
            ],
            [
                'nama_admin' => 'nama wajib diisi',
                'email' => 'email wajib diisi',
                'mobile_number' => 'nomer telepon wajib diisi',
            ]
        );

        if ($request->password) {
            $validasi['password'] = bcrypt($request->password);
        }

        // if ($request->photo) {
        //     $photoLama = public_path('/images/') . $request->photo_lama; //mengambil path atau url tempat file disimpan
        //     unlink($photoLama); //menghapus file

        //     $data = $request->file('photo'); //mengambil data file yang diupload
        //     $nama_file = $data->getClientOriginalName(); //mengambil nama file
        //     $data->move('images', $data->getClientOriginalName()); //memindahkan file ke folder tujuan

        //     $validasi['photo'] = $nama_file;
        // }

        if ($request->photo) {
            $request->validate(['photo' => 'image | file | max:1024'], ['photo' => 'format foto harus benar']); //validasi gambar
            $photoLama = public_path('/images/') . $request->photo_lama; //mengambil path atau url tempat file disimpan
            unlink($photoLama); //menghapus file

            $uniq = Str::random(9); //uniq random
            $data = $request->file('photo'); //mengambil data file yang diupload
            $nama_file = $data->getClientOriginalName(); //mengambil nama file
            $nama_file_tanpa_extension = pathinfo($nama_file, PATHINFO_FILENAME); //nama file tanpa extension
            $extension = $data->getClientOriginalExtension(); //nama extension
            $nama_file_simpan = $nama_file_tanpa_extension . '_' . $uniq . '_' . time() . '.' . $extension; //nama file yang akan disimpan di folder dan database
            $data->move('images', $nama_file_simpan); //memindahkan file ke folder tujuan
            $validasi['photo'] = $nama_file_simpan;
        }


        Session::put('photo', $validasi['photo']); //perbarui session photo
        $tbl_admin = tbl_admin::find($request->id_admin);
        $tbl_admin->update($validasi);
        return redirect('/admin/admin-manager');
    }

    public function adminManagerDelete(Request $request)
    {
        $tbl_admin = tbl_admin::find($request->id_admin);
        $photo = public_path('/images/') . $tbl_admin->photo; //mengambil path atau url
        unlink($photo); //menghapus file
        $tbl_admin->delete();
        return redirect('/admin/admin-manager');
    }

    public function brandManager()
    {
        $tbl_brand = tbl_brand::all();
        return view('rentalskuy/admin/brandManager', compact(['tbl_brand']));
    }

    public function brandManagerSearch(Request $request)
    {
        $cari = $request->searchManagerBrand;
        
        $tbl_brand = DB::table('tbl_brand')
            ->select('*')
            ->where('nama_brand', 'LIKE', "%$cari%")
            ->get();

        return view('rentalskuy/admin/brandManager', compact(['tbl_brand']));
    }

    public function brandManagerTambah()
    {
        return view('rentalskuy/admin/brandManagerTambah');
    }

    public function brandManagerAction(Request $request)
    {
        $validasi = $request->validate(
            [
                'nama_brand' => 'required',
                'logo_brand' => 'required',
            ],
            [
                'nama_brand' => 'nama brand wajib diisi',
                'logo_brand' => 'logo brand wajib diisi',
            ]
        );

        $data = $request->file('logo_brand'); //mengambil data file yang diupload
        $nama_file = $data->getClientOriginalName(); //mengambil nama file
        $data->move('images', $data->getClientOriginalName()); //memindahkan file ke folder tujuan

        $validasi['logo_brand'] = $nama_file;
        tbl_brand::create($validasi);
        return redirect('/admin/brand-manager');
    }

    public function brandManagerEdit(Request $request)
    {
        $tbl_brand = tbl_brand::find($request->id_brand);
        return view('rentalskuy/admin/brandManagerEdit', compact(['tbl_brand']));
    }

    public function brandManagerUpdate(Request $request)
    {
        $validasi = $request->validate(
            [
                'nama_brand' => 'required',
            ],
            [
                'nama_brand' => 'nama brand wajib diisi',
            ]
        );

        if ($request->logo_brand) {
            $logoLama = public_path('/images/') . $request->logo_lama; //mengambil path atau url tempat file disimpan
            unlink($logoLama); //menghapus file

            $data = $request->file('logo_brand'); //mengambil data file yang diupload
            $nama_file = $data->getClientOriginalName(); //mengambil nama file
            $data->move('images', $data->getClientOriginalName()); //memindahkan file ke folder tujuan

            $validasi['logo_brand'] = $nama_file;
        }

        $tbl_brand = tbl_brand::find($request->id_brand);
        $tbl_brand->update($validasi);
        return redirect('/admin/brand-manager');
    }

    public function brandManagerDelete(Request $request)
    {
        $tbl_brand = tbl_brand::find($request->id_brand);
        $logo_brand = public_path('/images/') . $tbl_brand->logo_brand; //mengambil path atau url
        unlink($logo_brand); //menghapus file
        $tbl_brand->delete();
        return redirect('/admin/brand-manager');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
