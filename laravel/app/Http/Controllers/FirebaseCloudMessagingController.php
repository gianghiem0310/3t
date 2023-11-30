<?php

namespace App\Http\Controllers;

use App\Models\FirebaseCloudMessaging;
use Illuminate\Http\Request;

class FirebaseCloudMessagingController extends Controller
{
    public function saveTokenDevice(Request $request)
    {
        $result = FirebaseCloudMessaging::create([
            "token" => $request->token,
            "idTaiKhoan"=>$request->idTaiKhoan
        ]);
        
        return $result;
    }
}
