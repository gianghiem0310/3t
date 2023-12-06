<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirebaseCloudMessaging extends Model
{
    use HasFactory;
    protected $fillable = [
        "token",
        "idTaiKhoan"
    ];
}
