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
use App\Http\Controllers\EmailSendController;
use App\Http\Controllers\FirebaseCloudMessagingController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HinhAnhController;
use App\Http\Controllers\NguoiThueController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PhongBinhLuanController;
use App\Http\Controllers\PhongDanhGiaController;
use App\Http\Controllers\PhongNguoiThueController;
use App\Http\Controllers\PhongTinNhanController;
use App\Http\Controllers\PhongTroChuTroController;
use App\Http\Controllers\PhongTroGoiYController;
use App\Http\Controllers\PhongTroYeuThichController;
use App\Http\Controllers\PhuongController;
use App\Http\Controllers\QuanController;
use App\Http\Controllers\ThongBaoController;
use App\Http\Controllers\TienIchController;
use App\Http\Controllers\TinNhanController;
use App\Http\Controllers\VideoReviewController;
use App\Http\Controllers\XacThucChuTroController;
use App\Http\Controllers\YeuCauDatPhongController;
use App\Models\HinhAnh;
use App\Models\PhongDanhGia;
use App\Models\PhongNguoiThue;
use App\Models\PhongTro;
use App\Models\PhongTroChuTro;
use App\Models\PhongTroGoiY;
use App\Models\PhongTroYeuThich;
use App\Models\XacThucChuTro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
Route::post('/capnhatchinhsach2', [ChinhSachController::class, 'capNhatChinhSach2']);

Route::get('/laytienichtheoid', [TienIchController::class, 'layTienIchTheoId']);
Route::get('/laytatcatienich', [TienIchController::class, 'layTatCaTienIch']);
Route::post('/themtienich', [TienIchController::class, 'themTienIch']);
Route::post('/capnhattienich', [TienIchController::class, 'capNhatTienIch']);
Route::patch('/capnhattrangthaitienich', [TienIchController::class, 'capNhatTrangThaiTienIch']);

Route::get('/laytatcaquan', [QuanController::class, 'layTatCaQuan']);
Route::post('/themquan', [QuanController::class, 'themQuan']);
Route::get('/layquantheoid', [QuanController::class, 'layTatCaQuanTheoID']);
Route::post('/capnhatquan', [QuanController::class, 'capNhatQuan']);
Route::patch('/capnhattrangthaiquan', [QuanController::class, 'capNhatTrangThaiQuan']);

Route::get('/laytatcaphuong', [TienIchController::class, 'layTatCaPhuong']);
Route::post('/themphuong', [PhuongController::class, 'themPhuong']);
Route::post('/capnhatphuong', [PhuongController::class, 'capNhatPhuong']);
Route::patch('/capnhattrangthaiphuong', [PhuongController::class, 'capNhatTrangThaiPhuong']);
//UpAnh
Route::post('/uploadimage', [AdminController::class, 'uploadImage']);
Route::post('/capnhatthongtinchutrocohinh', [ChuTroController::class, 'capNhatThongTinChuTroCoHinh']);
Route::post('/capnhatthongtinchutrokhonghinh', [ChuTroController::class, 'capNhatThongTinChuTroKhongHinh']);


//Start Nghiêm Part 2
Route::get('/tatcataikhoan', [TaiKhoanController::class, 'layTatCaTaiKhoan']);
Route::get('chutro/thongtinchitiet', [ChuTroController::class, 'layThongTinChuTroTheoId']);
Route::get('nguoithue/thongtinchitiet', [NguoiThueController::class, 'layThongTinNguoiThueTheoId']);
Route::get('phongtinnhan', [PhongTinNhanController::class, 'layIdPhongTinNhan']);
Route::get('danhsachtinnhan', [TinNhanController::class, 'layDanhSachTinNhan']);
Route::get('laytaikhoandoiphuong', [TaiKhoanController::class, 'layTaiKhoanDoiPhuong']);
Route::get('layanhvatendoiphuong', [TinNhanController::class, 'layAnhVaTenDoiPhuong']);


Route::post('guitinnhan', [TinNhanController::class, 'guiTinNhan']);
Route::get('danhsachtinnhantheoidtaikhoan', [PhongTinNhanController::class, 'layDanhSachTinNhanTheoIdTaiKhoan']);
Route::post('capnhattinnhanmoinhat', [PhongTinNhanController::class, 'capNhatTinNhanMoiNhat']);
Route::post('capnhattrangthaidaxem', [PhongTinNhanController::class, 'capNhatTrangThaiDaXem']);
Route::post('capnhatthongtinchutrocohinh', [ChuTroController::class, 'capNhatThongTinChuTroCoHinh']);
Route::post('capnhatthongtinchutrokhonghinh', [ChuTroController::class, 'capNhatThongTinChuTroKhongHinh']);
Route::post('taotaikhoannguoithue', [TaiKhoanController::class, 'taoTaiKhoanNguoiThue']);
Route::post('taotaikhoanchutro', [TaiKhoanController::class, 'taoTaiKhoanChuTro']);
Route::post('taophongtinnhan', [PhongTinNhanController::class, 'taoPhongTinNhan']);
Route::get('thongtinphongtro', [PhongTroController::class, 'thongTinChiTietPhong']);

//End Nghiêm Part 2
//Anh tien ich


//Nghiem NguoiThue

//End Nghiem

//Start Kiet
Route::put('/taikhoan/khoa', [TaiKhoanController::class, 'khoaTaiKhoanAPI']);
Route::put('/taikhoan/moKhoa', [TaiKhoanController::class, 'moKhoaTaiKhoanAPI']);

//End Kiet

//Start Minh
Route::patch('/taikhoan/doimatkhau', [TaiKhoanController::class, 'doiMatKhauTaiKhoanAPI']);
Route::get('/taikhoan/dangnhap', [TaiKhoanController::class, 'kiemTraDangNhapAPI']);
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
//Start Kiet
Route::patch('/chutro/xoadichvu', [ChuTroController::class, 'xoaGoiDichVuChuTroTheoIDTaiKhoanAPI']);
//End Kiet

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
Route::get('/phongtrochutro/phantrang', [PhongTroChuTroController::class, "layDanhSachPhongTheoIDChuTroPhanTrangAPI"]);
Route::get('/phongtrochutro/all', [PhongTroChuTroController::class, "layDanhSachPhongTheoIDChuTroAPI"]);
Route::get('/phongtro/chitiet', [PhongTroController::class, "layThongTinPhongTheoIDAPI"]);
Route::post('/phonghinhanh/create', [HinhAnhController::class, "uploadmultiple"]);

Route::post('/phongtro/create', [PhongTroController::class, "themPhongAPI"]);
Route::post('/phongtro/update', [PhongTroController::class, "suaPhongAPI"]);
Route::get('/quan/all', [QuanController::class, "layTatCaQuanAPI"]);

Route::post('/xacthucchutro/create', [XacThucChuTroController::class, "guiYeuCauXacThucAPI"]);
// end )

// Lay nguoi thue theo id phong
Route::get('/phongnguoithue/all', [PhongNguoiThueController::class, "latTatCaNguoiThueTheoIDPhongAPI"]);
// Lấy chi tiết người thuê
Route::get('/nguoithue/chitiet', [NguoiThueController::class, "layChiTietNguoiThueAPI"]);
Route::get('/banner/chitiet', [BannerController::class, 'layBannerChiTietAPI']);
// Lấy bình luận có phân trang của phòng
Route::get('/phongbinhluan/all', [PhongBinhLuanController::class, 'layBinhLuanCuaPhongCoPhanTrangAPI']);
Route::put("/phongbinhluan/create", [PhongBinhLuanController::class, "vietBinhLuanCuaPhongAPI"]);
Route::put("/phongdanhgia/create", [PhongDanhGiaController::class, "danhGiaAPI"]);
Route::get("/phongdanhgia/laydanhgia", [PhongDanhGiaController::class, "layDanhGiaCuaChuTroChoPhongAPI"]);
Route::delete("/phongtrochutro/delete", [PhongTroChuTroController::class, "xoaPhongAPI"]);
//Gui yeu cau dang ky goi
Route::post('/yeucaudangkygoi/create', [YeuCauDangKyGoiController::class, "guiYeuCauDangKyGoiAPI"]);
//Đếm thông báo cho màn hình admin
Route::get('/notification/number', [NotificationController::class, "demSoThongBaoChoAdminAPI"]);
Route::delete('/hinhcuaphong/delete', [HinhAnhController::class, "deleteHinhAnhAPI"]);
//Thông báo 
Route::get('/thongbao/demthongbaocuataikhoan', [ThongBaoController::class, "laySoLuongThongBaoCuaTaiKhoanAPI"]);

Route::get('/thongbao/demyeucaudatphong', [YeuCauDatPhongController::class, "demSoYeuCauDangKyPhongAPI"]);
Route::get('/thongbao/demthongbao', [ThongBaoController::class, "demTongSoThongBaoAPI"]);
Route::get('/phongtro/all', [PhongtroController::class, "layTatCaPhongPhanTrangAPI"]);
Route::get('/phongtro/quan', [PhongtroController::class, "layTatCaPhongTroTheQuanAPI"]);
Route::get('/phongtro/random', [PhongtroController::class, "layRandomPhongAPI"]);
Route::get('/test', [YeuCauDangKyGoiController::class, "test"]);
Route::patch('/phongtro/hoatdong', [PhongTroController::class, "batTatHoatDongPhongAPI"]);
Route::get('/quan/all/hoatdong', [QuanController::class, "layTatCaQuanHoatDongAPI"]);
Route::get('/phuong/all/hoatdong', [PhuongController::class, "layTatCaPhuongHoatDongAPI"]);
Route::get('/tienich/all/hoatdong', [TienIchController::class, "layTatCaTienIchHoatDongAPI"]);
Route::post('/phongtro/web/themphong', [PhongTroController::class, "themPhongWebAPI"]);
Route::get('/yeucaudatphong/all', [YeuCauDatPhongController::class, "layTatCaYeuCauDangKyPhongAPI"]);
Route::get('/yeucaudatphong/chitiet', [YeuCauDatPhongController::class, "layThongTinChiTietCuaThongBao"]);
Route::put('/yeucaudatphong/xacnhandatphong', [YeuCauDatPhongController::class, "xacThucNhanPhongAPI"]);
Route::put('/yeucaudatphong/tuchoi', [YeuCauDatPhongController::class, "tuChoiNhanPhongAPI"]);
Route::post('/yeucaudatphong/them', [YeuCauDatPhongController::class, "themYeuCauDangKyPhong"]);
Route::post('/fcm/savetoken', [FirebaseCloudMessagingController::class, "saveTokenDeviceAPI"]);
Route::delete('/fcm/delete', [FirebaseCloudMessagingController::class, "deleteTokenDeviceOfAccountWhenLogOutAPI"]);
Route::get('/fcm/gettoken', [FirebaseCloudMessagingController::class, "getAllTokenDeviceOfAccountAPI"]);
Route::get('/taikhoan/all/type', [TaiKhoanController::class, "getAllAccountByTypeAPI"]);
Route::post('/notification/create', [ThongBaoController::class, "themThongBao"]);
Route::get('/checkuser', [ForgotPasswordController::class, "getAccountByUsernameAPI"]);
Route::post('/checkcode', [ForgotPasswordController::class, "checkCodeAPI"]);
Route::get('/timkiemtheonhucau', [PhongTroController::class, "layTatCaPhongTheoNhuCauAPI"]);



Route::post('/send-email', [EmailSendController::class, "sendAPI"]);
Route::post('/forgotpassword', [ForgotPasswordController::class, "createCodeForgotPasswordAPI"]);


// Start Nghiem Api
Route::get('nguoithue/danhsachphonggoiy',[PhongTroController::class,'layDanhSachPhongGoiY']);
Route::get('nguoithue/danhsachphonggoiy2',[PhongTroController::class,'layDanhSachPhongGoiY2']);
Route::get('nguoithue/danhsachphonggoiytheoquan',[PhongTroController::class,'layDanhSachPhongGoiYTheoQuan']);
Route::get('/taikhoan/dangnhapfb', [TaiKhoanController::class, 'kiemTraDangNhapFB']);
Route::post('capnhatthongtinnguoithuecohinh', [NguoiThueController::class, 'capNhatThongTinNguoiThueCoHinh']);
Route::post('capnhatthongtinnguoithuekhonghinh', [NguoiThueController::class, 'capNhatThongTinNguoiThueKhongHinh']);
Route::post('nguoithue/capnhatphonggoiy',[PhongTroGoiYController::class,'capNhatPhongGoiY']);
Route::get('profilereceiver',[TaiKhoanController::class,'getProfileReceiver']);
Route::get('profilesender',[TaiKhoanController::class,'getNameSender']);
Route::post('uploadvideoreview',[VideoReviewController::class,"uploadVideo"]);
Route::post('uploadvideoreviewyoutube',[VideoReviewController::class,"uploadVideoYoutube"]);
Route::get('getvideoreview',[VideoReviewController::class,'getVideoReview']);
Route::post('deletevideoreview',[VideoReviewController::class,'deleteVideoReview']);
Route::post('capnhatyeuthichphongtro',[PhongTroYeuThichController::class,'capNhatYeuThichPhongTro']);
Route::get('laydanhsachphongtroyeuthich',[PhongTroYeuThichController::class,'layDanhSachPhongTroYeuThich']);
Route::get('laytongsoluotyeuthich',[PhongTroYeuThichController::class,'layTongSoLuotYeuThichCuaPhongTro']);
Route::get('kiemtrayeuthich',[PhongTroYeuThichController::class,'xemDaYeuThichHayChua']);
// End Nghiem Api
