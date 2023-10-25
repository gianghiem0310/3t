<?php

namespace App\Http\Controllers;

use App\Models\ChinhSach;
use Illuminate\Http\Request;

class ChinhSachController extends Controller
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
    public function show(ChinhSach $chinhSach)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ChinhSach $chinhSach)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChinhSach $chinhSach)
    {
        //
    }


    //Start: Nguyen Gia Nghiem
    public function layChinhSachTheoId(Request $request)
    {
        return ChinhSach::find($request->id);
    }

    public function capNhatChinhSach(Request $request)
    {
        $noidung = 'noiDungChinhSach';
        return ChinhSach::where('id',$request->id)->update(['noiDungChinhSach'=>$request->$noidung]);
    }
    //End: Nguyen Gia Nghiem
}
