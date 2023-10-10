<?php

namespace App\Http\Controllers;

use App\Models\PhongTro;
use Illuminate\Http\Request;

class PhongTroController extends Controller
{
    public static function xoaPhongTheoIdAPI(Request $request){
        return PhongTro::where('id', $request->id)->delete();
    }
}
