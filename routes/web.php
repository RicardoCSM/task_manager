<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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
    return view('site.index', ['title' => 'Index']);
});

Route::get('/register', [RegisterController::class, 'index'])->name('site.register');
Route::post('/register', [RegisterController::class, 'store'])->name('site.register');

Route::get('/login', [LoginController::class, 'index'] )->name('site.login');
Route::post('/login', [LoginController::class, 'auth'] )->name('site.login');


Route::middleware('auth')->prefix('/app')->group(function() { 
    Route::get('/home', function () {
        return 'Aqui';
    })->name('app.home');
});   