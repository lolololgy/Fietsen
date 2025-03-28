<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KlantController;

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', [HomeController::class, 'view'])->name('home');

Route::get('/userRegister', [UserController::class, 'showUserRegistrationForm']);
Route::post('/userRegister', [UserController::class, 'userRegister'])->name('userRegister');

Route::get('/userLogin', [UserController::class, 'showUserLoginForm']);
Route::post('/userLogin', [UserController::class, 'userLogin'])->name('userLogin');

Route::post('/userLogout', [UserController::class, 'userLogout'])->name('userLogout');
Route::get('/userLogout', [UserController::class, 'userLogout'])->name('userLogout');

//images ophalen voor de fietsen
Route::get('/image/{filename}', function ($filename) {
    $path = storage_path('app/private/assets/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path);
})->middleware('auth:userAuth');



Route::get('/register', [KlantController::class, 'showRegistrationForm']);
Route::post('/register', [KlantController::class, 'register'])->name('register');

Route::get('/login', [KlantController::class, 'showLoginForm']);
Route::post('/login', [KlantController::class, 'login'])->name('login');

Route::post('/logout', [KlantController::class, 'logout'])->name('logout');
//Route::get('/logout', [KlantController::class, 'logout'])->name('logout');


Route::get('/customerView', function () {
    return view('CustomerViewPortal.customerView');
})->middleware('auth:userAuth');
