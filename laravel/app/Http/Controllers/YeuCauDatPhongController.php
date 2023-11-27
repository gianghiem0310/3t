<?php

namespace App\Http\Controllers;

use App\Models\PhongNguoiThue;
use App\Models\ThongBao;
use App\Models\YeuCauDatPhong;
use Illuminate\Http\Request;

class YeuCauDatPhongController extends Controller
{
    public function demSoYeuCauDangKyPhongAPI(Request $request)
    {
        return YeuCauDatPhong::where([
            ["idTaiKhoanNhan", $request->idTaiKhoan],
            ["trangThaiThongBao", 0]
        ])->count();
    }
    // gửi yêu cầu đăng ký gói
    public function themYeuCauDangKyPhong(Request $request)
    {
        return YeuCauDatPhong::create([
            'idTaiKhoanGui' => $request->idTaiKhoanGui,
            'idTaiKhoanNhan' => $request->idTaiKhoanNhan,
            'idPhong' => $request->idPhong,
            'trangThaiXacThuc' => 0,
            'trangThaiThongBao' => 0,
            'trangThaiNhan' => 0
        ]);
    }
    // lấy tất cả thông báo của tài khoản theo idTaiKhoan
    public function layTatCaYeuCauDangKyPhongAPI(Request $request)
    {
        return YeuCauDatPhong::layTatCaYeuCauDangKyPhong($request->idTaiKhoan);
    }
    // lấy chi tiet thông báo của tài khoản theo idTaiKhoan
    public function layThongTinChiTietCuaThongBao(Request $request)
    {
        return YeuCauDatPhong::layChiTietYeuCauDangKyPhong($request->id);
    }

    // Xác thực (idTaiKhoanGui,idNguoiThue,idPhong, myIdTaiKhoan)
    public function xacThucNhanPhongAPI(Request $request)
    {
        $result = 0;
        $kq = 0;
        $update = YeuCauDatPhong::updated([
            "idTaiKhoanGui" => $request->idTaiKhoanGui,
            'trangThaiXacThuc' => 1
        ]);
        if ($update == 1) {
            $phong = PhongNguoiThue::create([
                "idNguoiThue" => $request->idNguoiThue,
                "idPhong" => $request->idPhong
            ]);
            ThongBao::create([
                'idTaiKhoanGui' => $request->myIdTaiKhoan,
                'idTaiKhoanNhan' => $request->idTaiKhoanGui,
                'tieuDe' => "Đặt phòng thành công",
                'noiDung' => "Đặt phòng thành công hãy đến xem phòng trong 3 ngày tới",
                'trangThai' => 0,
                'trangThaiNhan' => 0,
            ]);
            if ($phong != null) {
                $kq = 1;
            } else {
                $kq = 0;
            }
        }
        if ($kq == 1) {
            $resYC = YeuCauDatPhong::where("idPhong", $request->idPhong)->get();
            foreach ($resYC as $item) {
                ThongBao::create([
                    'idTaiKhoanGui' => $request->myIdTaiKhoan,
                    'idTaiKhoanNhan' => $item->idTaiKhoanGui,
                    'tieuDe' => "Đặt phòng thất bại",
                    'noiDung' => "Đã có người đặt phòng trước",
                    'trangThai' => 0,
                    'trangThaiNhan' => 0,
                ]);
                $resDL = YeuCauDatPhong::where("idTaiKhoanGui", "<>", $item->idTaiKhoanGui)->delete();
                if ($resDL == 0) {
                    return 100; // delete thất bại code 100
                } else {
                    $result = 1;
                }
            }
        } else {
            return 101; // thêm người thuê vào phòng  thất bại
        }
        return $result;
    }
}
