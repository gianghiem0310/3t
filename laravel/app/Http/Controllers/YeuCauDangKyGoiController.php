<?php

namespace App\Http\Controllers;

use App\Models\YeuCauDangKyGoi;
use Illuminate\Http\Request;

class YeuCauDangKyGoiController extends Controller
{
    public function test(){
        $res = YeuCauDangKyGoi::danhSachYeuCauDangKyDaXacThuc()[0];
        return $res;
        
    }
    public static function danhSachYeuCauDangKyGoiAPI(Request $request)
    {
        return YeuCauDangKyGoi::danhSachYeuCauDangKy();
    }

    public static function thongTinChiTietYeuCauDangKyGoiAPI(Request $request)
    {
        return YeuCauDangKyGoi::thongTinChiTietYeuCauDangKy($request->id);
    }

    public static function xacThucYeuCauDangKyGoiAPI(Request $request)
    {
        return YeuCauDangKyGoi::where('id', '=', $request->id)->update([
            'trangThaiXacThuc' => 1
        ]);
    }

    public static function huyYeuCauDangKyGoiAPI(Request $request)
    {
        return YeuCauDangKyGoi::where('id', '=', $request->id)->delete();
    }

    public static function guiYeuCauDangKyGoiAPI(Request $request)
    {
        $hinhAnhChuyenKhoan = $request->hinhAnhChuyenKhoan;
        $hinhAnhChuyenKhoan_name = 'images/'.self::myRandom()."-" . now()->getTimestampMs() . '-' . 'banner' . '.'. $hinhAnhChuyenKhoan->extension();
        $hinhAnhChuyenKhoan->move(public_path('images'), $hinhAnhChuyenKhoan_name);
        return YeuCauDangKyGoi::create([
            'idChuTro' => $request->idChuTro,
            'idGoi' => $request->idGoi,
            'trangThaiXacThuc' => 0,
            'hinhAnhChuyenKhoan' => $hinhAnhChuyenKhoan_name
        ]);
    }

    public static function myRandom()
    {
        // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $string = str_shuffle($pin);
        return $string;
    }
    
}
