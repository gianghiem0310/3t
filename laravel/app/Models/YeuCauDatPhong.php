<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YeuCauDatPhong extends Model
{
    use HasFactory;
    protected $fillable = [
        'idTaiKhoanGui',
        'idTaiKhoanNhan',
        'idPhong',
        'trangThaiXacThuc',
        'trangThaiThongBao',
        'trangThaiNhan'
    ];
    public function joinPhong()
    {
        $this->setAttribute("phong", $this->hasOne(PhongTro::class, 'id', 'idPhong'));
    }
    public function joinNguoiThue()
    {
        $this->setAttribute("nguoiThue", $this->hasOne(NguoiThue::class, 'idTaiKhoan', 'idTaiKhoanGui'));
    }

    public static function layTatCaYeuCauDangKyPhong($idTaiKhoan)
    {
        $result = self::where("idTaiKhoanNhan", $idTaiKhoan)->get();
        foreach ($result as $item) {
            $item->joinPhong();
            $item->joinNguoiThue();
        }
        return $result;
    }
    public static function layChiTietYeuCauDangKyPhong($id)
    {
        $result = self::where("id", $id)->first();
        $result->joinPhong();
        $result->joinNguoiThue();
        return $result;
    }
}
