<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_booking extends Model
{
    use HasFactory;
    protected $table = 'tbl_booking';
    protected $fillable = ['id_booking', 'id_user', 'id_mobil', 'telepon', 'alamat', 'from_date', 'to_date', 'status', 'total_bayar'];
    protected $primaryKey = 'id_booking';
    public $timestamps = false;
}
