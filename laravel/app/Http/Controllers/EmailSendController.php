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
}
