<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

    function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }


    function create()
    {
        return view('sessions.create');
    }


    function store(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
        ]);

        if(!auth()->attempt($request->only(['email', 'password'])))
        {
            return back()->withErrors([
                'message'=>'Please check your credentials and try again'
            ]);
        }

        return redirect()->home();
    }


    function destroy()
    {
        auth()->logout();

        return redirect()->home();
    }


}
