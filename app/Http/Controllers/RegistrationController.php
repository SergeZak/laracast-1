<?php

namespace App\Http\Controllers;

use App\Mail\Welcome;
use App\User;
use Illuminate\Http\Request;


class RegistrationController extends Controller
{


    function register()
    {
        return view('registration.create');
    }


    function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed'
        ]);

        $user = User::create($request->only(['name', 'email','password']));

        auth()->login($user);

        \Mail::to($user)->send(new Welcome($user));

        return redirect()->home();
    }


}
