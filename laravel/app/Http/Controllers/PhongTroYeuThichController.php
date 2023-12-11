<?php

namespace App\Http\Controllers;

use App\Models\PhongTroYeuThich;
use Illuminate\Http\Request;

class PhongTroYeuThichController extends Controller
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
    public function show(PhongTroYeuThich $phongTroYeuThich)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PhongTroYeuThich $phongTroYeuThich)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhongTroYeuThich $phongTroYeuThich)
    {
        //
    }
    public function capNhatYeuThichPhongTro(Request $request) {
        $phongYeuThich = PhongTroYeuThich::where('idPhong','=',$request->idPhong)->where('idTaiKhoan','=',$request->idTaiKhoan)->get();
        if(count($phongYeuThich)==0){
            if(PhongTroYeuThich::create(['idTaiKhoan'=>$request->idTaiKhoan,'idPhong'=>$request->idPhong])){
                return true;
            }else{
                return false;
            }
        }else{
            return $phongYeuThich->first()->delete();
        }
    }
    public function layDanhSachPhongTroYeuThich(Request $request){
        return PhongTroYeuThich::where('idTaiKhoan','=',$request->idTaiKhoan)->get();
    }
    public function layTongSoLuotYeuThichCuaPhongTro(Request $request)  {
        return count(PhongTroYeuThich::where('idPhong','=',$request->idPhong)->get());
    }

}
