<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RemindEmail;
use App\Models\User;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Notification;

class RemindEmailController extends Controller
{
    public function sendUserRemindEmail(){

        $user = User::where('id' , 9)->first();
        // dd($user);
        
        $mail = [
            'subject' => '学生心理健康养护平台',
            'body' => "感知压力，放松心情，请使用平台！ Email",
        ];

        Notification::send($user, new EmailNotification($mail));

    }
}