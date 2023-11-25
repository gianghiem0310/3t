<?php

namespace App\Http\Controllers;

use App\Models\Quan;
use Illuminate\Http\Request;

class QuanController extends Controller
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
    public function show(Quan $quan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quan $quan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quan $quan)
    {
        //
    }
    //START: NGUYEN GIA NGHIEM
    public function themQuan(Request $request) 
    {
        $image_quan = $request->hinh;
        $image_name = 'images/' . time() . '-' . 'quan' . '.'. $image_quan->extension();
        $image_quan->move(public_path('images'), $image_name);
        $ten = $request->tenQuan;
        return Quan::create(['tenQuan'=>$ten,'hinh'=>$image_name,'trangThai'=>0]);
    }
    public function capNhatQuan(Request $request) {
        $quan = Quan::find($request->id);
        if(isset($quan)){
            $image_quan = $request->hinh;
            $ten = $request->tenQuan;
            $trangThai = $request->trangThai;
            if(isset($image_quan)){
                $image_name = 'images/' . time() . '-' . 'quan' . '.'. $image_quan->extension();
                $image_quan->move(public_path('images'), $image_name);
                return $quan->update(['tenQuan'=>$ten,'hinh'=>$image_name,'trangThai'=>$trangThai]);
            }else{
                return $quan->update(['tenQuan'=>$ten,'trangThai'=>$trangThai]);
            }
        }
        return null;
    }
    
    public function capNhatTrangThaiQuan(Request $request) {
        $quan = Quan::find($request->id);
        if(isset($quan)){
            if($quan->trangThai==0){
                return $quan->update(['trangThai'=>1]);
            }else{
                return $quan->update(['trangThai'=>0]);
            }
        }
    }
    public function layTatCaQuan()  {
        return Quan::all();
    }
    public function layTatCaQuanAPI()  {
        return Quan::all();
    }
    public function layTatCaQuanHoatDongAPI(Request $request) {
        return Quan::where("trangThai", 0)->get();
    }
    
    public function layTatCaQuanTheoID(Request $request)  {
        return Quan::find($request->id);
    }
   
    //END: NGUYEN GIA NGHIEM
}
