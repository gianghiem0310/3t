<?php

namespace App\Http\Controllers;

use App\Models\HinhAnh;
use App\Models\PhongBinhLuan;
use App\Models\PhongDanhGia;
use App\Models\PhongTro;
use App\Models\PhongTroChuTro;
use App\Models\PhongTroTienIch;
use Illuminate\Http\Request;

class PhongTroChuTroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PhongTroChuTro $phongTroChuTro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PhongTroChuTro $phongTroChuTro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhongTroChuTro $phongTroChuTro)
    {
        //
    }

    public static function layDanhSachPhongTheoIDChuTroPhanTrangAPI(Request $request){
        return PhongTroChuTro::layDanhSachPhongTheoIDChuTroPhanTrang($request->idChuTro, $request->page, $request->quantity);
    }
    public static function layDanhSachPhongTheoIDChuTroAPI(Request $request){
        return PhongTroChuTro::layDanhSachPhongTheoIDChuTro($request->idChuTro);
    }
    public function xoaPhongAPI(Request $request)
    {

        $result = PhongTroChuTro::where([
            ["idChuTro" , $request->idChuTro],
            ["idPhongTro" , $request->idPhongTro]
        ])->delete();
        PhongTro::where("id", $request->idPhongTro)->delete();
        HinhAnh::where("idPhong", $request->idPhongTro)->delete();
        PhongTroTienIch::where("idPhong", $request->idPhongTro)->delete();
        PhongBinhLuan::where("idPhong", $request->idPhongTro)->delete();
        PhongDanhGia::where("idPhong", $request->idPhongTro)->delete();
        return $result;
    }
}
