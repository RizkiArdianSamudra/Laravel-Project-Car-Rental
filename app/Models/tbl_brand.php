<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_brand extends Model
{
    use HasFactory;
    protected $table = 'tbl_brand';
    protected $fillable = ['id_brand', 'nama_brand', 'logo_brand'];
    protected $primaryKey = 'id_brand';
    public $timestamps = false;
}
