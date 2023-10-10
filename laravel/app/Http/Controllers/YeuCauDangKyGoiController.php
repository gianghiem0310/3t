<?php

namespace App\Http\Controllers;

use App\Models\YeuCauDangKyGoi;
use Illuminate\Http\Request;

class YeuCauDangKyGoiController extends Controller
{
    public static function danhSachYeuCauDangKyGoiAPI(Request $request){
        return YeuCauDangKyGoi::danhSachYeuCauDangKy();
    } 
}
