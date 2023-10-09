<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChuTro extends Model
{
    use HasFactory;
    protected $fillable = [
        "hinh",
        "ten",
        "soDienThoai",
        "idGoi",
        "soTaiKhoanNganHang",
        "tenChuTaiKhoanNganHang",
        "xacThuc"
    ];
}
