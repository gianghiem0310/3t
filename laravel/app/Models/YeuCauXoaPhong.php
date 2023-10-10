<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YeuCauXoaPhong extends Model
{
    use HasFactory;

    public function cuaChuTro()
    {
        $this->setAttribute("chuTro", $this->hasOne(ChuTro::class, 'id', 'idChuTro')->first());
    }

    public function xoaPhong()
    {
        $this->setAttribute("phongtro", $this->hasOne(PhongTro::class, 'id', 'idPhong')->first());
    }

    public static function danhSachYeuCauXoaPhong()
    {
        $result = self::all();

        if ($result) {
            foreach ($result as $item) {
                $item->cuaChuTro();
                $item->xoaPhong();
            }
        }
        return $result;
    }

    public static function thongTinYeuCauXoaPhong($id)
    {
        $result = self::where('id', $id)->first();

        $result->cuaChuTro();
        $result->xoaPhong();
        return $result;
    }
}
