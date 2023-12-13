<?php

namespace App\Http\Controllers;

use App\Models\ChuTro;
use App\Models\NguoiThue;
use App\Models\PhongNguoiThue;
use App\Models\PhongTro;
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
        $nguoiThue = NguoiThue::where("idTaiKhoan", $request->idTaiKhoanGui)->first();
        $yeuCauDatPhong = YeuCauDatPhong::where("idTaiKhoanGui", $request->idTaiKhoanGui)->first();
        //Kiểm tra trong data có yêu cầu này chưa
        if ($yeuCauDatPhong){
            return response()->json(["message" => "Gửi yêu cầu đăng ký thất bại, đang chờ chủ trọ xác thực"]);
        }
        // Lấy phòng của người thuê
        $phongNguoiThue = PhongNguoiThue::where("idNguoiThue", $nguoiThue->id)->first();
        if ($phongNguoiThue) {
            // Đã có phòng
            return response()->json(["message" => "Gửi yêu cầu đăng ký thất bại, vì bạn đã có phòng trọ"]);
        }
        // Chưa có phòng đăng ký thành công
        return response()->json(["message" => "Gửi yêu cầu đăng ký thành công", "object" => YeuCauDatPhong::create([
            'idTaiKhoanGui' => $request->idTaiKhoanGui,
            'idTaiKhoanNhan' => $request->idTaiKhoanNhan,
            'idPhong' => $request->idPhong,
            'trangThaiXacThuc' => 0,
            'trangThaiThongBao' => 0,
            'trangThaiNhan' => 0
        ])]);
    }
    // lấy tất cả thông báo của tài khoản theo idTaiKhoan
    public function layTatCaYeuCauDangKyPhongAPI(Request $request)
    {
        return YeuCauDatPhong::layTatCaYeuCauDangKyPhong($request->idTaiKhoan);
    }
    // lấy chi tiet thông báo của tài khoản theo idTaiKhoan
    public function layThongTinChiTietCuaThongBao(Request $request)
    {
        YeuCauDatPhong::where('id', $request->id)->update(['trangThaiThongBao' => 1]);
        return YeuCauDatPhong::layChiTietYeuCauDangKyPhong($request->id);
    }

    //Từ chối yêu cầu
    public function tuChoiNhanPhongAPI(Request $request)
    {
        YeuCauDatPhong::where("id", $request->id)->delete();
        return ThongBao::create([
            'idTaiKhoanGui' => $request->myIdTaiKhoan,
            'idTaiKhoanNhan' => $request->idTaiKhoanGui,
            'tieuDe' => "Chủ trọ từ chối yêu cầu",
            'noiDung' => "Chủ trọ đã từ chối yêu cầu đặt phòng của bạn",
            'trangThai' => 0,
            'trangThaiNhan' => 0,
        ]);
    }
    // Xác thực (idTaiKhoanGui,idNguoiThue,idPhong, myIdTaiKhoan)
    public function xacThucNhanPhongAPI(Request $request)
    {
        $thongBaoThanhCong = null;
        $thongBaoThatBai = [];
        $result = 0;
        $kq = 0;
        $update = YeuCauDatPhong::where("id", $request->id)->update([
            'trangThaiXacThuc' => 1
        ]);
        if ($update == 1) {
            $phong = PhongNguoiThue::create([
                "idNguoiThue" => $request->idNguoiThue,
                "idPhong" => $request->idPhong
            ]);
            // Tìm tới phòng có id phòng đã thêm vào danh sách phòng trọ của người thuê và update hoạt động thành 0 để phòng ẩn phía người dùng
            PhongTro::where("id", $phong->idPhong)->update(["hoatDong"=>1]);
            // Tạo thông bao thành công gửi lại cho người dùng
            $thongBaoThanhCong = ThongBao::create([
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
                $itemThongBaoThatBai = ThongBao::create([
                    'idTaiKhoanGui' => $request->myIdTaiKhoan,
                    'idTaiKhoanNhan' => $item->idTaiKhoanGui,
                    'tieuDe' => "Đặt phòng thất bại",
                    'noiDung' => "Đã có người đặt phòng trước",
                    'trangThai' => 0,
                    'trangThaiNhan' => 0,
                ]);
                array_push($thongBaoThatBai, $itemThongBaoThatBai);
            }
            $resDL = YeuCauDatPhong::where([["id", "<>", $request->id], ["idPhong", $request->idPhong]])->delete();
            if ($resDL == 0) {
                return json_encode(["result" => 1, "thongBaoThanhCong" => $thongBaoThanhCong, "loai" => 1,  "string" => "Xác nhận thành công"]); // delete thất bại code 100
            } else {
                $result = 1;
            }
        } else {
            return json_encode(["result" => 101, "string" => "Thêm người thuê vào phòng thất bại"]); // thêm người thuê vào phòng  thất bại
        }
        return json_encode(["result" => $result, "loai" => 2, "thongBaoThanhCong" => $thongBaoThanhCong, "thongBaoThatBai" => $thongBaoThatBai, "string" => "Xác nhận thành công"]);
    }
    public function layDuLieuDatPhongAPI(Request $request){
        return YeuCauDatPhong::where("idTaiKhoanGui", $request->idTaiKhoanGui)->first();
    }
}
