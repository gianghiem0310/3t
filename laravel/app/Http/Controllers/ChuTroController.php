<?php

namespace App\Http\Controllers;

use App\Models\ChuTro;
use Illuminate\Http\Request;

class ChuTroController extends Controller
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
    public function show(ChuTro $chuTro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ChuTro $chuTro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChuTro $chuTro)
    {
        //
    }
    public function layTatCaThongTinChuTroAPI(Request $request)
    {
        return ChuTro::all();
    }
}
