<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongNguoiThue extends Model
{
    use HasFactory;
    protected $fillable = [
        'idNguoiThue',
        'idPhong'
    ];
    
    public function nguoiThue(){
        $this->setAttribute("nguoiThue", $this->hasOne(NguoiThue::class, "id",  "idNguoiThue")->first());
    }

    public static function layNguoiThueTheoIDPhong($idPhong){
        $result = self::where('idPhong', $idPhong)->get();

        foreach ($result as $item){
            $item->nguoiThue();
        }

        return $result;
    }
}
