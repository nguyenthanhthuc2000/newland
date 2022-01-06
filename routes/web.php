<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\PostController;
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

Route::get('/', [PostController::class, 'index'])->name('post.index');
// Route::get('post', "Customer/PostController@index")->name('post.index');


// AUTH CONTROLLER
Route::post('register',  [AuthController::class, 'postRegister'])->name('auth.post.register');
Route::post('login',  [AuthController::class, 'postLogin'])->name('auth.post.login');

// GET LOCAL AJAX
Route::post('fetchDistrictList',  [PostController::class, 'getDistrict'])->name('get.districts');
Route::post('fetchWards',  [PostController::class, 'getWards'])->name('get.wards');
Route::post('fetchStreet',  [PostController::class, 'getStreet'])->name('get.streets');

