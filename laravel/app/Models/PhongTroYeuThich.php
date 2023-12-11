<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongTroYeuThich extends Model
{
    use HasFactory;
    protected $fillable = [
        'idPhong',
        'idTaiKhoan'
    ];
}
