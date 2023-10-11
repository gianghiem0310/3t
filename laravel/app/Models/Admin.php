<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
      //Start: Nguyen Gia Nghiem
    protected $fillable = [
        'idTaiKhoan',
        'hinh',
        'ten',
        'soDienThoai',
        'soTaiKhoanNganHang',
        'tenChuTaiKhoan'
    ];
      //End: Nguyen Gia Nghiem
}
