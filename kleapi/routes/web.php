<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterUserController;


Route::get('/', function () {
    return redirect('/home');
});

//Product
// Route::resource('product' ,ProductController::class);
// Route::patch('/product/{id}' , [ProductController::class , 'update']); 
// Route::delete('/product/{id}' , [ProductController::class , 'destroy']); 
// Route::get('/home' , [ProductController::class , 'index']);

// Route::get('/register' , [RegisterUserController::class , 'create'])->middleware('guest');
// Route::post('/register' , [RegisterUserController::class , 'store'])->middleware('guest');

// Route::get('/login' , [SessionController::class , 'create'])->middleware('guest');
// Route::post('/login' , [SessionController::class , 'store'])->middleware('guest');
// Route::post('/logout' , [SessionController::class , 'destroy']);






//  Route::get('/dashboard', function () {
//      return redirect('/home');
//      return view('dashboard');
//  })->middleware(['auth', 'verified'])->name('dashboard');
//  Route::middleware('auth')->group(function () {
//      Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//      Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//      Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//  });

// require __DIR__.'/auth.php';
// Route::get('/product/create' , [ProductController::class , 'create'])->middleware('auth');
// Route::post('/product' , [ProductController::class , 'store'])->middleware('auth');
//   Route::get('/product/{id}' ,  [ProductController::class,'indexproduct']);
//   Route::get('/product/{id}/edit' , [ProductController::class,'edit']);
//   Route::get('/product/{id}/delete' , [ProductController::class,'delete']);

// // Route::get('/product/{id}', function ($id) {
// //     dd($id);
// // });

//  Route::controller(ProductController::class)->group(function(product $product) {
//      dd($product);
//      Route::get('/product/{id}' , ['indexproduct']);
//      Route::get('/product/{id}/edit' , ['edit']);
//      Route::get('/product/{id}/delete' , ['delete']);
//  });
