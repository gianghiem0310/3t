<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\ChuTroController;
use App\Http\Controllers\GoiController;
use App\Http\Controllers\PhongTroController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\YeuCauDangKyGoiController;
use App\Http\Controllers\YeuCauXoaPhongController;
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
Route::get('/goi/chitiet',[GoiController::class,'layThongTinChiTietTheoIDGoiAPI']);
Route::get('/goi/all/condung',[GoiController::class,'layTatCaGoiTrangThaiConDungAPI']);
Route::post('/goi/add',[GoiController::class, 'themGoiDichVuAPI']);
Route::put('/goi/update',[GoiController::class, 'suaGoiDichVuAPI']);
Route::get('/goi/lock',[GoiController::class, 'khoaGoiDichVuAPI']);
Route::get('/goi/unLock',[GoiController::class, 'moKhoaGoiDichVuAPI']);


Route::get('/chutro/all',[ChuTroController::class,'layTatCaThongTinChuTroAPI']);
Route::get('/chutro/chuaxacthuc',[ChuTroController::class,'layTatCaThongTinChuTroChuaXacThucAPI']);
Route::get('/chutro/daxacthuc',[ChuTroController::class,'layTatCaThongTinChuTroDaXacThucAPI']);
Route::get('/chutro/timKiemTen',[ChuTroController::class,'timChuTroTheoTen']);
Route::get('/chutro/timKiemSDT',[ChuTroController::class,'timChuTroTheoSDT']);
Route::get('/chutro/lock',[ChuTroController::class, 'khoaChuTroAPI']);
Route::get('/chutro/unLock',[ChuTroController::class, 'moKhoaChuTroAPI']);
Route::get('/chutro/chitiet',[ChuTroController::class,'layThongTinTheoIDTaiKhoanAPI']);  // Chuyền theo id tài khoản

Route::get('/yeucaudangky/all',[YeuCauDangKyGoiController::class,'danhSachYeuCauDangKyGoiAPI']);
Route::get('/yeucaudangky/chitiet',[YeuCauDangKyGoiController::class,'thongTinChiTietYeuCauDangKyGoiAPI']);
Route::patch('/yeucaudangky/xacthuc',[YeuCauDangKyGoiController::class,'xacThucYeuCauDangKyGoiAPI']);
Route::delete('/yeucaudangky/huy',[YeuCauDangKyGoiController::class,'huyYeuCauDangKyGoiAPI']);

Route::get('/yeucauxoaphong/all',[YeuCauXoaPhongController::class,'layTatCaYeuCauXoaPhongAPI']);
Route::get('/yeucauxoaphong/chitiet',[YeuCauXoaPhongController::class,'thongTinChiTietCuaYeuCauXoaPhongAPI']);
Route::get('/yeucauxoaphong/huy',[YeuCauXoaPhongController::class,'huyYeuCauXoaPhongAPI']);

Route::delete('/phongtro/delete',[PhongTroController::class,'xoaPhongTheoIdAPI']);

Route::get('/banner/all',[BannerController::class,'layTatCaBannerAPI']);
Route::post('/banner/create',[BannerController::class,'themHinhAPI']);
Route::post('/banner/edit',[BannerController::class,'suaHinhAPI']);
Route::delete('/banner/delete',[BannerController::class,'xoaHinhAPI']);
//End Minh