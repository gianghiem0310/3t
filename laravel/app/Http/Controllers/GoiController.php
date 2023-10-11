<?php

namespace App\Http\Controllers;

use App\Models\Goi;
use Illuminate\Http\Request;

class GoiController extends Controller
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
    public function show(Goi $goi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Goi $goi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Goi $goi)
    {
        //
    }
    public function layTatCaGoiAPI(Request $request)
    {
        return Goi::all();
    }

    public function layThongTinChiTietTheoIDGoiAPI(Request $request)
    {
        return Goi::where("id", $request->id)->first();
    }

    public function layTatCaGoiTrangThaiConDungAPI(Request $request)
    {
        return Goi::where('trangThai', 0)->get();
    }

    public function themGoiDichVuAPI(Request $request)
    {

        return Goi::create([
            "thoiHan" => $request->thoiHan,
            "soLuongPhongToiDa" => $request->soLuongPhongToiDa,
            "gia" => $request->gia,
            "trangThai" => 0
        ]);
    }

    public function suaGoiDichVuAPI(Request $request)
    {

        return Goi::where('id', $request->id)->update([
            "thoiHan" => $request->thoiHan,
            "soLuongPhongToiDa" => $request->soLuongPhongToiDa,
            "gia" => $request->gia,
            "trangThai" =>  $request->trangThai
        ]);
    }

    public function khoaGoiDichVuAPI(Request $request)
    {
        
        return Goi::where('id', $request->id)->update([
            
            "trangThai" =>  1
        ]);
    }

    public function moKhoaGoiDichVuAPI(Request $request)
    {
        
        return Goi::where('id', $request->id)->update([
            
            "trangThai" =>  0
        ]);
    }
}
