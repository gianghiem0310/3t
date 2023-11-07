<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinNhan extends Model
{
    use HasFactory;
      //Start: Nguyen Gia Nghiem
      protected $fillable = [
        'idPhong',
        'idTaiKhoan',
        'noiDung'
    ];
      //End: Nguyen Gia Nghiem
}
