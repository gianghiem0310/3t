<?php

namespace App\Http\Controllers;

use App\Models\PhongTinNhan;
use App\Models\TinNhan;
use Illuminate\Http\Request;

class TinNhanController extends Controller
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
    public function show(TinNhan $tinNhan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TinNhan $tinNhan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TinNhan $tinNhan)
    {
        //
    }
    //Start Nghiêm
    public function layDanhSachTinNhan(Request $request) {
        return TinNhan::where(['idPhong'=>$request->idPhong])->orderBy('id','asc')->get();
    }
    public function guiTinNhan(Request $request) {
        $idPhong = $request->idPhong;
        $idTaiKhoan = $request->idTaiKhoan;
        $noiDung = $request->noiDung;
        return TinNhan::create(['idPhong'=>$idPhong,'idTaiKhoan'=>$idTaiKhoan,'noiDung'=>$noiDung]);
    }

    public function layAnhVaTenDoiPhuong(Request $request) {
        return PhongTinNhan::thongTinDoiPhuong($request->idSender,$request->idDoiPhuong,$request->idPhong);
    }
    //End nghiêm
}
