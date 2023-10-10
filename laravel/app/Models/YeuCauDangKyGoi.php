<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YeuCauDangKyGoi extends Model
{
    use HasFactory;

    public function cuaChuTro()
    {
        $this->setAttribute("chuTro", $this->hasOne(ChuTro::class, 'id', 'idChuTro')->first());
    }






    public function goiDangKy()
    {
        $this->setAttribute("goiDangKy", $this->hasOne(Goi::class, 'id', 'idGoi')->first());
    }

    public static function danhSachYeuCauDangKy()
    {
        $result = self::all();
        if ($result) {
            foreach ($result as $item) {
                $item->cuaChuTro();
                $item->goiDangKy();
            }
        }
        return $result;
    }
}
