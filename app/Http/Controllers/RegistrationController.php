<?php

namespace App\Http\Controllers;

use App\Mail\Welcome;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegistrationForm;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }
    
    public function store(RegistrationForm $form)
    {
        $form->persist();
        
        
        return redirect()->home();
    }
}
