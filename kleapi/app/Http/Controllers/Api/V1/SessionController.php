<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
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
        
        $attr = [request()->email , request()->password];
        //doğrulanmış verilerle giriş yapmayı dene        
        return response()->json($attr);
        if( ! Auth::attempt($attr))
        {
            $authvalid = false;
            throw ValidationException::withMessages([
                'email' => 'Girdiğin bilgiler yanlış',
            ]);
        }
        $authvalid=true;
        //session tokenını yenile
        request()->session()->regenerate();

        //ana sayfaya yönlendir
        // return $validatedAttributes;
        return response()->json([
            'Niggas' => 'In paris',
            'AuthValid' => $authvalid
        ]);
        // return redirect('/home');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('home');
    }
}
