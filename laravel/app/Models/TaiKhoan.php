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

  public function joinTheoLoaiTaiKhoan($loaiTaiKhoan)
  {
    if ($loaiTaiKhoan == 0) {
      $this->setAttribute("nguoiDangNhap", $this->hasOne(NguoiThue::class, 'idTaiKhoan', 'id')->first(["id"]));
    }
    if ($loaiTaiKhoan == 1) {
      $this->setAttribute("nguoiDangNhap", $this->hasOne(ChuTro::class, 'idTaiKhoan', 'id')->first(["id",  "xacThuc"]));
    }
    if ($loaiTaiKhoan == 2) {
      $this->setAttribute("nguoiDangNhap", $this->hasOne(Admin::class, 'idTaiKhoan', 'id')->first(["id"]));
    }
  }

  public static function kiemTraDangNhap($tenTaiKhoan, $matKhau)
  {
    $result = self::where('tenTaiKhoan', '=', $tenTaiKhoan)->where('matKhau', '=', $matKhau)->first();
    if ($result) {
      $result->joinTheoLoaiTaiKhoan($result["loaiTaiKhoan"]);
    }
    return $result;
  }


  public function joinNghiem($loaiTaiKhoan){
    if($loaiTaiKhoan == 0){
        $this->setAttribute("thongTin", $this->hasOne(NguoiThue::class, 'idTaiKhoan', 'id')->first(["hinh",  "ten"]));
       
    }
    if($loaiTaiKhoan == 1){
        $this->setAttribute("thongTin", $this->hasOne(ChuTro::class, 'idTaiKhoan', 'id')->first(["hinh",  "ten"]));
    }
  }
  public static function kiemTraDangNhapFB($tenTaiKhoan)
  {
    $result = self::where('email', '=', $tenTaiKhoan)->first();
    if ($result) {
      $result->joinTheoLoaiTaiKhoan($result["loaiTaiKhoan"]);
    }
    return $result;
  }
  
}
