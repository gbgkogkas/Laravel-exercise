<?php

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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => '/user'], function () {
    Route::get('/add', 'Controller@userCreationPage')->name('registerUser');

    Route::get('/delete', 'Controller@getDeletePage')->name('deleteUser');

    Route::delete('/delete', 'Controller@deleteUser')->name('deleteUserAction');

    Route::put('/register', 'Controller@createUser')->name('registerUserAction');

    Route::get('/{id}', 'Controller@getProfile')->name('profile');
});
