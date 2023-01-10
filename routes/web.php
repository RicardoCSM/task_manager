<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FilterController;

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
})->name('site.index');

Route::get('/about', function () {
    return view('site.about', ['title' => 'About']);
})->name('site.about');

Route::get('/register', [RegisterController::class, 'index'])->name('site.register');
Route::post('/register', [RegisterController::class, 'store'])->name('site.register');

Route::get('/login', [LoginController::class, 'index'] )->name('site.login');
Route::post('/login', [LoginController::class, 'auth'] )->name('site.login');


Route::middleware('login')->prefix('/app')->group(function() { 
    Route::get('/home', function () {
        return view('app.home', ['title' => 'Home']);
    })->name('app.home');
    Route::get('/exit', [LoginController::class, 'exit'])->name('app.exit'); 
    Route::resource('/task', TaskController::class);

    Route::get('/search', [FilterController::class, 'search'])->name('app.search');
    Route::get('/orderby', [FilterController::class, 'orderby'])->name('app.orderby');
});   