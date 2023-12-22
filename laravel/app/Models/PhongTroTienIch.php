<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongTroTienIch extends Model
{
    use HasFactory;
    protected $fillable = [
        'idPhong',
        'idTienIch'
    ];

    public function joinTienIch(){
        $this->setAttribute("tienIchSeleted", $this->hasOne(TienIch::class, "id", "idTienIch")->first());
    }

    public static function layTatCaTienIchDaChon($idPhong){
        $res = self::where("idPhong", $idPhong)->get();
        foreach ($res as $item) {
            $item->joinTienIch();
        }
        return $res;
    }
}
