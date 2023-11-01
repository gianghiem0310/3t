<?php

namespace App\Http\Controllers;

use App\Models\ThongBao;
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
    public function layTatCaThongBaoTheoIDNguoiNhanAPI(Request $request)
    {
        return ThongBao::layTatCaThongBaoTheoIDNguoiNhan($request->idTaiKhoanNhan);
    }
    //Start Kiet
    public function chitietThongBao(Request $request)
    {
        ThongBao::where('id', $request->id)->update(['trangThai' => 1]);
        return ThongBao::where('id', $request->id)->first();
    }
    //End Kiet
}
