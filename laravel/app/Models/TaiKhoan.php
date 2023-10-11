<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaiKhoan extends Model
{
    use HasFactory;
      //Start: Nguyen Gia Nghiem
    protected $fillable = [
        'tenTaiKhoan',
        'matKhau',
        'trangThai',
        'loaiTaiKhoan',
        'email'
    ];
      //End: Nguyen Gia Nghiem
}
