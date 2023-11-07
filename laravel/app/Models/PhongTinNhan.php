<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongTinNhan extends Model
{
    use HasFactory;
     //Start: Nguyen Gia Nghiem
     protected $fillable = [
        'idTaiKhoan1',
        'idTaiKhoan2',
        'tinNhanMoiNhat',
        'thoiGianCuaTinNhan',
        'trangThai1',
        'trangThai2'
    ];
    public function taiKhoan1(){
      $this->setAttribute("nguoiThue", $this->hasOne(NguoiThue::class, 'idTaiKhoan', 'idTaiKhoan1')->first());
  }
  public function taiKhoan2(){
    $this->setAttribute("nguoiThue", $this->hasOne(NguoiThue::class, 'idTaiKhoan', 'idTaiKhoan2')->first());
}
  public static function layThongTinTheoTaiKhoan($idTaiKhoan) {
      $result = self::where('idTaiKhoan', "=", $idTaiKhoan)->first();
      $result->taiKhoan();
      return $result;
  }

  public static function layDanhSachThongTin($idTaiKhoan) {

    $danhSach = PhongTinNhan::where(['idTaiKhoan1'=>$idTaiKhoan])->orWhere(['idTaiKhoan2'=>$idTaiKhoan])->get();
      foreach ($danhSach as $item) {
        if($idTaiKhoan!=$item->idTaiKhoan1){
          $item->where('idTaiKhoan1', "=", $item->idTaiKhoan1)->first();
          $item->taikhoan1();
        }
        if($idTaiKhoan!=$item->idTaiKhoan2){
          $item->where('idTaiKhoan2', "=", $item->idTaiKhoan2)->first();
          $item->taikhoan2();
        }
      }
      return $danhSach;
  }
 
      //End: Nguyen Gia Nghiem
}
