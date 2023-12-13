<?php

namespace App\Http\Controllers;

use App\Models\NguoiThue;
use App\Models\PhongNguoiThue;
use App\Models\YeuCauDatPhong;
use Illuminate\Http\Request;

class PhongNguoiThueController extends Controller
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
    public function show(PhongNguoiThue $phongNguoiThue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PhongNguoiThue $phongNguoiThue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhongNguoiThue $phongNguoiThue)
    {
        //
    }

    public function latTatCaNguoiThueTheoIDPhongAPI(Request $request){
        return PhongNguoiThue::layNguoiThueTheoIDPhong($request->idPhong);
    }
    public function layPhongCuaNguoiThueAPI(Request $request){
        return PhongNguoiThue::where("idNguoiThue", $request->idNguoiThue)->first();
    }
    public function xoaPhongCuaNguoiThueAPI(Request $request){
        YeuCauDatPhong::where("idTaiKhoanGui", $request->idTaiKhoan)->delete();
        return PhongNguoiThue::where("idNguoiThue", $request->idNguoiThue)->delete();
    }
}
