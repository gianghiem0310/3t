<?php

namespace App\Http\Controllers;

use App\Models\ThongBao;
use App\Models\YeuCauDatPhong;
use Illuminate\Http\Request;

class ThongBaoController extends Controller
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
    public function show(ThongBao $thongBao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ThongBao $thongBao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ThongBao $thongBao)
    {
        //
    }
    public function themThongBao(Request $request)
    {
        return ThongBao::create([
            'idTaiKhoanGui' => $request->idTaiKhoanGui,
            'idTaiKhoanNhan' => $request->idTaiKhoanNhan,
            'noiDung' => $request->noiDung,
            'trangThai' => $request->trangThai,
            'trangThaiNhan' => $request->trangThaiNhan,
        ]);
    }
    public function layTatCaThongBaoTheoIDNguoiNhanAPI(Request $request)
    {
        return ThongBao::layTatCaThongBaoTheoIDNguoiNhan($request->idTaiKhoanNhan);
    }
    public function laySoLuongThongBaoCuaTaiKhoanAPI(Request $request)
    {
        return ThongBao::where([
            ['idTaiKhoanNhan', $request->idTaiKhoan],
            ['trangThai', 0]
        ])->count();
    }
    public function demTongSoThongBaoAPI(Request $request)
    {
        return ThongBao::where([
            ['idTaiKhoanNhan', $request->idTaiKhoan],
            ['trangThai', 0]
        ])->count() + YeuCauDatPhong::where([
            ["idTaiKhoanNhan", $request->idTaiKhoan],
            ["trangThaiThongBao", 0]
        ])->count();;
    }

    //Start Kiet
    public function chitietThongBao(Request $request)
    {
        ThongBao::where('id', $request->id)->update(['trangThai' => 1]);
        return ThongBao::where('id', $request->id)->first();
    }
    public function xoaThongBao(Request $request)
    {
        return ThongBao::where('id', $request->id)->delete();
    }
    //End Kiet
}
