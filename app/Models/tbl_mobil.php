<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_mobil extends Model
{
    use HasFactory;
    protected $table = 'tbl_mobil';
    protected $fillable = ['id_mobil', 'id_brand', 'id_kategori', 'nama_mobil', 'harga_sewa_hari', 'tahun_model', 'kapasitas_bagasi', 'kapasitas_kursi', 'jenis_mobil', 'gambar'];
    protected $primaryKey = 'id_mobil';
    public $timestamps = false;
}
