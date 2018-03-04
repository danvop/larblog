<?php

namespace App\Http\Controllers;

use App\Mail\Welcome;
use App\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }
    public function store()
    {
        //Validate the form
        $this->validate(request(),[
            'name' => 'required',
            'email'=> 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        //Create and save the user
        //$user = User::create(request(['name', 'email', 'password']));
        
        $user = User::create([ 
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        //Sign the user in
        auth()->login($user);
        //Redirect to the home page
        
        //send an email
        //return view('emails.welcome', compact('user'));
        \Mail::to($user)->send(new Welcome($user));
        
        return redirect()->home();
    }
}
