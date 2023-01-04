<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_user extends Model
{
    use HasFactory;
    protected $table = 'tbl_user';
    protected $fillable = ['id_user', 'nama_user', 'email', 'password', 'tgl_lahir', 'reg_date', 'up_date'];
    protected $primaryKey = 'id_user';
    public $timestamps = false;
}
