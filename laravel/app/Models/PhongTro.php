<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongTro extends Model
{
    protected $fillable = [
        'soPhong',
        'gia',
        'dienTich',
        'moTa',
        'idQuan',
        'idPhuong',
        'diaChiChiTiet',
        'loaiPhong',
        'soLuongToiDa',
        'tienCoc',
        'gioiTinh',
        'tienDien',
        'tienNuoc'
    ];
    public function tienIch()
    {
        $this->setAttribute("tienIch", $this->belongsToMany(TienIch::class, PhongTroTienIch::class, 'idPhong', "idTienIch")->get());
    }
    public static function  layyPhongTroTheoID($id){
        $result = self::find($id);
        $result->tienIch();
        return $result;
    }
}
