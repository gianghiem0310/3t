<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChinhSachController;
use App\Http\Controllers\PhuongController;
use App\Http\Controllers\QuanController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\TienIchController;
use App\Models\ChinhSach;
use App\Models\Phuong;
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
Route::post('/capnhatthongtinadmin',[AdminController::class,'capNhatThongTinAdmin']);
Route::post('/capnhatthongtinadmin2',[AdminController::class,'capNhatThongTinAdmin2']);

Route::patch('/capnhattrangthai',[TaiKhoanController::class,'capNhatTrangThai']);
Route::patch('/capnhatxacthuc',[TaiKhoanController::class,'capNhatXacThuc']);
Route::get('/kiemtradangnhap',[TaiKhoanController::class,'kiemTraDangNhap']);

Route::get('/chinhsach',[ChinhSachController::class,'layChinhSachTheoId']);
Route::put('/capnhatchinhsach',[ChinhSachController::class,'capNhatChinhSach']);

Route::get('/laytatcatienich',[TienIchController::class,'layTatCaTienIch']);
Route::post('/themtienich',[TienIchController::class,'themTienIch']);
Route::post('/capnhattienich',[TienIchController::class,'capNhatTienIch']);

Route::get('/laytatcaquan',[QuanController::class,'layTatCaQuan']);
Route::post('/themquan',[QuanController::class,'themQuan']);
Route::post('/capnhatquan',[QuanController::class,'capNhatQuan']);

Route::get('/laytatcaphuong',[TienIchController::class,'layTatCaPhuong']);
Route::post('/themphuong',[PhuongController::class,'themPhuong']);
Route::post('/capnhatphuong',[PhuongController::class,'capNhatPhuong']);
//UpAnh
Route::post('/uploadimage',[AdminController::class,'uploadImage']);


//Anh tien ich


//Nghiem NguoiThue

//End Nghiem