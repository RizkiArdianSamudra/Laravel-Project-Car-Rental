<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_kategori extends Model
{
    use HasFactory;
    protected $table = 'tbl_kategori';
    protected $fillable = ['id_kategori', 'nama_kategori'];
    protected $primaryKey = 'id_kategori';
    public $timestamps = false;
}
