<?php

namespace App\Http\Controllers;

use App\Models\PhongTroGoiY;
use Illuminate\Http\Request;

class PhongTroGoiYController extends Controller
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
    public function show(PhongTroGoiY $phongTroGoiY)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PhongTroGoiY $phongTroGoiY)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhongTroGoiY $phongTroGoiY)
    {
        //
    }
    function capNhatPhongGoiY(Request $request) {
        $phongTroGoiY = PhongTroGoiY::where('idTaiKhoan','=',$request->idTaiKhoan)->first();
        if(isset($phongTroGoiY)){
            $idQuan = $request->idQuan;
            $tienCoc = $request->tienCoc;
            $gioiTinh = $request->gioiTinh;
            return $phongTroGoiY->update(['idQuan'=>$idQuan,'tienCoc'=>$tienCoc,'gioiTinh'=>$gioiTinh]);
        }
        return false;
    }
}
