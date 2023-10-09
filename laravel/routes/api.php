<?php

use App\Http\Controllers\ChuTroController;
use App\Http\Controllers\GoiController;
use App\Http\Controllers\TaiKhoanController;
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

//End Nghiem

//Start Minh
Route::get('/goi/all',[GoiController::class,'layTatCaGoiAPI']);
Route::post('/goi/add',[GoiController::class, 'themGoiDichVuAPI']);
Route::put('/goi/update',[GoiController::class, 'suaGoiDichVuAPI']);

Route::get('/chutro/all',[ChuTroController::class,'layTatCaThongTinChuTroAPI']);
//End Minh