<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongBao extends Model
{
    use HasFactory;

    public function taiKhoan()
    {
        $this->setAttribute("taiKhoanNhan", $this->hasOne(TaiKhoan::class, 'id', 'idTaiKhoanGui')->first(["id", "loaiTaiKhoan"]));
    }

    public function joinTheoLoaiTaiKhoan($loaiTaiKhoan){
        if($loaiTaiKhoan == 0){
            $this->setAttribute("nguoiGui", $this->hasOne(NguoiThue::class, 'idTaiKhoan', 'idTaiKhoanGui')->first(["hinh",  "ten", "soDienThoai"]));
        }
        if($loaiTaiKhoan == 1){
            $this->setAttribute("nguoiGui", $this->hasOne(ChuTro::class, 'idTaiKhoan', 'idTaiKhoanGui')->first(["hinh",  "ten", "soDienThoai"]));
        }
        if($loaiTaiKhoan == 2){
            $this->setAttribute("nguoiGui", $this->hasOne(Admin::class, 'idTaiKhoan', 'idTaiKhoanGui')->first(["hinh",  "ten", "soDienThoai"]));
        }
    }

    public static function layTatCaThongBaoTheoIDNguoiNhan($idTaiKhoanNhan)
    {
        $result = self::where('idTaiKhoanNhan', "=", $idTaiKhoanNhan)->get();

        foreach ($result as $item) {
            $item->taiKhoan();
            
            $item->joinTheoLoaiTaiKhoan($item->taiKhoanNhan->loaiTaiKhoan);
        }
        
        return $result;
    }
}
