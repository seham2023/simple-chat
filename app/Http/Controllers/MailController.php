<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\DemoMail;
use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function mail(){

    $users = User::select('name', 'email')->get();

    foreach ($users as $user) {
        $mailData = [
            'title' => 'Hello, ' . $user->name,
        ];

        Mail::to($user->email)->send(new DemoMail($mailData));
        dd('sent');
    }


}


public function mailjob(){

    SendEmailJob::dispatch();
    dd('done');
}
}
