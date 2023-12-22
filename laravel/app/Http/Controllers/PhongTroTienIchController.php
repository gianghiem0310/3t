<?php

namespace App\Http\Controllers;

use App\Models\PhongTroTienIch;
use App\Models\TienIch;
use Illuminate\Http\Request;

class PhongTroTienIchController extends Controller
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
    public function show(PhongTroTienIch $phongTroTienIch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PhongTroTienIch $phongTroTienIch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhongTroTienIch $phongTroTienIch)
    {
        //
    }
    public function deleteTienIchOfRoomAPI(Request $request){
        return PhongTroTienIch::where([
            ["idPhong", $request->idPhong],
            ["idTienIch", $request->idTienIch]
        ])->delete();
    }
    public function getTienIchSeletedOfRoomAPI(Request $request){
        return PhongTroTienIch::layTatCaTienIchDaChon($request->idPhong);
    }
}
