<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::get('/', function () {
    return view('welcome');
})->middleware("auth")->name("home");

Route::middleware("guest")->group(function (){
    Route::get('login', [LoginController::class, "formLogin"])->name('login');
    Route::post("login", [LoginController::class, "login"])->name("login");

    Route::get("register", [RegisterController::class, "formRegister"])->name('register');
    Route::post("register", [RegisterController::class, "register"])->name('register');
});

Route::post("logout", [LogoutController::class, "logout"])->middleware("auth")->name("logout");
