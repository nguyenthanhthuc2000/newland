<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostsController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Customer\RequestContactController;

Route::post('login', [PostsController::class, 'login']);
Route::post('request-contact/store', [RequestContactController::class, 'store']);
Route::post('follow', [PostsController::class, 'follow']);
Route::get('posts', [PostsController::class, 'getNews']);
Route::get('posts/{id}', [PostsController::class, 'getNewsDetail']);

// get location
Route::get('getProvinces',  [Controller::class, 'getProvince'])->name('get.province');
Route::get('getDistricts/{province_id}',  [Controller::class, 'getDistrict'])->name('get.districts');
Route::get('getWards/{province_id}/{district_id}',  [Controller::class, 'getWards'])->name('get.wards');

Route::group(['middleware' => ['auth:sanctum']], function () {
  Route::get('logout', [PostsController::class, 'logout']);
  Route::get('/crawl-news', [PostsController::class, 'crawlNewsCafeF']);
  Route::delete('news/delete/{id}', [PostsController::class, 'deleteCafeF']);
  Route::delete('project/delete/{id}', [PostsController::class, 'deleteCenHome']);
  Route::put('project/update-status', [PostsController::class, 'updateStatusCafeF']);
});
