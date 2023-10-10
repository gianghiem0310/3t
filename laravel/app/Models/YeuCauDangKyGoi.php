<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YeuCauDangKyGoi extends Model
{
    use HasFactory;

    public function cuaChuTro()
    {
        $this->setAttribute("chuTro", $this->hasOne(ChuTro::class, 'id', 'idChuTro')->get());
    }

    public function goiDangKy()
    {
        $this->setAttribute("chuTro", $this->hasOne(ChuTro::class, 'idChuTro', 'id')->first());
    }

    public static function danhSachYeuCauDangKy()
    {
        $result = self::all();
        if ($result) {
            foreach ($result as $key) {
                $result->cuaChuTro();
            }
        }
        return $result;
    }
}
