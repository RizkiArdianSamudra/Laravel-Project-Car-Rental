<?php

namespace App\Http\Controllers;

use App\Models\tbl_admin;
use App\Models\tbl_booking;
use App\Models\tbl_user;
use App\Models\tbl_mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MobilController extends Controller
{
    public function index()
    {
        return view('rentalskuy/index');
    }

    public function login()
    {
        return view('rentalskuy/login');
    }

    public function actionLogin(Request $request)
    {
        Session::flash('email', $request->email);
        Session::flash('password', $request->password);

        $validasi = $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'email wajib diisi',
                'password.required' => 'password wajib diisi',
            ]
        );

        $cekLogin = '';
        $tbl_admin = tbl_admin::all();
        foreach ($tbl_admin as $admin) {
            if ($admin->email == $validasi['email'] && $admin->password == $validasi['password']) {
                $cekLogin = 'admin';
                $id_admin = $admin->id_admin;
                $nama_admin = $admin->nama_admin;
                $photo = $admin->photo;
            }
        };

        if ($cekLogin == 'admin') {
            Session::put('login', 'admin');
            Session::put('id_admin', $id_admin);
            Session::put('nama_admin', $nama_admin);
            Session::put('photo', $photo);
            return redirect('/admin');
        };

        $tbl_user = tbl_user::all();
        foreach ($tbl_user as $user) {
            if ($user->email == $validasi['email'] && $user->password == $validasi['password']) {
                $cekLogin = 'user';
                $id_user = $user->id_user;
                $nama_user = $user->nama_user;
            }
        };

        if ($cekLogin == 'user') {
            Session::put('login', 'user');
            Session::put('id_user', $id_user);
            Session::put('nama_user', $nama_user);
            return redirect('/');
        };

        if ($cekLogin == '') {
            //jika autentikasi gagal
            return redirect('/login')->with('notvalid', 'email dan password tidak valid');
        }
    }

    public function register()
    {
        return view('rentalskuy/regristasi');
    }

    public function actionRegister(Request $request)
    {
        Session::flash('nama_user', $request->nama_user);
        Session::flash('email', $request->email);
        Session::flash('password', $request->password);
        Session::flash('tgl_lahir', $request->tgl_lahir);

        $validasi = $request->validate(
            [
                'nama_user' => 'required',
                'email' => 'required',
                'password' => 'required',
                'tgl_lahir' => 'required',
            ],
            [
                'nama_user.required' => 'nama wajib diisi',
                'email.required' => 'email wajib diisi',
                'password.required' => 'password wajib diisi',
                'tgl_lahir.required' => 'tgl lahir wajib diisi',
            ]
        );

        $validasi['reg_date'] = date('Y-m-d H:i:s');

        tbl_user::create($validasi);
        return redirect('/login');
    }

    public function dailycar()
    {
        $tbl_mobil = DB::table('tbl_mobil')
            ->select('tbl_mobil.*')
            ->where('id_kategori', '1')
            ->get();
        return view('rentalskuy/dailycar', compact(['tbl_mobil']));
    }

    public function familycar()
    {
        $tbl_mobil = DB::table('tbl_mobil')
            ->select('tbl_mobil.*')
            ->where('id_kategori', '2')
            ->get();
        return view('rentalskuy/familycar', compact(['tbl_mobil']));
    }

    public function sportcar()
    {
        $tbl_mobil = DB::table('tbl_mobil')
            ->select('tbl_mobil.*')
            ->where('id_kategori', '3')
            ->get();
        return view('rentalskuy/sportcar', compact(['tbl_mobil']));
    }

    public function carDetail($id_mobil)
    {
        // $tbl_mobil = tbl_mobil::find($id_mobil);
        $tbl_mobil = DB::table('tbl_mobil')
            ->select('tbl_mobil.*', 'tbl_brand.nama_brand', 'tbl_kategori.nama_kategori')
            ->join('tbl_brand', 'tbl_mobil.id_brand', '=', 'tbl_brand.id_brand')
            ->join('tbl_kategori', 'tbl_mobil.id_kategori', '=', 'tbl_kategori.id_kategori')
            ->where('tbl_mobil.id_mobil', '=', $id_mobil)
            ->get();
        return view('rentalskuy/carDetail', compact(['tbl_mobil']));
    }

    public function carPesan($id_mobil)
    {
        $tbl_mobil = DB::table('tbl_mobil')
            ->select('tbl_mobil.*', 'tbl_brand.nama_brand', 'tbl_kategori.nama_kategori')
            ->join('tbl_brand', 'tbl_mobil.id_brand', '=', 'tbl_brand.id_brand')
            ->join('tbl_kategori', 'tbl_mobil.id_kategori', '=', 'tbl_kategori.id_kategori')
            ->where('tbl_mobil.id_mobil', '=', $id_mobil)
            ->get();
        return view('rentalskuy/carPesan', compact(['tbl_mobil']));
    }

    public function carPesanAction(Request $request)
    {
        Session::flash('telepon', $request->telepon);
        Session::flash('alamat', $request->alamat);
        Session::flash('from_date', $request->from_date);
        Session::flash('to_date', $request->to_date);

        $validasi = $request->validate(
            [
                'telepon' => 'required',
                'alamat' => 'required',
                'from_date' => 'required',
                'to_date' => 'required',
            ],
            [
                'telepon.required' => 'telepon wajib diisi',
                'alamat.required' => 'alamat wajib diisi',
                'from_date.required' => 'tgl pinjam wajib diisi',
                'to_date.required' => 'tgl kembali wajib diisi',
            ]
        );

        $validasi['id_user'] = $request->id_user;
        $validasi['id_mobil'] = $request->id_mobil;

        $jarak = (strtotime($validasi['to_date'])) - (strtotime($validasi['from_date']));
        $hari = $jarak / 60 / 60 / 24;
        $total_bayar = $hari * ($request->harga_sewa_hari);
        $validasi['total_bayar'] = $total_bayar;

        $tabel = tbl_booking::create($validasi);
        $tbl_booking = DB::table('tbl_booking')
            ->select('tbl_booking.*', 'tbl_user.nama_user', 'tbl_mobil.nama_mobil')
            ->join('tbl_user', 'tbl_booking.id_user', '=', 'tbl_user.id_user')
            ->join('tbl_mobil', 'tbl_booking.id_mobil', '=', 'tbl_mobil.id_mobil')
            ->where('id_booking', $tabel->id_booking)
            ->get();

        $tbl_booking = $tbl_booking[0];
        return view('rentalskuy/berhasilPesan', compact(['tbl_booking']));
    }

    public function berhasilPesan()
    {
        return view('rentalskuy/berhasilPesan');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
