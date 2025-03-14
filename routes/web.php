<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return redirect('/home');
});
Route::get('', function () {
    return redirect('/home');
});

Route::get('/home', [HomeController::class, 'view'])->name('home');

Route::get('/register', [UserController::class, 'showRegistrationForm']);
Route::post('/register', [UserController::class, 'register'])->name('register');

Route::get('/login', [UserController::class, 'showLoginForm']);
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

//images ophalen voor de fietsen
Route::get('/image/{filename}', function ($filename) {
    $path = storage_path('app/private/assets/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path);
})->middleware('auth');

