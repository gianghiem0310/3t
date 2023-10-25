<?php

namespace App\Http\Controllers;

use App\Models\NguoiThue;
use Illuminate\Http\Request;

class NguoiThueController extends Controller
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
    public function show(NguoiThue $nguoiThue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NguoiThue $nguoiThue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NguoiThue $nguoiThue)
    {
        //
    }

    
    //Start Nghiem Part 2
    public function layThongTinNguoiThueTheoId(Request $request)  {
        return NguoiThue::where('idTaiKhoan','=',$request->idTaiKhoan)->first();
    }
    //End Nghiem Part 2
}
