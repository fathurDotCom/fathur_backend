<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ArticleController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('user', [UserController::class, 'index'])->name('api.user');
Route::post('user', [UserController::class, 'store'])->name('api.user.store');
Route::put('user/{id}', [UserController::class, 'update'])->name('api.user.update');

Route::get('article', [ArticleController::class, 'index'])->name('api.article');
Route::post('article', [ArticleController::class, 'store'])->name('api.article.store');
Route::get('article/{id}', [ArticleController::class, 'show'])->name('api.article.detail');
Route::put('article/{id}', [ArticleController::class, 'update'])->name('api.article.update');
Route::delete('article/{id}', [ArticleController::class, 'destroy'])->name('api.article.delete');
