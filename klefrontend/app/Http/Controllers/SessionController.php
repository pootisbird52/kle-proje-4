<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('my-auth.login');
    }

    public function store(Request $request)
    {
        $response = Http::acceptJson()->withOptions([
            'headers' => ['X-Test' => 'HeaderTEst']
        ])->post(env('API_URL').'/api/v1/login', [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ])->collect();
        if ($response['valid'] == 'false') {
            throw ValidationException::withMessages([
                'email' => 'Girdiğin bilgiler yanlış',
            ]);
        }
        else {
            $xsrftoken = $request->headers->all()['cookie'];
            $token = 'Bearer ' . $response['token'];
            session(['token' => $token]);
            // I'll try to get cookie from sanctum/csrf-cookie and set it to a variable and then set that as the  
            // cookie every time you send a request i guess
            return redirect('/home', 302, ['Authorization' => $token]); //I was getting a bad 
            //gateway error but removing ", 'Set-Cookie' => $xsrftoken, 'X-XSRF-TOKEN' => $xsrftoken" from the 
            // return parameters somehow fixed it 

        }
    }

    public function destroy()
    {
        Auth::logout();
        session()->forget('token');
        return redirect('home');
    }
}
