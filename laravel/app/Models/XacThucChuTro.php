<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XacThucChuTro extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        "idChuTro",
        "cccdMatTruoc",
        "cccdMatSau",
        "trangThaiXacThuc"
    ];

    public function layThongTinChuTro(){
        $this->setAttribute("chuTro", $this->hasOne(ChuTro::class, 'id', 'idChuTro')->first());
    }

    public static function layTatCaYeuCauXacThucChuTro(){
        $result = self::where("trangThaiXacThuc", 0)->get();

        foreach ($result as $item){
            $item->layThongTinChuTro();
        }

        return $result;
    }

    public static function layThongTinYeuCauXacThuc($idChuTro){
        $result = self::where("idChuTro", $idChuTro)->first();

        $result->layThongTinChuTro();

        return $result;
    }

    
}
