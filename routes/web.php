<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\PostController;
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

Route::get('/', [PostController::class, 'index'])->name('post.index');
// Route::get('post', "Customer/PostController@index")->name('post.index');



// GET LOCAL AJAX
Route::post('fetchDistrictList',  [PostController::class, 'getDistrict'])->name('get.districts');
Route::post('fetchWards',  [PostController::class, 'getDistrict'])->name('get.wards');
Route::post('fetchStreet',  [PostController::class, 'getDistrict'])->name('get.streets');