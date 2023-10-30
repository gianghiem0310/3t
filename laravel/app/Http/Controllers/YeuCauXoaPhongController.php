<?php

namespace App\Http\Controllers;

use App\Models\YeuCauXoaPhong;
use Illuminate\Http\Request;

class YeuCauXoaPhongController extends Controller
{
    public static function layTatCaYeuCauXoaPhongAPI(){
        return YeuCauXoaPhong::danhSachYeuCauXoaPhong();
    }
    public static function thongTinChiTietCuaYeuCauXoaPhongAPI(Request $request){
        return YeuCauXoaPhong::thongTinYeuCauXoaPhong($request->id);
    }
    public static function huyYeuCauXoaPhongAPI(Request $request){
        return YeuCauXoaPhong::where('id', $request->id)->delete();
    }
}
