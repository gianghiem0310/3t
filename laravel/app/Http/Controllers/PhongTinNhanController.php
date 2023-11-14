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
    public function taoPhongTinNhan(Request $request) {
        $idTaiKhoan1 = $request->idTaiKhoan1;
        $idTaiKhoan2 = $request->idTaiKhoan2;
        return PhongTinNhan::create(['idTaiKhoan1'=>$idTaiKhoan1,'idTaiKhoan2'=>$idTaiKhoan2,"tinNhanMoiNhat"=>"",'trangThai1'=>1,'trangThai2'=>0]);
    }
    public function layIdPhongTinNhan(Request $request) {
        $phongTn = PhongTinNhan::where(['idTaiKhoan1'=>$request->idTaiKhoan1])->where(['idtaiKhoan2'=>$request->idTaiKhoan2])->orWhere(['idTaiKhoan1'=>$request->idTaiKhoan2])->where(['idTaiKhoan2'=>$request->idTaiKhoan1])->get();
        if(count($phongTn)!=0){
            return $phongTn->first()->id;
        }else{
            return -1;
        }
    }
    public function layDanhSachTinNhanTheoIdTaiKhoan(Request $request)  {
        $phongTn = PhongTinNhan::layDanhSachThongTin($request->idTaiKhoan);
        return $phongTn;
    }
    public  function capNhatTinNhanMoiNhat(Request $request) {
        $phongTn = PhongTinNhan::find($request->id);
        $idSender = $request->idTaiKhoan;
        if(isset($phongTn)){
            $tinNhanMoiNhat = $request->tinNhanMoiNhat;
            $thoiGian = $request->thoiGian;
            if($phongTn->idTaiKhoan1==$idSender){
                return $phongTn->update(['tinNhanMoiNhat'=>$tinNhanMoiNhat,'thoiGianCuaTinNhan'=>$thoiGian,'trangThai2'=>0]);
            }
            return $phongTn->update(['tinNhanMoiNhat'=>$tinNhanMoiNhat,'thoiGianCuaTinNhan'=>$thoiGian,'trangThai1'=>0]);
        }
        return false;
    }
    public function capNhatTrangThaiDaXem(Request $request) {
     
        $idTaiKhoan = $request->idTaiKhoan;
        $idPhong = $request->idPhong;
        $phongTn = PhongTinNhan::find($idPhong);
        if(isset($phongTn)){
            if($phongTn->idTaiKhoan1==$idTaiKhoan&&$phongTn->trangThai1==0){
                $phongTn->update(['trangThai1'=>1]);
                return $phongTn;
            }
            else if($phongTn->idTaiKhoan2==$idTaiKhoan&&$phongTn->trangThai2==0){
                $phongTn->update(['trangThai2'=>1]);
                return $phongTn;
            }
        }
        return false;
    }
    //End nghiem
}
