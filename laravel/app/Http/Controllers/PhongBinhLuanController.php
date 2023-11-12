<?php

namespace App\Http\Controllers;

use App\Models\PhongBinhLuan;
use Illuminate\Http\Request;

class PhongBinhLuanController extends Controller
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
    public function show(PhongBinhLuan $phongBinhLuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PhongBinhLuan $phongBinhLuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhongBinhLuan $phongBinhLuan)
    {
        //
    }
    public function layBinhLuanCuaPhongCoPhanTrangAPI(Request $request)
    {
        return PhongBinhLuan::layBinhLuanCuaPhongTheoIDPhong($request->idPhong);
    }
    public function vietBinhLuanCuaPhongAPI(Request $request)
    {
        return PhongBinhLuan::vietComment($request->idPhong, $request->idTaiKhoan, $request->noiDungBinhLuan);
    }
}
