<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NguoiThue extends Model
{
    use HasFactory;
        //Start: Nguyen Gia Nghiem
        protected $fillable = [
            'idTaiKhoan',
            'hinh',
            'ten',
            'soDienThoai',
            'gioiTinh'
        ];
      
          //End: Nguyen Gia Nghiem
}
