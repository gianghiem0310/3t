<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChinhSachController;
use App\Http\Controllers\TaiKhoanController;
use App\Models\ChinhSach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Start Nghiem
Route::get('/taikhoan',[TaiKhoanController::class,'layTaiKhoanTheoId']);
Route::get('/thongtinadmin',[AdminController::class,'thongTinAdmin']);
Route::patch('/doimatkhautaikhoan',[TaiKhoanController::class,'doiMatKhauTaiKhoan']);

Route::put('/capnhatthongtinadmin',[AdminController::class,'capNhatThongTinAdmin']);


Route::put('/chinhsach',[ChinhSachController::class,'layChinhSachTheoId']);
Route::put('/capnhatchinhsach',[ChinhSachController::class,'capNhatChinhSach']);
//End Nghiem