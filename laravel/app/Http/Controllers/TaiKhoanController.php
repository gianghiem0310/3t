<?php

namespace App\Http\Controllers;

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

   
      //End: Nguyen Gia Nghiem
}
