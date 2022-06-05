<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostsController;
use App\Http\Controllers\Customer\RequestContactController;

Route::post('login', [PostsController::class, 'login']);
Route::post('request-contact/store', [RequestContactController::class, 'store']);
Route::post('follow', [PostsController::class, 'follow']);
Route::get('news', [PostsController::class, 'getNews']);
Route::get('news/{id}', [PostsController::class, 'getNewsDetail']);

Route::group(['middleware' => ['auth:sanctum']], function () {
  Route::get('logout', [PostsController::class, 'logout']);
  Route::get('/crawl-news', [PostsController::class, 'crawlNewsCafeF']);
  Route::delete('post/delete/{id}', [PostsController::class, 'deleteCafeF']);
  Route::delete('project/delete/{id}', [PostsController::class, 'deleteCenHome']);
  Route::put('project/update-status', [PostsController::class, 'updateStatusCafeF']);
});
