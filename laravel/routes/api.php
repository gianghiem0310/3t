<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\ChuTroController;
use App\Http\Controllers\GoiController;
use App\Http\Controllers\PhongTroController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\YeuCauDangKyGoiController;
use App\Http\Controllers\YeuCauXoaPhongController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChinhSachController;
use App\Http\Controllers\HinhAnhController;
use App\Http\Controllers\NguoiThueController;
use App\Http\Controllers\PhongBinhLuanController;
use App\Http\Controllers\PhongNguoiThueController;
use App\Http\Controllers\PhongTroChuTroController;
use App\Http\Controllers\PhuongController;
use App\Http\Controllers\QuanController;
use App\Http\Controllers\ThongBaoController;
use App\Http\Controllers\TienIchController;
use App\Http\Controllers\XacThucChuTroController;
use App\Models\HinhAnh;
use App\Models\PhongNguoiThue;
use App\Models\PhongTro;
use App\Models\XacThucChuTro;
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
Route::get('/taikhoan', [TaiKhoanController::class, 'layTaiKhoanTheoId']);
Route::get('/thongtinadmin', [AdminController::class, 'thongTinAdmin']);
Route::patch('/doimatkhautaikhoan', [TaiKhoanController::class, 'doiMatKhauTaiKhoan']);
Route::post('/capnhatthongtinadmin', [AdminController::class, 'capNhatThongTinAdmin']);
Route::post('/capnhatthongtinadmin2', [AdminController::class, 'capNhatThongTinAdmin2']);

Route::patch('/capnhattrangthai', [TaiKhoanController::class, 'capNhatTrangThai']);
Route::patch('/capnhatxacthuc', [TaiKhoanController::class, 'capNhatXacThuc']);
Route::get('/kiemtradangnhap', [TaiKhoanController::class, 'kiemTraDangNhap']);

Route::get('/chinhsach', [ChinhSachController::class, 'layChinhSachTheoId']);
Route::put('/capnhatchinhsach', [ChinhSachController::class, 'capNhatChinhSach']);

Route::get('/laytatcatienich', [TienIchController::class, 'layTatCaTienIch']);
Route::post('/themtienich', [TienIchController::class, 'themTienIch']);
Route::post('/capnhattienich', [TienIchController::class, 'capNhatTienIch']);

Route::get('/laytatcaquan', [QuanController::class, 'layTatCaQuan']);
Route::post('/themquan', [QuanController::class, 'themQuan']);
Route::post('/capnhatquan', [QuanController::class, 'capNhatQuan']);

Route::get('/laytatcaphuong', [TienIchController::class, 'layTatCaPhuong']);
Route::post('/themphuong', [PhuongController::class, 'themPhuong']);
Route::post('/capnhatphuong', [PhuongController::class, 'capNhatPhuong']);
//UpAnh
Route::post('/uploadimage', [AdminController::class, 'uploadImage']);
Route::post('/capnhatthongtinchutrocohinh', [ChuTroController::class, 'capNhatThongTinChuTroCoHinh']);
Route::post('/capnhatthongtinchutrokhonghinh', [ChuTroController::class, 'capNhatThongTinChuTroKhongHinh']);

//Anh tien ich


//Nghiem NguoiThue

//End Nghiem

//Start Kiet
Route::put('/taikhoan/khoa', [TaiKhoanController::class, 'khoaTaiKhoanAPI']);
Route::put('/taikhoan/moKhoa', [TaiKhoanController::class, 'moKhoaTaiKhoanAPI']);

//End Kiet

//Start Minh
Route::patch('/taikhoan/doimatkhau', [TaiKhoanController::class, 'doiMatKhauTaiKhoanAPI']);
Route::get('/goi/all', [GoiController::class, 'layTatCaGoiAPI']);
Route::get('/goi/chitiet', [GoiController::class, 'layThongTinChiTietTheoIDGoiAPI']);
Route::get('/goi/all/condung', [GoiController::class, 'layTatCaGoiTrangThaiConDungAPI']);
Route::post('/goi/add', [GoiController::class, 'themGoiDichVuAPI']);
Route::put('/goi/update', [GoiController::class, 'suaGoiDichVuAPI']);
Route::get('/goi/lock', [GoiController::class, 'khoaGoiDichVuAPI']);
Route::get('/goi/unLock', [GoiController::class, 'moKhoaGoiDichVuAPI']);


Route::get('/chutro/all', [ChuTroController::class, 'layTatCaThongTinChuTroAPI']);
Route::get('/chutro/chuaxacthuc', [ChuTroController::class, 'layTatCaThongTinChuTroChuaXacThucAPI']);
Route::get('/chutro/daxacthuc', [ChuTroController::class, 'layTatCaThongTinChuTroDaXacThucAPI']);
Route::get('/chutro/timKiemTenChuTroXacThuc', [ChuTroController::class, 'timChuTroXacThucTheoTen']);
Route::get('/chutro/timKiemSDTChuTroXacThuc', [ChuTroController::class, 'timChuTroXacThucTheoSDT']);
Route::get('/chutro/lock', [ChuTroController::class, 'khoaChuTroAPI']);
Route::get('/chutro/unLock', [ChuTroController::class, 'moKhoaChuTroTheoIDTaiKhoanAPI']);
Route::get('/chutro/chitiet', [ChuTroController::class, 'layThongTinTheoIDTaiKhoanAPI']);  // Chuyền theo id tài khoản
Route::patch('/chutro/chapnhanxacthuc', [ChuTroController::class, 'xacNhanThongTinChuTroTheoIDTaiKhoanAPI']);

Route::get('/yeucaudangky/all', [YeuCauDangKyGoiController::class, 'danhSachYeuCauDangKyGoiAPI']);
Route::get('/yeucaudangky/chitiet', [YeuCauDangKyGoiController::class, 'thongTinChiTietYeuCauDangKyGoiAPI']);
Route::patch('/yeucaudangky/xacthuc', [YeuCauDangKyGoiController::class, 'xacThucYeuCauDangKyGoiAPI']);
Route::delete('/yeucaudangky/huy', [YeuCauDangKyGoiController::class, 'huyYeuCauDangKyGoiAPI']);

Route::get('/yeucauxoaphong/all', [YeuCauXoaPhongController::class, 'layTatCaYeuCauXoaPhongAPI']);
Route::get('/yeucauxoaphong/chitiet', [YeuCauXoaPhongController::class, 'thongTinChiTietCuaYeuCauXoaPhongAPI']);
Route::delete('/yeucauxoaphong/huy', [YeuCauXoaPhongController::class, 'huyYeuCauXoaPhongAPI']);

Route::delete('/phongtro/delete', [PhongTroController::class, 'xoaPhongTheoIdAPI']);

Route::get('/banner/all', [BannerController::class, 'layTatCaBannerAPI']);
Route::post('/banner/create', [BannerController::class, 'themHinhAPI']);
Route::post('/banner/edit', [BannerController::class, 'suaHinhAPI']);
Route::delete('/banner/delete', [BannerController::class, 'xoaHinhAPI']);

Route::get('/xacthucchutro/all', [XacThucChuTroController::class, "layTatCaYeuCauXacThucAPI"]);
Route::patch('/xacthucchutro/xacthuc', [XacThucChuTroController::class, "xacThucYeuCauTheoIdChuTroAPI"]);
Route::get('/xacthucchutro/chitiet', [XacThucChuTroController::class, "layThongTinYeuCauXacThucAPI"]);
Route::delete('/xacthucchutro/xoa', [XacThucChuTroController::class, "xoaYeuXauXacThucAPI"]);

Route::get('/phuong/layphuongtheoquan', [PhuongController::class, "layPhuongTheoIDQuanAPI"]);
// Chủ trọ (
// start
Route::get('/thongbao/all', [ThongBaoController::class, "layTatCaThongBaoTheoIDNguoiNhanAPI"]);
//Start Kiet
Route::get('/thongbao/chitiet', [ThongBaoController::class, "chitietThongBao"]);
Route::get('/thongbao/xoa', [ThongBaoController::class, "xoaThongBao"]);
//End Kiet
Route::get('/phongtrochutro/all', [PhongTroChuTroController::class, "layDanhSachPhongTheoIDChuTroAPI"]);
Route::get('/phongtro/chitiet', [PhongTroController::class, "layThongTinPhongTheoIDAPI"]);
Route::post('/phonghinhanh/create', [HinhAnhController::class, "uploadmultiple"]);

Route::post('/phongtro/create', [PhongTroController::class, "themPhongAPI"]);
Route::get('/quan/all', [QuanController::class, "layTatCaQuanAPI"]);

Route::get('/xacthucchutro/create', [XacThucChuTroController::class, "guiYeuCauXacThucAPI"]);
// end )

// Lay nguoi thue theo id phong
Route::get('/phongnguoithue/all', [PhongNguoiThueController::class, "latTatCaNguoiThueTheoIDPhongAPI"]);
// Lấy chi tiết người thuê
Route::get('/nguoithue/chitiet', [NguoiThueController::class, "layChiTietNguoiThueAPI"]);
Route::get('/banner/chitiet',[BannerController::class,'layBannerChiTietAPI']);
// Lấy bình luận có phân trang của phòng
Route::get('/phongbinhluan/all',[PhongBinhLuanController::class,'layBinhLuanCuaPhongCoPhanTrangAPI']);
Route::put("/phongbinhluan/create", [PhongBinhLuanController::class, "vietBinhLuanCuaPhongAPI"]);
//End Minh