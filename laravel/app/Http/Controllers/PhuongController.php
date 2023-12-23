<?php

namespace App\Http\Controllers;

use App\Models\Phuong;
use Illuminate\Http\Request;

class PhuongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
    public function show(Phuong $phuong)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Phuong $phuong)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Phuong $phuong)
    {
        //
    }
    //START: NGUYEN GIA NGHIEM


    public function themPhuong(Request $request)
    {
        $ten = $request->tenPhuong;
        $idQuan = $request->idQuan;
        return Phuong::create(['tenPhuong' => $ten, 'idQuan' => $idQuan, 'trangThai' => 0]);
    }
    public function capNhatPhuong(Request $request)
    {
        $phuong = Phuong::find($request->id);
        if (isset($phuong)) {
            $ten = $request->tenPhuong;
            $idQuan = $request->idQuan;
            $trangThai = $request->trangThai;
            return $phuong->update(['tenPhuong' => $ten, 'idQuan' => $idQuan, 'trangThai' => $trangThai]);
        }
        return null;
    }
    public function capNhatTrangThaiPhuong(Request $request) {
        $phuong = Phuong::find($request->id);
        if(isset($phuong)){
            if($phuong->trangThai==0){
                return $phuong->update(['trangThai'=>1]);
            }else{
                return $phuong->update(['trangThai'=>0]);
            }
            // return $phuong;
        }
    }
    public function layTatCaPhuong()
    {
        return Phuong::all();
    }
    public function layTatCaPhuongHoatDongAPI(Request $request) {
        return Phuong::where([["trangThai", 0],["idQuan", $request->idQuan]])->get();
    }

    //END: NGUYEN GIA NGHIEM

    public function layPhuongTheoIDQuanAPI(Request $request){
        return Phuong::where("idQuan", $request->idQuan)->get();
    }
    public function layPhuongTheoID(Request $request)  {
        return Phuong::find($request->id);
    }
}
