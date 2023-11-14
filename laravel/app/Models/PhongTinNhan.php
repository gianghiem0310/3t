<?php

namespace App\Models;

use App\Models\TinNhan;
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
        'trangThai2',
        'updated_at'
    ];
    public function taiKhoan1(){
      $this->setAttribute("nguoiThue", $this->hasOne(NguoiThue::class, 'idTaiKhoan', 'idTaiKhoan1')->first());
  }
  public function taiKhoan2(){
    $this->setAttribute("nguoiThue", $this->hasOne(NguoiThue::class, 'idTaiKhoan', 'idTaiKhoan2')->first());
  }

    public function taiKhoanChuTro1(){
      $this->setAttribute("chuTro", $this->hasOne(ChuTro::class, 'idTaiKhoan', 'idTaiKhoan1')->first());
  }
  public function taiKhoanChuTro2(){
    $this->setAttribute("chuTro", $this->hasOne(ChuTro::class, 'idTaiKhoan', 'idTaiKhoan2')->first());

    
}
  public static function layThongTinTheoTaiKhoan($idTaiKhoan) {
      $result = self::where('idTaiKhoan', "=", $idTaiKhoan)->first();
      $result->taiKhoan();
      return $result;
  }

  public static function layDanhSachThongTin($idTaiKhoan) {

    $danhSach = PhongTinNhan::where(['idTaiKhoan1'=>$idTaiKhoan])->orWhere(['idTaiKhoan2'=>$idTaiKhoan])->orderBy('updated_at','desc')->get();
    $danhSachAPi = []; 
    foreach ($danhSach as $item) {
      $kt = self::kiemTraRong($item->id);
        if($kt==true){
          if($idTaiKhoan!=$item->idTaiKhoan1){
            $item->taiKhoanChuTro1();
            $item->taikhoan1();
          }
          if($idTaiKhoan!=$item->idTaiKhoan2){
            $item->taiKhoanChuTro2();
            $item->taikhoan2();
          }
          $danhSachAPi[] = $item;
        }
      }
      return $danhSachAPi;
  }
 public static function kiemTraRong($idPhong) {
    $tinNhan = TinNhan::where('idPhong', "=", $idPhong)->get();
    if(count($tinNhan)==0){
      return false;
    }
    return true;
 }
      //End: Nguyen Gia Nghiem
}
