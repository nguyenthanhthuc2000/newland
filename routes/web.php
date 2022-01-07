<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Customer\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('post', [PostController::class, 'index'])->name('post.index');


// AUTH CONTROLLER
Route::get('register',  [AuthController::class, 'getRegister'])->name('auth.get.register');
Route::get('login',  [AuthController::class, 'getLogin'])->name('auth.get.login');
Route::get('logout',  [AuthController::class, 'getLogout'])->name('auth.get.logout');
Route::post('register',  [AuthController::class, 'postRegister'])->name('auth.post.register');
Route::post('post-login',  [AuthController::class, 'postLogin'])->name('auth.post.login');

// GET LOCAL AJAX
Route::post('fetchDistrictList',  [Controller::class, 'getDistrict'])->name('get.districts');
Route::post('fetchWards',  [Controller::class, 'getWards'])->name('get.wards');
Route::post('fetchStreet',  [Controller::class, 'getStreet'])->name('get.streets');

