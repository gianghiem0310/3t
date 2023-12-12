<?php

namespace App\Http\Controllers;

use App\Models\FirebaseCloudMessaging;
use Illuminate\Http\Request;

class FirebaseCloudMessagingController extends Controller
{
    public function getAllTokenDeviceOfAccountAPI(Request $request){
        return FirebaseCloudMessaging::where("idTaiKhoan", $request->idTaiKhoan)->get();
    }

    public function saveTokenDeviceAPI(Request $request)
    {
        $result = null;
        $count = FirebaseCloudMessaging::where([
            ["token", $request->token],
            ["idTaiKhoan", $request->idTaiKhoan],
        ])->count();
        if ($count == 0) {
            $result = FirebaseCloudMessaging::create([
                "token" => $request->token,
                "idTaiKhoan"=>$request->idTaiKhoan
            ]);
        }
        

        return $result;
    }
    public function deleteTokenDeviceOfAccountWhenLogOutAPI(Request $request)
    {
        $result = FirebaseCloudMessaging::where([
            ["token", $request->token]
        ])->delete();
        return $result;
    }
}
