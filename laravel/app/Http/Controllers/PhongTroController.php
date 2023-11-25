<?php

namespace App\Http\Controllers;

use App\Models\ChuTro;
use App\Models\HinhAnh;
use App\Models\PhongNguoiThue;
use App\Models\PhongTro;
use App\Models\PhongTroChuTro;
use App\Models\PhongTroTienIch;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;

class PhongTroController extends Controller
{
    public static function xoaPhongTheoIdAPI(Request $request)
    {
        return PhongTro::where('id', $request->id)->delete();
    }
    public function themPhongAPI(Request $request)
    {
        $phong = PhongTro::create([
            'soPhong' => $request->soPhong != null ? $request->soPhong : -1,
            'gia' => $request->gia != null ? $request->gia : -1,
            'dienTich' => $request->dienTich != null ? $request->dienTich : -1,
            'moTa' => $request->moTa != null ? $request->moTa : -1,
            'idQuan' => $request->idQuan != null ? $request->idQuan : -1,
            'idPhuong' => $request->idPhuong != null ? $request->idPhuong : -1,
            'diaChiChiTiet' => $request->diaChiChiTiet != null ? $request->diaChiChiTiet : -1,
            'loaiPhong' => $request->loaiPhong != null ? $request->loaiPhong : 0,
            'soLuongToiDa' => $request->soLuongToiDa != null ? $request->soLuongToiDa : -1,
            'tienCoc' => $request->tienCoc != null ? $request->tienCoc : -1,
            'gioiTinh' => $request->gioiTinh != null ? $request->gioiTinh : -1,
            'tienDien' => $request->tienDien != null ? $request->tienDien : -1,
            'tienNuoc' => $request->tienNuoc != null ? $request->tienNuoc : -1,
            'hoatDong' => 0,
        ]);
        if ($phong == null) {
            return 0;
        }
        if ($request->hinh && $phong != null) {
            $files[] = $request->hinh;
            $images = $files[0];

            foreach ($images as $key => $value) {
                $image_name = 'images/' . self::myRandom() . now()->getTimestampMs() . '-' . 'hinhphong' . '.' . $value->extension();
                $value->move(public_path('images'), $image_name);
                HinhAnh::create(['idPhong' => $phong->id, 'hinh' => $image_name]);
            }
        }
        if ($request->tienIch && $phong != null) {
            $jsonList = $request->tienIch;
            $list = json_decode($jsonList, true);

            foreach ($list as $key => $value) {
                PhongTroTienIch::create([
                    'idPhong' => $phong->id,
                    'idTienIch' => $value["id"]
                ]);
            }
        }
        if ($phong) {
            $phongChu = PhongTroChuTro::create([
                'idChuTro' => $request->idChuTro,
                'idPhongTro' => $phong->id
            ]);
            if ($phongChu == null) {
                return 0;
            }
        }
        return 1;
    }
    public function themPhongWebAPI(Request $request)
    {
        $phong = PhongTro::create([
            'soPhong' => $request->soPhong != null ? $request->soPhong : -1,
            'gia' => $request->gia != null ? $request->gia : -1,
            'dienTich' => $request->dienTich != null ? $request->dienTich : -1,
            'moTa' => $request->moTa != null ? $request->moTa : -1,
            'idQuan' => $request->idQuan != null ? $request->idQuan : -1,
            'idPhuong' => $request->idPhuong != null ? $request->idPhuong : -1,
            'diaChiChiTiet' => $request->diaChiChiTiet != null ? $request->diaChiChiTiet : -1,
            'loaiPhong' => $request->loaiPhong != null ? $request->loaiPhong : 0,
            'soLuongToiDa' => $request->soLuongToiDa != null ? $request->soLuongToiDa : -1,
            'tienCoc' => $request->tienCoc != null ? $request->tienCoc : -1,
            'gioiTinh' => $request->gioiTinh != null ? $request->gioiTinh : -1,
            'tienDien' => $request->tienDien != null ? $request->tienDien : -1,
            'tienNuoc' => $request->tienNuoc != null ? $request->tienNuoc : -1,
            'hoatDong' => 0,
        ]);
        if ($phong == null) {
            return 0;
        }
        if ($request->hinh && $phong != null) {
            $files[] = $request->hinh;
            $images = $files[0];

            foreach ($images as $key => $value) {
                $image_name = 'images/' . self::myRandom() . now()->getTimestampMs() . '-' . 'hinhphong' . '.' . $value->extension();
                $value->move(public_path('images'), $image_name);
                HinhAnh::create(['idPhong' => $phong->id, 'hinh' => $image_name]);
            }
        }
        if ($request->tienIch && $phong != null) {
            $jsonList = $request->tienIch;
            $list = json_decode($jsonList, true);

            foreach ($list as $key => $value) {
                PhongTroTienIch::create([
                    'idPhong' => $phong->id,
                    'idTienIch' => $value
                ]);
            }
        }
        if ($phong) {
            $phongChu = PhongTroChuTro::create([
                'idChuTro' => $request->idChuTro,
                'idPhongTro' => $phong->id
            ]);
            if ($phongChu == null) {
                return 0;
            }
        }
        return 1;
    }

    public function suaPhongAPI(Request $request)
    {
        PhongTro::where('id', $request->idPhong)->update([
            'soPhong' => $request->soPhong != null ? $request->soPhong : -1,
            'gia' => $request->gia != null ? $request->gia : -1,
            'dienTich' => $request->dienTich != null ? $request->dienTich : -1,
            'moTa' => $request->moTa != null ? $request->moTa : -1,
            'idQuan' => $request->idQuan != null ? $request->idQuan : -1,
            'idPhuong' => $request->idPhuong != null ? $request->idPhuong : -1,
            'diaChiChiTiet' => $request->diaChiChiTiet != null ? $request->diaChiChiTiet : -1,
            'loaiPhong' => $request->loaiPhong != null ? $request->loaiPhong : 0,
            'soLuongToiDa' => $request->soLuongToiDa != null ? $request->soLuongToiDa : -1,
            'tienCoc' => $request->tienCoc != null ? $request->tienCoc : 0,
            'gioiTinh' => $request->gioiTinh != null ? $request->gioiTinh : -1,
            'tienDien' => $request->tienDien != null ? $request->tienDien : -1,
            'tienNuoc' => $request->tienNuoc != null ? $request->tienNuoc : -1,
            'hoatDong' => 0,
        ]);
        // Thêm mới hình
        if ($request->hinh) {
            $files[] = $request->hinh;
            $images = $files[0];

            foreach ($images as $key => $value) {
                $image_name = 'images/' . self::myRandom() . now()->getTimestampMs() . '-' . 'hinhphong' . '.' . $value->extension();
                $value->move(public_path('images'), $image_name);
                HinhAnh::create(['idPhong' => $request->idPhong, 'hinh' => $image_name]);
            }
        }
        PhongTroTienIch::where("idPhong", $request->idPhong)->delete();
        if ($request->tienIch) {
            $jsonList = $request->tienIch;
            $list = json_decode($jsonList, true);

            foreach ($list as $key => $value) {
                PhongTroTienIch::create([
                    'idPhong'  => $request->idPhong,
                    'idTienIch' => $value["id"]
                ]);
            }
        }
        return 1;
    }


    public function layThongTinPhongTheoIDAPI(Request $request)
    {
        return PhongTro::layyPhongTroTheoID($request->id);
    }
    public function myRandom()
    {
        // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $string = str_shuffle($pin);
        return $string;
    }
    public function thongTinChiTietPhong(Request $request)
    {
        return PhongTro::layThongTinPhong($request->idPhong);
    }


    public function layTatCaPhongPhanTrangAPI(Request $request)
    {
        return PhongTro::layTatCaPhong($request->loaiPhong, $request->arrange);
    }
    public function layTatCaPhongTroTheQuanAPI(Request $request)
    {
        return PhongTro::layPhongTroTheoQuan($request->idQuan, $request->arrange);
    }
    public function layRandomPhongAPI(Request $request)
    {
        return PhongTro::randomPhong();
    }

    // Minh bật tắt hoạt dộng phòng
    public function batTatHoatDongPhongAPI(Request $request)
    {
        //  nếu hoạt động gửi lên là 0: không hoạt động
        if ($request->hoatDong == 0) {
            // TH1 phòng trống
            if (PhongNguoiThue::where('idPhong', $request->idPhong)->count() == 0) {
                return PhongTro::where('id', $request->idPhong)->update(['hoatDong' => $request->hoatDong]);
            } 
            // TH2 Phòng có người thuê
            else {
                return 100;//Đã có ít nhất 1 người thuê
            }
        }
        // Nếu hoạt động gửi lên là 1: hoạt động
        else {
            // TH1: Đã đăng ký gói
            if (ChuTro::layThongTinGoi($request->idChuTro)->goi != null){
                // Số lượng phòng hiện hoạt động nhỏ hơn số lượng phòng tối đa của gói
                if (ChuTro::layThongTinGoi($request->idChuTro)->goi->soLuongPhongToiDa > PhongTroChuTro::demPhongHoatDongCuaChuTro($request->idChuTro)){
                    return PhongTro::where('id', $request->idPhong)->update(['hoatDong' => $request->hoatDong]);
                }
                // Số lượng phòng hoạt động bằng số lượng phòng tối đa có thể đăng
                else{
                    return 101;
                }
            }
            // TH2 chưa đăng ký gói dịch vụ
            else {
                return 102;
            }
        }
    }

    public function layDanhSachPhongGoiY(Request $request)
    {
        return PhongTro::danhSachPhongGoiY($request->idTaiKhoan);
    }
}
