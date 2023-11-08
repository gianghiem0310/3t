<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongTroTienIch extends Model
{
    use HasFactory;
    // Start Nghiem Part 2-2
    protected $fillable = [
        'idPhong',
        'idTienIch'
    ];
    // End Nghiem Part 2-2
}
