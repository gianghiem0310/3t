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
    public function layThongTinTheoIDTaiKhoanAPI(Request $request)
    {
        return ChuTro::layThongTinXacThucTheoTaiKhoan($request->idTaiKhoan);
    }
    public function timChuTroXacThucTheoTen(Request $request)
    {
        $q = '%' . $request->ten . '%';
        //return ChuTro::where('ten','like', $q)->get();
        return ChuTro::where([
            ['ten', 'like', $q],
            ['xacThuc', 1]
        ])->get();
    }
    public function timChuTroXacThucTheoSDT(Request $request)
    {
        $q = '%' . $request->soDienThoai . '%';
        //return ChuTro::where('soDienThoai','like', $q , 'and' , 'xacThuc' == 1)->get();
        return ChuTro::where([
            ['soDienThoai', 'like', $q],
            ['xacThuc', 1]
        ])->get();
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
    public function layThongTinTheoIDTaiKhoanAPI2(Request $request)
    {
        return ChuTro::where('idTaiKhoan', '=', $request->idTaiKhoan)->first();
    }
    public function xacNhanThongTinChuTroTheoIDTaiKhoanAPI(Request $request)
    {
        return ChuTro::where('id', $request->id)->update(['xacThuc' => 1]);
    }
}
