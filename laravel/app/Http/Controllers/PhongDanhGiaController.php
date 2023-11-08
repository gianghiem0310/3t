<?php

namespace App\Http\Controllers;

use App\Models\PhongDanhGia;
use Illuminate\Http\Request;

class PhongDanhGiaController extends Controller
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
    public function show(PhongDanhGia $phongDanhGia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PhongDanhGia $phongDanhGia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhongDanhGia $phongDanhGia)
    {
        //
    }
    public function danhGiaAPI(Request $request)
    {
        $result = null;
        $find = PhongDanhGia::where([
            "idTaiKhoan" => $request->idTaiKhoan,
            "idPhong" => $request->idPhong
        ])->first();
        if ($find == null) {
            $result = PhongDanhGia::create([
                "idTaiKhoan" => $request->idTaiKhoan,
                "idPhong" => $request->idPhong,
                "danhGia" => $request->danhGia
            ]);
        } else {
            $result = PhongDanhGia::where([
                ["idTaiKhoan", $request->idTaiKhoan],
                ["idPhong", $request->idPhong]
            ])->update([
                "danhGia" => $request->danhGia
            ]);
        }
       return $result != null; // 1=true, 0=false
    }
}
