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

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::match(['get', 'post'], '/login', [AdminController::class, 'login'])->name('login');
    Route::get ('/logout', [AdminController::class, 'logout'])->name('logout');


    Route::get( '/managerUser', [AdminController::class, 'managerUser'] )->name('user-manager');
    Route::get('/delete/{id}', [AdminController::class, 'deleteUser'])->name('delete-user');
    Route::match(['get', 'post'], '/editUser/{id}', [AdminController::class, 'editUser'] )->name('edit-user');

    Route::match(['get', 'post'], '/article', [AdminController::class, 'article'] )->name('article-manager');
    Route::get('/delete/{id}', [AdminController::class, 'deleteArticle'])->name('delete-article');
    Route::match(['get', 'post'], '/editArticle/{id}', [AdminController::class, 'editArticle'] )->name('edit-article');

    Route::get ('/managerCmt', [AdminController::class, 'managerCmt'] )->name('comment-manager');
    Route::get('/deleteCheck/{id}', [AdminController::class, 'deleteCheck'] )->name('comment-check-del');
    Route::get('/updateCheck/{id}', [AdminController::class, 'updateCheck'] )->name('comment-check-up');
//    Route::post('/checkCmt/{id}', [AdminController::class, 'checkCmt'] )->name('comment-check');
//    Route::post('/managerCmt', [AdminController::class, 'managerCmt'] )->name('comment-delete');

});

