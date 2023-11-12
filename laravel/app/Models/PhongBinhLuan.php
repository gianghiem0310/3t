<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongBinhLuan extends Model
{
    use HasFactory;
    protected $fillable = [
        "idPhong",
        "idTaiKhoan",
        "noiDungBinhLuan",
    ];
    public function joinTheoLoaiTaiKhoan($loaiTaiKhoan){
        if($loaiTaiKhoan == 0){
            $this->setAttribute("nguoiGui", $this->hasOne(NguoiThue::class, 'idTaiKhoan', 'idTaiKhoan')->first(["hinh",  "ten"]));
            $this->setAttribute("loaiTaiKhoan", "Người thuê");
        }
        if($loaiTaiKhoan == 1){
            $this->setAttribute("nguoiGui", $this->hasOne(ChuTro::class, 'idTaiKhoan', 'idTaiKhoan')->first(["hinh",  "ten"]));
            $this->setAttribute("loaiTaiKhoan", "Chủ trọ");
        }
        if($loaiTaiKhoan == 2){
            $this->setAttribute("nguoiGui", $this->hasOne(Admin::class, 'idTaiKhoan', 'idTaiKhoan')->first(["hinh",  "ten"]));
            $this->setAttribute("loaiTaiKhoan", "Admin");
        }
        
    }

    public static function layBinhLuanCuaPhongTheoIDPhong($idPhong){
        $result = self::where("idPhong", $idPhong)->orderBy('updated_at', 'DESC')->get();

        foreach ($result as $item){
            $loaiTaiKhoan = TaiKhoan::where("id", $item['idTaiKhoan'])->first()->loaiTaiKhoan;
            $item->joinTheoLoaiTaiKhoan($loaiTaiKhoan);
        }

        return $result;
    }
    public static function vietComment($idPhong, $idTaiKhoan, $noiDungBinhLuan){
        $result =  self::create([
            "idPhong" => $idPhong,
            "idTaiKhoan" => $idTaiKhoan,
            "noiDungBinhLuan" => $noiDungBinhLuan
        ]);
        $loaiTaiKhoan = TaiKhoan::where("id", $result->idTaiKhoan)->first()->loaiTaiKhoan;
        $result->joinTheoLoaiTaiKhoan($loaiTaiKhoan);
        return $result;
    }
}
