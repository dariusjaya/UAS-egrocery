<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['web'])->group(function (){
    Route::get('/login', function (){
        return view('login');
    })->name('login');

    Route::post('/dologin', [\App\Http\Controllers\AccountController::class, 'authenticate']);
    Route::get('/dologout', [\App\Http\Controllers\AccountController::class, 'logout']);
    Route::post('/doregister', [\App\Http\Controllers\AccountController::class, 'register']);

    Route::get('/register', function (){
        return view('register');
    });

    Route::get('/', function (){
        \Illuminate\Support\Facades\Auth::logout();
        return view('message', ['message'=> "Find and Buy Your Grocery Here!"]);
    });


    Route::middleware(['logged_in'])->group(function (){
        Route::get('/home', [\App\Http\Controllers\ItemController::class, 'home_page']);
        Route::get('/profile', [\App\Http\Controllers\AccountController::class, 'profile_page']);
        Route::post('/profile/update', [\App\Http\Controllers\AccountController::class, 'update']);


        Route::get('/item/{id}', [\App\Http\Controllers\ItemController::class, 'detail_page']);
        Route::post('/cart/add/{id}', [\App\Http\Controllers\CartController::class, 'buy']);
        Route::get('/cart', [\App\Http\Controllers\CartController::class, 'cart_page']);
        Route::post('/cart/delete/{id}', [\App\Http\Controllers\CartController::class, 'delete']);
        Route::post('/cart/checkout', [\App\Http\Controllers\CartController::class, 'checkout']);

        Route::middleware('admin_only')->group(function (){
            Route::get('/accounts', [\App\Http\Controllers\AccountController::class, 'accounts_page'])->middleware('admin_only');
            Route::post('/account/{acc_id}/update-role', [\App\Http\Controllers\AccountController::class, 'update_role']);
            Route::post('/account/{id}/delete', [\App\Http\Controllers\AccountController::class, 'delete']);
        });

    });


});






