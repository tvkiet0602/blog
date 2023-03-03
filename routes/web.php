<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\UsersController;
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

    Route::match(['get', 'post'], '/detail/{id}', [UsersController::class, 'detailPosts'])->name('detail');
//    Route::post('/detail/{id}', [UsersController::class, 'detailPosts'])->name('comment');
    Route::match(['post', 'get'], '/add/{id}', [UsersController::class, 'addPosts'])->name('add-posts');

    Route::match(['post', 'get'], '/list/{id}', [UsersController::class, 'listPage'])->name('list-page');
});
