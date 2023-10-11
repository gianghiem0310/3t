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
}
