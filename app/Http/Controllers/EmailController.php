<?php

namespace App\Http\Controllers;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index()
    {
        $user_name = 'Itana';
        Mail::to('mail@example.com')
            ->send(new TestEmail($user_name));
    }
}
