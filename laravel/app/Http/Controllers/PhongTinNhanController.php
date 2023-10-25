<?php

namespace App\Http\Controllers;

use App\Models\PhongTinNhan;
use Illuminate\Http\Request;

class PhongTinNhanController extends Controller
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
    public function show(PhongTinNhan $phongTinNhan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PhongTinNhan $phongTinNhan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhongTinNhan $phongTinNhan)
    {
        //
    }
    //Start Nghiem
    public function layIdPhongTinNhan(Request $request) {
        $phongTn = PhongTinNhan::where(['idTaiKhoan1'=>$request->idTaiKhoan1])->where(['idtaiKhoan2'=>$request->idTaiKhoan2])->orWhere(['idTaiKhoan1'=>$request->idTaiKhoan2])->where(['idTaiKhoan2'=>$request->idTaiKhoan1])->first();
        return $phongTn;
    }
    public function layDanhSachTinNhanTheoIdTaiKhoan(Request $request)  {
        $phongTn = PhongTinNhan::layDanhSachThongTin($request->idTaiKhoan);
        return $phongTn;
    }
    public  function capNhatTinNhanMoiNhat(Request $request) {
        $phongTn = PhongTinNhan::find($request->id);
        if(isset($phongTn)){
            $tinNhanMoiNhat = $request->tinNhanMoiNhat;
            $thoiGian = $request->thoiGian;
            return $phongTn->update(['tinNhanMoiNhat'=>$tinNhanMoiNhat,'thoiGianCuaTinNhan'=>$thoiGian]);
        }
        return false;
    }
    public function capNhatTrangThaiDaXem(Request $request) {
     
        $idTaiKhoan = $request->idTaiKhoan;
        $idPhong = $request->idPhong;
        $phongTn = PhongTinNhan::find($idPhong);
        if(isset($phongTn)){
            if($phongTn->idTaiKhoan1==$idTaiKhoan){
               
                $phongTn->update(['trangThai1'=>1]);
                return $phongTn;
            }
            else if($phongTn->idTaiKhoan2==$idTaiKhoan){
                $phongTn->update(['trangThai2'=>1]);
                return $phongTn;
            }
        }
        return false;
    }
    //End nghiem
}
