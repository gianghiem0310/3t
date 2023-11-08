<?php

namespace App\Models;

use App\Models\PhongTroChuTro;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongTro extends Model
{
    protected $fillable = [
        'id',
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
        'gioiTinh',
        'tienDien',
        'tienNuoc'
    ];
     // Start Nghiem Part 2-2
  
     public function thongTinChuTro()
     {
         $this->setAttribute("phongTroChuTro", $this->belongsToMany(ChuTro::class, PhongTroChuTro::class,"idPhongTro",  "idChuTro")->first());
     }
     public function danhSachTienIch()
     {
         $this->setAttribute("danhSachTienIch", $this->belongsToMany(TienIch::class, PhongTroTienIch::class,"idPhong",  "idTienIch")->get());
     }
     public static function layThongTinPhong($idPhong) {
         $result = PhongTro::find($idPhong);
        $result->thongTinChuTro();
        $result->danhSachTienIch();
          return $result;
     }
    // End Nghiem Part 2-2
   

}
