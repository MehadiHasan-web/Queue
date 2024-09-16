<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
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
        dispatch(new SendMailJob((object)$request->all()));

        flash()->success('Registered successfully');
        return redirect()->back();
    }
}
