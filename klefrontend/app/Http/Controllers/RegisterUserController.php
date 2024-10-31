<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class RegisterUserController extends Controller
{
    public function create(){
        return view('my-auth.register');
    }

    public function store(Request $request){
        request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required' , 'email'],
            'password' => ['required' , Password::min(6) , 'confirmed'],
        ],
        [
            'first_name.required' => 'İsim girilmek zorunda',
            'last_name.required' => 'Soyisim girilmek zorunda',
            'email' => 'Girilen değer e posta olmalı',
            'email.required'=>'E posta gerekli',
            'password.required'=>'Şifre gerekli',
            'password.confirmed' => 'Şifreler eşleşmiyor',
        ]
    );
        Http::acceptJson()->post(env('API_URL').'/api/v1/register',[
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'password_confirmation' => $request->input('password_confirmation')
       ]);
       return redirect('/login');
    }
}
