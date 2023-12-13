<?php

namespace App\Http\Controllers;

use App\Models\ForgotPassword;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function getAccountByUsernameAPI(Request $request)
    {
        return TaiKhoan::where("tenTaiKhoan", $request->tenTaiKhoan)->first(["id", "tenTaiKhoan", "email"]);
    }
    public function checkCodeAPI(Request $request)
    {
        $res = ForgotPassword::where([
            ["idTaiKhoan", $request->idTaiKhoan],
            ["code", $request->code]
        ])->first("idTaiKhoan");
        if ($res) {
            $bres = TaiKhoan::where("id", $request->idTaiKhoan)->update(["matKhau"=>$request->matKhau]);
            if ($bres == 1) {
                ForgotPassword::where("idTaiKhoan", $request->idTaiKhoan)->delete();
                return response()->json(["message" => "Tạo mật khẩu thành công", "status"=>1]);
            }
        }
        else{
            return response()->json(["message"=>"mã quá hạn", "status"=>0]);
        }
        return $res;
    }

    public function createCodeForgotPasswordAPI(Request $request)
    {
        $code = random_int(100000, 999999);
        ForgotPassword::where("idTaikhoan", $request->idTaiKhoan)->delete();
        $forgot = ForgotPassword::create([
            "idTaiKhoan" => $request->idTaiKhoan,
            "code" => $code
        ]);
        if (!$forgot) {
            return response()->json(['message' => "Tạo mã thất bại", "status"=>0]);
        }
        $to = $request->email;
        $subject = "Mã đặt lại mật khẩu";
        $content = "Xin chào bạn.\nĐây là email lấy mã đặt lại mật khẩu, nếu bạn không phải nhấn quên mật khẩu thì không cần quan tâm đến email này\nMã của bạn là: ";
        $content .= $forgot->code;
        if (!$to) {
            return response()->json(['message' => 'Email trống',"status"=>0]);
        }

        if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
            return response()->json(['message' => 'Email sai định dạng không thể gửi',"status"=>0]);
        }
        $res = Mail::html($content, function ($mail) use ($to, $subject) {
            $mail->to($to)->subject($subject);
        });
        return response()->json(['message' => "Đã gửi mã lấy lại mật khẩu vào email hãy kiểm tra email nếu không thấy vui lòng vào phần thư rác trong email để kiểm tra", "status"=>1]);
    }
}
