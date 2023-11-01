<?php

namespace App\Http\Controllers;

use App\Models\ChuTro;
use App\Models\NguoiThue;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;

class TaiKhoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TaiKhoan $taiKhoan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaiKhoan $taiKhoan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaiKhoan $taiKhoan)
    {
        //
    }
      //Start: Nguyen Gia Nghiem
    public function layTaiKhoanTheoId(Request $request) 
    {
        return TaiKhoan::find($request->id);
    }
    public function doiMatKhauTaiKhoan(Request $request){
        return TaiKhoan::where('id','=',$request->id)->update(['matKhau'=>$request->matkhaumoi]);
    }

    public function capNhatTrangThai(Request $request) 
    {
        $taikhoan = TaiKhoan::find($request->id);
        if($taikhoan->trangThai == 0){
            $taikhoan->trangThai  = 1;
        }else{
            $taikhoan->trangThai = 0;
        }
        return $taikhoan->update();
    }


    public function kiemTraDangNhap(Request $request) {
        $tenTaiKhoan = $request->tenTaiKhoan;
        $matKhau = $request->matKhau;
        $taiKhoan = TaiKhoan::where('tenTaiKhoan','=',$tenTaiKhoan)->where('matKhau','=',$matKhau)->first();
        if(isset($taiKhoan)){
            return $taiKhoan;
        }
        return null;
    }

   public function layTatCaTaiKhoan()  {
    return TaiKhoan::all();
   }
   public function layTaiKhoanDoiPhuong(Request $request)  {
    return TaiKhoan::find($request->idDoiPhuong);
   }

   public function taoTaiKhoanNguoiThue(Request $request) {
        $tenTaiKhoan = $request->tenTaiKhoan;
        $matKhau = $request->matKhau;
        $email = $request->email;
        $tenNguoiDung= $request->ten;
        $gioiTinh = $request->gioiTinh;
        TaiKhoan::create(['tenTaiKhoan'=>$tenTaiKhoan,'matKhau'=>$matKhau,'email'=>$email,'trangThai'=>0,'loaiTaiKhoan'=>0]);
        $taiKhoan = TaiKhoan::where('tenTaiKhoan','=',$tenTaiKhoan)->where('matKhau','=',$matKhau)->first();
        if(isset($taiKhoan)){
            return NguoiThue::create(['idTaiKhoan'=>$taiKhoan->id,'ten'=>$tenNguoiDung,'gioiTinh'=>$gioiTinh]);
        }
        return null;
   }
   public function taoTaiKhoanChuTro(Request $request) {
    $tenTaiKhoan = $request->tenTaiKhoan;
    $matKhau = $request->matKhau;
    $email = $request->email;
    $tenNguoiDung= $request->ten;
    TaiKhoan::create(['tenTaiKhoan'=>$tenTaiKhoan,'matKhau'=>$matKhau,'email'=>$email,'trangThai'=>0,'loaiTaiKhoan'=>1]);
    $taiKhoan = TaiKhoan::where('tenTaiKhoan','=',$tenTaiKhoan)->where('matKhau','=',$matKhau)->where('loaiTaiKhoan','=',1)->first();
    if(isset($taiKhoan)){
        $id = $taiKhoan->id;
        return ChuTro::create(['idTaiKhoan'=>$id,'ten'=>$tenNguoiDung,'xacThuc'=>0]);
    }
    return null;
}


   
      //End: Nguyen Gia Nghiem

      //Start Kiet
      public function khoaTaiKhoanAPI(Request $request)
      {
          
          return TaiKhoan::where('id', $request->id)->update([
              
              "trangThai" =>  1
          ]);
      }
      public function moKhoaTaiKhoanAPI(Request $request)
      {
          
          return TaiKhoan::where('id', $request->id)->update([
              
              "trangThai" =>  0
          ]);
      }

      //End Kiet
}
