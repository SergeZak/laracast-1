<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Mail\Welcome;
use App\User;
use Illuminate\Http\Request;


class RegistrationController extends Controller
{


    function register()
    {
        return view('registration.create');
    }


    function store(RegistrationRequest $request)
    {

        $request->persist();

        session()->flash('message','Thanks so much for signing up!');

        return redirect()->home();
    }


}
