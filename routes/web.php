<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
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

Route::get('/', [Controller::class, 'index'])->name('index');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/actionregister', [AuthController::class, 'registrationSave'])->name('register.action');
    Route::get('/forgot', [AuthController::class, 'forgot'])->name('forgot');
    Route::post('/actionforgot', [AuthController::class, 'forgotAction'])->name('forgot.action');
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/actionlogin', [AuthController::class, 'authenticate'])->name('login.action');
});
Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'panel'], function () {
        Route::get('/', [Controller::class, 'dashboard'])->name('panel.index');
        Route::get('/profil', [Controller::class, 'profil'])->name('panel.profil');
        Route::get('/resetpassword', [AuthController::class, 'resetpassword'])->name('panel.resetpassword');
        Route::group(['prefix' => 'article'], function () {
            Route::get('/', [ArticleController::class, 'index'])->name('article.index');
            Route::get('data', [ArticleController::class, 'data'])->name('article.data');
            Route::get('create', [ArticleController::class, 'create'])->name('article.create');
            Route::post('store', [ArticleController::class, 'store'])->name('article.store');
            Route::get('edit/{id}', [ArticleController::class, 'edit'])->name('article.edit');
            Route::post('update/{id}', [ArticleController::class, 'update'])->name('article.update');
            Route::get('delete/{id}', [ArticleController::class, 'destroy'])->name('article.delete');
        });
    });
    Route::get('/logout', [AuthController::class, 'logout'])->name('login.logout');
});
