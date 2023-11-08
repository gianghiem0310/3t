<?php

namespace App\Http\Controllers;

use App\Models\TienIch;
use Illuminate\Http\Request;

class TienIchController extends Controller
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
    public function show(TienIch $tienIch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TienIch $tienIch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TienIch $tienIch)
    {
        //
    }
    //START: NGUYEN GIA NGHIEM
    public function themTienIch(Request $request) {
        $image_tienich = $request->hinh;
        $image_name = 'images/' . time() . '-' . 'tienich' . '.'. $image_tienich->extension();
        $image_tienich->move(public_path('images'), $image_name);
        $ten = $request->ten;
        return TienIch::create(['ten'=>$ten,'hinh'=>$image_name,'trangThai'=>0]);
    }
    public function capNhatTienIch(Request $request) {
        $tienIch = TienIch::find($request->id);
        if(isset($tienIch)){
            $image_tienich = $request->hinh;
            $image_name = 'images/' . time() . '-' . 'tienich' . '.'. $image_tienich->extension();
            $image_tienich->move(public_path('images'), $image_name);
            $ten = $request->ten;
            $trangThai = $request->trangThai;
            return $tienIch->update(['ten'=>$ten,'hinh'=>$image_name,'trangThai'=>$trangThai]);
        }
        return null;

    }
    public function capNhatTrangThaiTienIch(Request $request) {
        $tienich = TienIch::find($request->id);
        if(isset($tienich)){
            if($tienich->trangThai==0){
                return $tienich->update(['trangThai'=>1]);
            }else{
                return $tienich->update(['trangThai'=>0]);
            }
        }
    }

    public function layTienIchTheoId(Request $request)  {
        return TienIch::find($request->id);
    }
    public function layTatCaTienIch(){
        return TienIch::all();
    }


    public function uploadFileAnh(Request $request) {
        $image_tienich = $request->hinh;

        $image_name = 'images/vd/' . $image_tienich->getClientOriginalName();
        $image_tienich->move(public_path('images/vd'), $image_name);
        return TienIch::create(['hinh'=>$image_name]);
    }
//End: Nguyen Gia Nghiem
    
}
