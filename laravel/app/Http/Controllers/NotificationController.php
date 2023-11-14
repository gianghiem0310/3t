<?php

namespace App\Http\Controllers;

use App\Models\XacThucChuTro;
use App\Models\YeuCauDangKyGoi;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function demSoThongBaoChoAdminAPI(Request $request){
        return YeuCauDangKyGoi::where("trangThaiXacThuc", 0)->count() + XacThucChuTro::where("trangThaiXacThuc", 0)->count();
    }
}
