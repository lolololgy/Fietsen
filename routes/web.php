<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FietsController;
use App\Http\Controllers\KlantController;
use App\Http\Controllers\WinkelmandController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('/home');
});
Route::get('', function () {
    return redirect('/home');
});



Route::post('/winkelmand/add', [WinkelmandController::class, 'addToCart'])->name('winkelmand.add');
// View cart
Route::get('/winkelmand', [WinkelmandController::class, 'viewCart'])->name('winkelmand.view');

// Remove item from cart
Route::post('/winkelmand/remove/{id}', [WinkelmandController::class, 'removeFromCart'])->name('winkelmand.remove');

// Checkout
Route::get('/winkelmand/checkout', [WinkelmandController::class, 'checkout'])->name('winkelmand.checkout');

Route::get('/winkelmand/items', [WinkelmandController::class, 'getCartItems'])->name('winkelmand.items');
Route::post('/winkelmand/checkout', [WinkelmandController::class, 'checkout'])->name('winkelmand.checkout');
Route::get('/winkelmand', [WinkelmandController::class, 'showCart'])->name('card.view');
Route::post('/winkelmand/remove', [WinkelmandController::class, 'removeItem'])->name('winkelmand.remove');


Route::get('/home', [HomeController::class, 'view'])->name('home');

Route::get('/home', [HomeController::class, 'view'])->name('home');

Route::get('/userRegister', [UserController::class, 'showUserRegistrationForm']);
Route::post('/userRegister', [UserController::class, 'userRegister'])->name('userRegister');

Route::get('/userLogin', [UserController::class, 'showUserLoginForm']);
Route::post('/userLogin', [UserController::class, 'userLogin'])->name('userLogin');

Route::post('/userLogout', [UserController::class, 'userLogout'])->name('userLogout');
Route::get('/userLogout', [UserController::class, 'userLogout'])->name('userLogout');

Route::get('/register', [KlantController::class, 'showRegistrationForm']);
Route::post('/register', [KlantController::class, 'register'])->name('register');

Route::get('/login', [KlantController::class, 'showLoginForm']);
Route::post('/login', [KlantController::class, 'login'])->name('login');

Route::post('/logout', [KlantController::class, 'logout'])->name('logout');

//images ophalen voor de fietsen
Route::get('/image/{filename}', function ($filename) {
    if(Auth::user()->is_admin == 0){
        abort(403);
    }

    $safeFilename = basename($filename);
    $path = storage_path('app/private/assets/fietsen/' . $safeFilename);

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path);
})->name('image');

//images ophalen voor de fietsen
Route::get('/image/fiets/{filename}', function ($filename) {

    $safeFilename = basename($filename);
    $path = storage_path('app/private/assets/fietsen/' . $safeFilename);

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path);
})->name('image.fiets');

//fiets logica routes
Route::get('/create-bike', [FietsController::class, 'createBike'])->name('create-bike');
Route::post('/create-bike', [FietsController::class, 'storeBike'])->name('store-bike');
Route::post('/logout', [KlantController::class, 'logout'])->name('logout');
//Route::get('/logout', [KlantController::class, 'logout'])->name('logout');


Route::get('/customerView', function () {
    return view('CustomerViewPortal.customerView');
})->middleware('auth:userAuth');

Route::get('/webshop', [FietsController::class, 'showWebshop'])->name('webshop');



Route::get('/update-bike/{id}', [FietsController::class, 'updateBike']);
Route::post('/update-bike/{id}', [FietsController::class, 'updatingBike']);

Route::delete('/delete-bike/{id}', [FietsController::class, 'destroyBike']);

Route::get('/overview-bike', [FietsController::class, 'overviewBike'])->name('overview-bike');
