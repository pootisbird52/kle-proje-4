<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('my-auth.login');
    }

    public function store()
    {
        //kullanıcı e posta şifresini doğrula ve bi değişkene ata
        $validatedAttributes = request()->validate([           
            'email' => ['required' , 'email'],
            'password' => ['required'],
        ]);
        dd('hi');
        //doğrulanmış verilerle giriş yapmayı dene
        if( ! Auth::attempt($validatedAttributes))
        {
            dd( throw ValidationException::withMessages([
                'email' => 'Girdiğin bilgiler yanlış',
            ])
            );
        }

        //session tokenını yenile
        request()->session()->regenerate();

        //ana sayfaya yönlendir
        return redirect('/home');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('home');
    }
}
