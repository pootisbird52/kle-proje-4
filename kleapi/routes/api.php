<?php

use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1/')->group(function() {
    Route::post('/register', [AuthController::class, 'register']);    

    Route::post('/login', [AuthController::class, 'login']);
});



Route::middleware(['auth:sanctum'])->prefix('v1/')->group(function () {
    Route::resource('product', ProductController::class);
    
    Route::patch('/product/{id}', [ProductController::class, 'update']);
    Route::delete('/product/{id}', [ProductController::class, 'destroy']);
    
    Route::post('/logout', [AuthController::class, 'logout']);
    //Product
    Route::get('/home', [ProductController::class, 'index']);
    Route::get('/authtest' , function(){
        return response()->json(['Auth'],401);
    });
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
