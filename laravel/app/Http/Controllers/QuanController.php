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
            $image_name = 'images/' . time() . '-' . 'quan' . '.'. $image_quan->extension();
            $image_quan->move(public_path('images'), $image_name);
            $ten = $request->tenQuan;
            $trangThai = $request->trangThai;
            return $quan->update(['tenQuan'=>$ten,'hinh'=>$image_name,'trangThai'=>$trangThai]);
        }
        return null;

    }
    public function layTatCaQuan()  {
        return Quan::all();
    }
    public function layTatCaQuanAPI()  {
        return Quan::all();
    }
   
    //END: NGUYEN GIA NGHIEM
}
