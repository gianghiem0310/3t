<?php

namespace App\Http\Controllers;

use App\Models\NguoiThue;
use Illuminate\Http\Request;

class NguoiThueController extends Controller
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
    public function show(NguoiThue $nguoiThue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NguoiThue $nguoiThue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NguoiThue $nguoiThue)
    {
        //
    }
    public function layChiTietNguoiThueAPI(Request $request){
        return NguoiThue::where("id", $request->id)->first();
    }
    public function layThongTinNguoiThueTheoId(Request $request)  {
        return NguoiThue::where('idTaiKhoan','=',$request->idTaiKhoan)->first();
    }

    public function capNhatThongTinNguoiThueCoHinh(Request $request)
    {
        $nguoiThue = NguoiThue::where('idTaiKhoan', '=', $request->idTaiKhoan)->first();
        if (isset($nguoiThue)) {
            $image = $request->hinh;
            $image_name = 'images/' . time() . '-' . 'nguoithue' . '.' . $image->extension();
            $image->move(public_path('images'), $image_name);
            $tenNguoiThue = $request->ten;
            $soDienThoai = $request->soDienThoai;
            return $nguoiThue->update(['ten' => $tenNguoiThue, 'hinh' => $image_name, 'soDienThoai' => $soDienThoai]);
        }
        return false;
    }
    public function capNhatThongTinNguoiThueKhongHinh(Request $request)
    {
        $nguoiThue = NguoiThue::where('idTaiKhoan', '=', $request->idTaiKhoan)->first();
        if (isset($nguoiThue)) {
            $tenNguoiThue = $request->ten;
            $soDienThoai = $request->soDienThoai;
            return $nguoiThue->update(['ten' => $tenNguoiThue, 'soDienThoai' => $soDienThoai]);
        }
        return false;
    }
}
