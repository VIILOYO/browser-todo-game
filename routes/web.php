<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Characteristic\CharacteristicController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::get('/registration', [AuthController::class, 'registration'])->name('registration');
    Route::post('/accept-registration', [AuthController::class, 'acceptRegistration'])->name('accept-registration');
});


Route::group(['prefix' => 'characteristics', 'as' => 'characteristics.'], function () {
    Route::get('/', [CharacteristicController::class, 'index'])->name('get');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
});
