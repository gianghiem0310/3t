<?php

namespace App\Http\Controllers;

use App\Models\PhongTro;
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
                return 0;
            }
        }else{
            return $phongYeuThich->first()->delete();
        }
    }
    public function xemDaYeuThichHayChua(Request $request) {
        $phongYeuThich = PhongTroYeuThich::where('idPhong','=',$request->idPhong)->where('idTaiKhoan','=',$request->idTaiKhoan)->get();
        if(count($phongYeuThich)==0){
            return 0;
        }else{
            return true;
        }
    }
    public function layDanhSachPhongTroYeuThich(Request $request){
        $danhSachPhong = [];
        $danhsachId = PhongTroYeuThich::where('idTaiKhoan','=',$request->idTaiKhoan)->get();
        if(count($danhsachId)!=0){
            foreach ($danhsachId as $value) {
                $phong = PhongTro::find($value->idPhong);
                if($phong->hoatDong==1){
                    $danhSachPhong[]= $phong;
                }
            }
            return $danhSachPhong;
            
        }else{
            return $danhSachPhong;
        }
    }
    public function layTongSoLuotYeuThichCuaPhongTro(Request $request)  {
        return count(PhongTroYeuThich::where('idPhong','=',$request->idPhong)->get());
    }

}
