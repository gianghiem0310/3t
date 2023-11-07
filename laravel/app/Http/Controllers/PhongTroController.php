<?php

namespace App\Http\Controllers;

use App\Models\HinhAnh;
use App\Models\PhongTro;
use App\Models\PhongTroChuTro;
use App\Models\PhongTroTienIch;
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
            'tienCoc' => $request->tenCoc != null? $request->tienCoc : -1,
            'gioiTinh' => $request->gioiTinh != null? $request->gioiTinh : -1,
            'tienDien' => $request->tienDien != null? $request->tienDien : -1,
            'tienNuoc' => $request->tienNuoc != null? $request->tienNuoc : -1,
        ]);
        if ($phong == null){
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
        if ($phong){
            $phongChu = PhongTroChuTro::create([
                'idChuTro' => $request->idChuTro,
                'idPhongTro' => $phong->id
            ]);
            if ($phongChu == null){
                return 0;
            }
        }
        return 1;
    }

    public function layThongTinPhongTheoIDAPI(Request $request){
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
}
