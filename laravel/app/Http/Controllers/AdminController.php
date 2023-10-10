<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
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
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }

    //Start: Nguyen Gia Nghiem

    public function thongTinAdmin(Request $request) 
    {
        return Admin::find($request->id);
    }
    public function capNhatThongTinAdmin(Request $request)
    {
        $admin = Admin::find($request->id);
        if(isset($admin)){
            
        }
        return false;
    }

    public function uploadImage(Request $request) {
        $image = $request->hinh;
        $image_name = 'hinh/' . time() . '-' . 'admin' . '.'. $image->extension();
        $image->move(public_path('hinh'), $image_name);
        $admin = Admin::find(1);
        return $admin->update(['hinh' => $image_name]);

    }
    //End: Nguyen Gia Nghiem
}
