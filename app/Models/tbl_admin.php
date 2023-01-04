<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_admin extends Model
{
    use HasFactory;
    protected $table = 'tbl_admin';
    protected $fillable = ['id_admin', 'nama_admin', 'email', 'password', 'mobile_number', 'photo', 'status'];
    protected $primaryKey = 'id_admin';
    public $timestamps = false;
}
