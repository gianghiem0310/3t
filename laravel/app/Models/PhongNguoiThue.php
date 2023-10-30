<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongNguoiThue extends Model
{
    use HasFactory;
    public function nguoiThue(){
        $this->setAttribute("nguoiThue", $this->hasOne(NguoiThue::class, "idNguoiThue",  "id"));
    }

    public static function layNguoiThueTheoIDPhong($idNguoiThue){
        $result = self::where('idNguoiThue', $idNguoiThue)->get();
    }
}
