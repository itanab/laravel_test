<?php

namespace App\Http\Controllers;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\User;
use App\Notifications\InvoicePaid;

class EmailController extends Controller
{
    public function index()
    {

        //by email
        $user_name = 'Itana';
        Mail::to('mail@example.com')
            ->send(new TestEmail($user_name));

        //using notification

        $user = User::find(1);
        $user->notify(new InvoicePaid());
    }
}
