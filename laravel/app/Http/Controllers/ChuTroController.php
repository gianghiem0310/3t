<?php

namespace App\Http\Controllers;

use App\Models\ChuTro;
use Illuminate\Http\Request;

class ChuTroController extends Controller
{
    public function layTatCaThongTinChuTroAPI(Request $request)
    {
        return ChuTro::all();
    }
    public function layTatCaThongTinChuTroChuaXacThucAPI(Request $request)
    {
        return ChuTro::where('xacThuc', 0)->get();
    }
    public function layTatCaThongTinChuTroDaXacThucAPI(Request $request)
    {
        return ChuTro::where('xacThuc', 1)->get();
    }
    public function layThongTinTheoIDTaiKhoanAPI(Request $request){
        return ChuTro::layThongTinXacThucTheoTaiKhoan($request->idTaiKhoan);
    }
    public function timChuTroTheoTen(Request $request)
    {
        $q = '%'. $request->ten.'%';
        return ChuTro::where('ten','like', $q)->get();
    }
    public function timChuTroTheoSDT(Request $request)
    {
        $q = '%'. $request->soDienThoai.'%';
        return ChuTro::where('soDienThoai','like', $q)->get();
    }
    // public function khoaChuTroAPI(Request $request)
    // {
    //     return ChuTro::khoaChuTroTheoIDTaiKhoan($request->idTaiKhoan);
    // }

    // public function moKhoaChuTroAPI(Request $request)
    // {
    //     return ChuTro::moKhoaChuTroTheoIDTaiKhoan($request->idTaiKhoan);
    // }
    public function layThongTinChuTroIdTaiKhoanAPI(Request $request)
    {
        return ChuTro::layThongTinTheoTaiKhoan($request->idTaiKhoan);
    }
    public function xacNhanThongTinChuTroTheoIDTaiKhoanAPI(Request $request){
        return ChuTro::where('id', $request->id)->update(['xacThuc'=>1]);
    }

}
