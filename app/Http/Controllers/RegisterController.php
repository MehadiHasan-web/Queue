<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use App\Jobs\SendOtpJob;
use App\Models\User;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // send mail to admin
        for ($i = 0; $i < 50; $i++) {
            dispatch(new SendMailJob((object)$request->all()));
        }



        flash()->success('Registered successfully');
        return redirect()->back();
    }
    public function sendOpt()
    {
        dispatch(new SendOtpJob())->onQueue('high');

        flash()->success('OTP sent successfully');
        return redirect()->back();
    }
}
