<?php

namespace App\Models;

use App\Models\PhongTroChuTro;
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
    public function quan()
    {
        $this->setAttribute("quan", $this->hasOne(Quan::class, 'id', "idQuan")->first());
    }
    public function phuong()
    {
        $this->setAttribute("phuong", $this->hasOne(Phuong::class, 'id', "idPhuong")->first());
    }
    public static function layyPhongTroTheoID($id)
    {
        $result = self::find($id);
        $result->quan();
        $result->phuong();
        $result->tienIch();
        $result->danhSachHinhAnh();
        return $result;
    }
    public function thongTinChuTro()
    {
        $this->setAttribute("phongTroChuTro", $this->belongsToMany(ChuTro::class, PhongTroChuTro::class, "idPhongTro",  "idChuTro")->first());
    }
    public function danhSachTienIch()
    {
        $this->setAttribute("danhSachTienIch", $this->belongsToMany(TienIch::class, PhongTroTienIch::class, "idPhong",  "idTienIch")->get());
    }
    public function danhSachHinhAnh()
    {
        $this->setAttribute("hinhAnhPhongTro", $this->hasMany(HinhAnh::class, "idPhong",  "id")->get());
    }
    public function demSoLuongBinhLuan()
    {
        $this->setAttribute("binhLuan", $this->hasMany(PhongBinhLuan::class, 'idPhong', 'id')->count());
    }
    public function trungBinhDanhGia()
    {
        $this->setAttribute("danhGia", $this->hasMany(PhongDanhGia::class, 'idPhong', 'id')->avg("danhGia"));
    }
    public static function layThongTinPhong($idPhong)
    {
        $result = PhongTro::find($idPhong);
        $result->thongTinChuTro();
        $result->danhSachTienIch();
        $result->danhSachHinhAnh();
        return $result;
    }
    public static function layTatCaPhong($loaiPhong, $sapXep)
    {
        $result = self::where([
            ["loaiPhong", $loaiPhong],
            ["hoatDong", 1]
        ])->orderBy('gia', $sapXep)->get();

        
        foreach ($result as $item) {
            $item->thongTinChuTro();
            $item->danhSachTienIch();
            $item->danhSachHinhAnh();
            $item->demSoLuongBinhLuan();
            $item->trungBinhDanhGia();
        }

        return $result;
    }

    public static function layPhongTroTheoQuan($idQuan,$arrange)
    {
        $result = self::where([
            ["loaiPhong", 0],
            ["hoatDong", 1],
            ['idQuan', $idQuan]
        ])->orderBy('gia', $arrange)->get();

        
        foreach ($result as $item) {
            $item->thongTinChuTro();
            $item->danhSachTienIch();
            $item->danhSachHinhAnh();
            $item->demSoLuongBinhLuan();
            $item->trungBinhDanhGia();
        }

        return $result;
    }
    public static function randomPhong()
    {
        $result = self::where([
            ["loaiPhong", 0],
            ["hoatDong", 1],
        ])->inRandomOrder()->get();

        
        foreach ($result as $item) {
            $item->thongTinChuTro();
            $item->danhSachTienIch();
            $item->danhSachHinhAnh();
            $item->demSoLuongBinhLuan();
            $item->trungBinhDanhGia();
        }

        return $result;
    }
}
