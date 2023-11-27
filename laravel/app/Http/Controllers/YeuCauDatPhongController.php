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
    // gửi yêu cầu đăng ký gói
    public function themYeuCauDangKyPhong(Request $request){
        return YeuCauDatPhong::create([
            'idTaiKhoanGui'=>$request->idTaiKhoanGui,
            'idTaiKhoanNhan'=>$request->idTaiKhoanNhan,
            'idPhong' => $request->idPhong,
            'trangThaiXacThuc' => 0,
            'trangThaiThongBao' => 0,
            'trangThaiNhan' => 0
        ]);
    }
    // lấy tất cả thông báo của tài khoản theo idTaiKhoan
    public function layTatCaYeuCauDangKyPhongAPI(Request $request){
        return YeuCauDatPhong::layTatCaYeuCauDangKyPhong($request->idTaiKhoan);
    }
    // lấy chi tiet thông báo của tài khoản theo idTaiKhoan
    public function layThongTinChiTietCuaThongBao(Request $request){
        return YeuCauDatPhong::layChiTietYeuCauDangKyPhong($request->id);
    }
}
