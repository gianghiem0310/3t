<?php

namespace App\Models;
use App\Models\PhongTroChuTro;
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
        'gioiTinh',
        'tienDien',
        'tienNuoc'
    ];
    public function tienIch()
    {
        $this->setAttribute("tienIch", $this->belongsToMany(TienIch::class, PhongTroTienIch::class, 'idPhong', "idTienIch")->get());
    }
    public static function  layyPhongTroTheoID($id){
        $result = self::find($id);
        $result->tienIch();
        return $result;
    }
      public function thongTinChuTro()
     {
         $this->setAttribute("phongTroChuTro", $this->belongsToMany(ChuTro::class, PhongTroChuTro::class,"idPhongTro",  "idChuTro")->first());
     }
     public function danhSachTienIch()
     {
         $this->setAttribute("danhSachTienIch", $this->belongsToMany(TienIch::class, PhongTroTienIch::class,"idPhong",  "idTienIch")->get());
     }
     public function danhSachHinhAnh(){
        $this->setAttribute("hinhAnhPhongTro", $this->hasMany(HinhAnh::class, "idPhong",  "id")->get());
    }
     public static function layThongTinPhong($idPhong) {
         $result = PhongTro::find($idPhong);
        $result->thongTinChuTro();
        $result->danhSachTienIch();
        $result->danhSachHinhAnh();
          return $result;
     }
}
