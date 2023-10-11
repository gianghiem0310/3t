<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YeuCauDangKyGoi extends Model
{
    use HasFactory;

    protected $fillable = [
        'trangThaiXacThuc'
    ];

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
        $result = self::where('trangThaiXacThuc', 0)->get();
        if ($result) {
            foreach ($result as $item) {
                $item->cuaChuTro();
                $item->goiDangKy();
            }
        }
        return $result;
    }

    public static function thongTinChiTietYeuCauDangKy($id)
    {
        $result = self::where('id', '=', $id)->first();

        $result->cuaChuTro();
        $result->goiDangKy();
        return $result;
    }
}
