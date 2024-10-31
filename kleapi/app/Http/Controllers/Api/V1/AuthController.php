<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request){
        //kullanıcı e posta şifresini doğrula ve bi değişkene ata
        
        $attr = [request()->email , request()->password];
        //doğrulanmış verilerle giriş yapmayı dene        
        // return response()->json($attr);
        //doğrulanmış verilerle giriş yapmayı dene 
        //return [User::where('email', $request->email)->first() , $request->email , User::where('password' , $request->password)->first() , $request->password];

        $user = User::where('email', $request->email)->first();
        if(  $user == '' ||  password_verify($request->input('password'),$user->password) == false || password_verify($request->input('password'),$user->password) == null)
        {
            return [
            'valid' => 'false'
            ];
        }
        else{
        $user = User::where('email', $request->email)->first();
        $token = $user->createToken($user->name.'Auth-Token')->plainTextToken;
        $msg = response()->json([
            'message' => 'Login Success Mate' ,
            'token_type' => 'Bearer',
            'token' => $token ,
            'user' => $user , 
            'password' => $user->password
        ]);
        return response([ 
            'user' => $user,
            'token' => $token,
            'msg' => $msg,
            'valid' => 'true'
        ])->withHeaders([
            'Authorization' => 'Bearer '.$token,
        ])
        ;
        }
    }

    public function register(Request $request){
        $validatedAttributes = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required' , 'email'],
            'password' => ['required' , Password::min(6) , 'confirmed'],
        ]);
        
        $user = User::create($validatedAttributes);

        if($user){
            $token = $user->createToken($user->name.'Auth-Token')->plainTextToken; 

            //Auth::login($user);

        $msg = response()->json([
            'message' => 'Register Success Mate' ,
            'token_type' => 'Bearer',
            'token' => $token
        ]);
        }
        return [$msg ,$user,$token]; 
        
        
    }

    public function logout(Request $request)
    {
        $user= User::where('id' , $request->user()->id)->first();

        if($user)
        {

            $user->tokens()->delete();

            return response()->json([
                'message' => "You're now Logged out Mate",
            ],200);
        }
        else
        {
            return response()->json([
                'message' => "Couldn't find that user Mate"
            ],404);
        }
    }
            
}
