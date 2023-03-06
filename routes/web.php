<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\UsersController;
use App\Http\Controllers\Backend\AdminController;
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

Route::prefix('/')->group(function (){
    Route::get('/home', [UsersController::class, 'home'])->name('home');

    Route::match(['get', 'post'], '/register', [UsersController::class, 'register'])->name('register');
    Route::match(['get', 'post'], '/login', [UsersController::class, 'login'])->name('login');
    Route::get ('/logout', [UsersController::class, 'logout'])->name('logout');

    Route::match(['get', 'post'], '/detail/{id}', [UsersController::class, 'detailPosts'])->name('detail');
//    Route::post('/detail/{id}', [UsersController::class, 'detailPosts'])->name('comment');
    Route::match(['post', 'get'], '/add/{id}', [UsersController::class, 'addPosts'])->name('add-posts');

    Route::match(['post', 'get'], '/list/{id}', [UsersController::class, 'listPage'])->name('list-page');
});

Route::prefix('/admin')->group(function (){
    Route::match(['get', 'post'], '/login', [AdminController::class, 'login'])->name('login');

    Route::get('/', function () {
        return view('backend.layouts.partials.menu');
    });
});

