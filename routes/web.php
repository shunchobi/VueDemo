<?php

use App\Http\Controllers\FormController;
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
});

Route::get('/sec2', function () {
    return view('section2');
});

Route::get('/componentsGame', function () {
    return view('componentsGame');
});

Route::get('/form', function () {
    return view('formApp');
});

Route::get('/apiTest', function () {
    return view('apiTest');
});

Route::post('/register', [FormController::class, 'register'])->name('register');