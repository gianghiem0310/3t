<?php

namespace App\Http\Controllers;

use App\Models\YeuCauDangKyGoi;
use Illuminate\Http\Request;

class YeuCauDangKyGoiController extends Controller
{
    public static function danhSachYeuCauDangKyGoiAPI(Request $request){
        return YeuCauDangKyGoi::danhSachYeuCauDangKy();
    } 

    public static function thongTinChiTietYeuCauDangKyGoiAPI(Request $request){
        return YeuCauDangKyGoi::thongTinChiTietYeuCauDangKy($request->id);
    } 

    public static function xacThucYeuCauDangKyGoiAPI(Request $request){
        return YeuCauDangKyGoi::where('id', '=', $request->id)->update([
            'trangThaiXacThuc' => 1
        ]);
    }

    public static function huyYeuCauDangKyGoiAPI(Request $request){
        return YeuCauDangKyGoi::where('id', '=', $request->id)->delete();
    }
}
