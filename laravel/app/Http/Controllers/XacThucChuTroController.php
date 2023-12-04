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
    public function layTatCaYeuCauXacThucAPI()
    {
        return XacThucChuTro::layTatCaYeuCauXacThucChuTro(); //
    }
    public function xacThucYeuCauTheoIdChuTroAPI(Request $request)
    {
        return XacThucChuTro::where(['idChuTro' => $request->idChuTro])->update(['trangThaiXacThuc' => 1]);
    }

    public function layThongTinYeuCauXacThucAPI(Request $request)
    {
        return XacThucChuTro::layThongTinYeuCauXacThuc($request->idChuTro);
    }
    public  function  xoaYeuXauXacThucAPI(Request $request)
    {
        return XacThucChuTro::where(['idChuTro' => $request->idChuTro])->delete();
    }

    public function guiYeuCauXacThucAPI(Request $request)
    {
        $cccdMatTruoc = $request->cccdMatTruoc;
        $cccdMatTruoc_name = 'images/'.self::myRandom()."-" . now()->getTimestampMs() . '-' . 'banner' . '.'. $cccdMatTruoc->extension();
        $cccdMatTruoc->move(public_path('images'), $cccdMatTruoc_name);
        $cccdMatSau = $request->cccdMatSau;
        $cccdMatSau_name = 'images/'.self::myRandom()."-" . now()->getTimestampMs() . '-' . 'banner' . '.'. $cccdMatSau->extension();
        $cccdMatSau->move(public_path('images'), $cccdMatSau_name);
        $result = XacThucChuTro::create([
            "idChuTro" => $request->idChuTro,
            "cccdMatTruoc" => $cccdMatTruoc_name,
            "cccdMatSau" => $cccdMatSau_name,
            "trangThaiXacThuc" => 0,
            'trangThaiNhan' => 0
        ]);
        return $result;
    }

    public function myRandom()
    {
        // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $string = str_shuffle($pin);
        return $string;
    }
}
