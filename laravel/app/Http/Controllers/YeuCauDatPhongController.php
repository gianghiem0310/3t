<?php

namespace App\Http\Controllers;

use App\Models\YeuCauDatPhong;
use Illuminate\Http\Request;

class YeuCauDatPhongController extends Controller
{
    public function demSoYeuCauDangKyPhongAPI(Request $request){
        return YeuCauDatPhong::where([
            ["idTaiKhoanNhan", $request->idTaiKhoan],
            ["trangThaiThongBao", 0]
        ])->count();
    }
}
