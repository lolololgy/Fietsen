<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FietsController;
use Illuminate\Support\Facades\Auth;

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

//images ophalen voor de paginas
Route::get('/image/{filename}', function ($filename) {
    if(Auth::user()->is_admin == 0){
        abort(403);
    }

    $path = storage_path('app/private/assets/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path);
})->middleware('auth')->name('image');

//images ophalen voor de fietsen
Route::get('/image/fiets/{filename}', function ($filename) {
    if(Auth::user()->is_admin == 0){
        abort(403);
    }

    $path = storage_path('app/private/assets/fietsen/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path);
})->middleware('auth')->name('image.fiets');

//fiets logica routes
Route::get('/create-bike', [FietsController::class, 'createBike'])->name('create-bike');
Route::post('/create-bike', [FietsController::class, 'storeBike'])->name('store-bike');

Route::get('/update-bike/{id}', [FietsController::class, 'updateBike']);
Route::post('/update-bike/{id}', [FietsController::class, 'updatingBike']);

Route::get('/overview-bike', [FietsController::class, 'overviewBike'])->name('overview-bike');
