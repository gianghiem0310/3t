<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongTroChuTro extends Model
{
    use HasFactory;
    protected $fillable = [
        'idChuTro',
        'idPhongTro'
    ];
    public function thongTinChuTro()
    {
        $this->setAttribute("chuTro", $this->hasOne(ChuTro::class, 'id', 'idChuTro')->first());
    }
    public function thongTinPhong()
    {
        $this->setAttribute("phongTro", $this->hasOne(PhongTro::class, 'id', 'idPhongTro')->first());
    }
    public function hinhAnhCuaPhong()
    {
        $this->setAttribute("hinhAnh", $this->hasMany(HinhAnh::class, 'idPhong', 'idPhongTro')->get());
    }
    public function demSoLuongBinhLuan()
    {
        $this->setAttribute("binhLuan", $this->hasMany(PhongBinhLuan::class, 'idPhong', 'idPhongTro')->count());
    }
    public function trungBinhDanhGia()
    {
        $this->setAttribute("danhGia", $this->hasMany(PhongDanhGia::class, 'idPhong', 'idPhongTro')->avg("danhGia"));
    }
    public function tienIch($idPhong)
    {
        $phongTienIch = PhongTroTienIch::where("idPhong", $idPhong)->get();
        $tienIch = [];
        foreach ($phongTienIch as $item){
            array_push($tienIch, TienIch::find($item['idTienIch']));
        }
        $this->setAttribute("danhSachTienIch", $tienIch);
    }
    public static function layDanhSachPhongTheoIDChuTroPhanTrang($idChuTro, $page, $quantity){
        $offset = ($page - 1)*$quantity;
        $result = self::where('idChuTro', "=", $idChuTro)->orderBy('idPhongTro', 'DESC')->offset($offset)->limit($quantity)->get();

        foreach($result as $item){
            $item->thongTinChuTro();
            $item->thongTinPhong();
            $item->hinhAnhCuaPhong();
            $item->demSoLuongBinhLuan(); 
            $item->trungBinhDanhGia();
            
        }
        return $result;
    }
    public static function layDanhSachPhongTheoIDChuTro($idChuTro){
        $result = self::where("idChuTro", $idChuTro)->orderBy('idPhongTro', 'DESC')->get();

        foreach($result as $item){
            $item->thongTinChuTro();
            $item->thongTinPhong();
            $item->hinhAnhCuaPhong();
            $item->demSoLuongBinhLuan(); 
            $item->trungBinhDanhGia();
            $item->tienIch($item['idPhongTro']);
            
        }
        return $result;
    }
}
