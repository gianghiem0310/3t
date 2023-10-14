<?php

namespace App\Http\Controllers;

use App\Models\XacThucChuTro;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class XacThucChuTroController extends Controller
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
    public function show(XacThucChuTro $xacThucChuTro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, XacThucChuTro $xacThucChuTro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(XacThucChuTro $xacThucChuTro)
    {
        //
    }
    public function layTatCaYeuCauXacThucAPI(){
        return XacThucChuTro::layTatCaYeuCauXacThucChuTro(); //
    }
    public function xacThucYeuCauTheoIdChuTroAPI(Request $request)
    {
        return XacThucChuTro::where(['idChuTro' => $request->idChuTro])->update(['trangThaiXacThuc'=>1]);
    }

    public function layThongTinYeuCauXacThucAPI(Request $request){
        return XacThucChuTro::layThongTinYeuCauXacThuc($request->idChuTro);
    }
    public  function  xoaYeuXauXacThucAPI(Request $request){
        return XacThucChuTro::where(['idChuTro' => $request->idChuTro])->delete();
    }
}
