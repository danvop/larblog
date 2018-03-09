<?php

namespace App\Http\Requests;

use App\Mail\Welcome;
use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Mail;

class RegistrationForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email'=> 'required|email|unique:users',
            'password' => 'required|confirmed'
        ];
    }

    public function persist()
    {

        $user = User::create([ 
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password)
        ]);

        //Sign the user in
        auth()->login($user);
        //Redirect to the home page
        
        //send an email
        //return view('emails.welcome', compact('user'));
        \Mail::to($user)->send(new Welcome($user));
    }
}
