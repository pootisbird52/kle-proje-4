<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

VerifyCsrfToken::class; //delete this later and see if site breaks

Route::get('/', function () {
     return redirect('/home');
});

Route::middleware([EnsureTokenIsValid::class])->group(function () {
     Route::resource('product', ProductController::class);
     Route::get('/home', [ProductController::class, 'index']);
     Route::patch('/product/{id}', [ProductController::class, 'update']);
     Route::delete('product/{id}' ,[ProductController::class, 'destroy']);
     Route::post('/logout', [SessionController::class, 'destroy']);
});

Route::middleware(['guest'])->group(function () {
     Route::get('/register', [RegisterUserController::class, 'create']);
     Route::post('/register', [RegisterUserController::class, 'store']);
     
     Route::get('/login', [SessionController::class, 'create']);
     Route::post('/login', [SessionController::class, 'store']);
     
     Route::get('/guest', function(){
          return view('my-auth.warnguest');
     });
})->withoutMiddleware(EnsureTokenIsValid::class);
