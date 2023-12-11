<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailSendController extends Controller
{
    public function sendAPI(Request $request){
        $to = $request->to;
        $subject = $request->title;
        $content = $request->content;
        // $to = $request->to;
        // $subject = $request->subject;
        // $content = $request->content;

        if (!$to || !$subject || !$content) {
            return response()->json(['message' => 'Invalid input'], 400);
        }

        if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
            return response()->json(['message' => 'Invalid email address'], 400);
        }
        $res = Mail::html($content, function ($mail) use ($to, $subject) {
            $mail->to($to)->subject($subject);
        });
        return response()->json(['message' => $res]);
    }

    public function sendForgetPasswordAPI(Request $request){
        $to = $request->to;
        $subject = "Mã đặt lại mật khẩu";
        $content = "Xin chào bạn.\nĐây là email lấy mã đặt lại mật khẩu, nếu bạn không phải nhấn quên mật khẩu thì không cần quan tâm đến email này\nMã của bạn là:";
        $six_digit_random_number = random_int(100000, 999999);
        if (!$to) {
            return response()->json(['message' => 'Invalid input'], 400);
        }

        if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
            return response()->json(['message' => 'Invalid email address'], 400);
        }
        $res = Mail::html($content, function ($mail) use ($to, $subject) {
            $mail->to($to)->subject($subject);
        });
        return response()->json(['message' => $res]);
    }
}
