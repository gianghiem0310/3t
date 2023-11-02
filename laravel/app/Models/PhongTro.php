<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongTro extends Model
{
    protected $fillable = [
        'soPhong',
        'gia',
        'dienTich',
        'moTa',
        'idQuan',
        'idPhuong',
        'diaChiChiTiet',
        'loaiPhong',
        'soLuongToiDa',
        'tienCoc',
        'gioiTinh'
    ];
}
