<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
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
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        //
    }

    public static function layTatCaBannerAPI(){
        return Banner::all();
    }

    public static function themHinhAPI(Request $request){
        $image = $request->hinh;
        $image_name = 'images/' . time() . '-' . 'banner' . '.'. $image->extension();
        $image->move(public_path('images'), $image_name);
        if(Banner::create(['hinhBanner' => $image_name]))
        {
            return true;
        }
        return false;

    }
    public static function suaHinhAPI(Request $request){
        $image = $request->hinh;
        $image_name = 'images/' . time() . '-' . 'banner' . '.'. $image->extension();
        $image->move(public_path('images'), $image_name);
        if(  Banner::where('id', $request->id)->update(['hinhBanner' => $image_name])){
            return true;
        }
        return false;

    }


    public static function xoaHinhAPI(Request $request){
      return Banner::where('id', $request->id)->delete();
    }
	
	 
}
