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

    public function xacThucChuTro(){
        $this->setAttribute("yeuCauXacThuc", $this->hasOne(XacThucChuTro::class, 'idChuTro', 'id')->first());
    }

    public static function layThongTinXacThucTheoTaiKhoan($idTaiKhoan) {
        $result = self::where('idTaiKhoan', "=", $idTaiKhoan)->first();

        $result->xacThucChuTro();
        return $result;
    }
}
