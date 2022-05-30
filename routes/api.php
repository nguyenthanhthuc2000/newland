<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostsController;
use App\Http\Controllers\Customer\RequestContactController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/crawl-news', [PostsController::class, 'crawlNewsCafeF']);
Route::get('news', [PostsController::class, 'getNews']);
Route::get('news/{id}', [PostsController::class, 'getNewsDetail']);

Route::delete('post/delete/{id}', [PostsController::class, 'deleteCafeF']);
Route::delete('project/delete/{id}', [PostsController::class, 'deleteCenHome']);

//REQUEST CONTACT
Route::post('request-contact/store', [RequestContactController::class, 'store']);