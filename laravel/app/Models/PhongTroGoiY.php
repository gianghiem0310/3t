<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongTroGoiY extends Model
{
    use HasFactory;
    protected $fillable = [
        'idTaiKhoan',
        'idQuan',
        'tienCoc',
        'gioiTinh'
    ];
}
