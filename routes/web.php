<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;

use App\Http\Controllers\Customer\PostController;
use App\Http\Controllers\Customer\RequestContactController;
use App\Http\Controllers\Customer\NewsController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminArticleController;
use App\Http\Controllers\Admin\UploadController;

use App\Http\Controllers\PostsController;
use App\Http\Controllers\Followers;

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

Route::prefix("crawl")->group(function(){
    Route::get('/posts', [PostsController::class, 'crawlPosts'])->name('posts.crawl');
});

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('404', [HomeController::class, 'page404'])->name('home.page404');
Route::post('follow', [Followers::class, 'follow'])->name('home.follow');

// AUTH CONTROLLER
//LOGIN GOOGLE
Route::get('/login-google', [AuthController::class, 'loginGoogle'])->name('google.login');
Route::get('/google/callback', [AuthController::class, 'callbackGoogle'])->name('google.callback');

//LOGIN FACEBOOK
Route::get('/login-facebook', [AuthController::class, 'loginFacebook'])->name('facebook.login');
Route::get('/facebook/callback', [AuthController::class, 'callbackFacebook'])->name('facebook.callback');

Route::get('dang-nhap-google',  [AuthController::class, 'loginGoogle'])->name('auth.change.password');
Route::get('doi-mat-khau',  [AuthController::class, 'changePassword'])->name('auth.change.password');
Route::get('dang-ki',  [AuthController::class, 'getRegister'])->name('auth.get.register');
Route::get('dang-nhap',  [AuthController::class, 'getLogin'])->name('auth.get.login');
Route::get('dang-xuat',  [AuthController::class, 'getLogout'])->name('auth.get.logout');
Route::post('register',  [AuthController::class, 'postRegister'])->name('auth.post.register');
Route::post('post-login',  [AuthController::class, 'postLogin'])->name('auth.post.login');
Route::post('post-update',  [AuthController::class, 'postUpdate'])->name('auth.post.update');
Route::post('update-password',  [AuthController::class, 'updatePassword'])->name('auth.update.password');

// AJAX
Route::post('fetchDistrictList',  [Controller::class, 'getDistrict'])->name('get.districts');
Route::post('fetchWards',  [Controller::class, 'getWards'])->name('get.wards');
Route::post('fetchStreet',  [Controller::class, 'getStreet'])->name('get.streets');
Route::post('fetchCategory',  [PostController::class, 'getCategory'])->name('get.category');
Route::post('updateState',  [PostController::class, 'updateState'])->name('article.update.state');

Route::get('tin-dang/{slug}', [PostController::class, 'detail'])->name('post.detail');

//REQUEST CONTACT
Route::post('request-contact', [RequestContactController::class, 'store'])->name('request.contact.store');

//LIST ARTICLE
Route::get('danh-muc/{slugs}', [CategoryController::class, 'viewCategory'])->name('category.index');
Route::get('danh-sach-bat-dong-san-tren-toan-quoc', [ArticleController::class, 'allArticle'])->name('article.index');
Route::get('tin-tuc-noi-bat', [ArticleController::class, 'featureArticle'])->name('article.featured');

Route::prefix('tim-kiem')->group(function () {
    Route::get('', [ArticleController::class, 'filter'])->name('article.filter');
    Route::get('/theo-gia', [ArticleController::class, 'searchByPrice'])->name('article.search');
    Route::get('/bai-viet-cung-nguoi-dang-us{id}', [UserController::class, 'articlesSameEntrant'])->name('article.SameEntrant');
});

// CHECK LOGIN
Route::middleware(['auth'])->group(function () {
    // ARTICLE
    Route::get('dang-tin', [PostController::class, 'index'])->name('post.index');
    Route::post('dang-tin', [PostController::class, 'store'])->name('post.store');
    Route::get('destroy/{id}',  [PostController::class, 'destroy'])->name('post.destroy');
    Route::get('chinh-sua-bai-viet/{id}',  [PostController::class, 'edit'])->name('post.edit');
    Route::post('update/{id}',  [PostController::class, 'update'])->name('post.update');
    // USER
    Route::get('thong-tin-ca-nhan',  [UserController::class, 'info'])->name('auth.info');
    Route::get('bai-viet-ca-nhan',  [UserController::class, 'personalArticle'])->name('auth.article');
});

///ADMIN
Route::middleware(['auth'])->group(function () {
    Route::middleware(['checkLevel'])->group(function () {
        Route::prefix("admin")->group(function(){
            Route::prefix('upload-manager')->group(function () {
                Route::post('uploads-ckeditor',[UploadController::class, 'uploads_ckeditor']);
                Route::get('file/file-browser',[UploadController::class, 'file_browser']);
            });

            Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
            Route::get('/nguoi-dang-ki-nhan-tin', [Followers::class, 'index'])->name('admin.list.followers');
            Route::get('thong-tin-website', [DashboardController::class, 'setting'])->name('admin.setting');
            Route::post('update-setting', [DashboardController::class, 'updateSetting'])->name('setting.update');

            //HINH ANH
            //BANNER
            Route::get('banner', [DashboardController::class, 'listBanner'])->name('admin.banners');
            Route::get('them-moi-banner', [DashboardController::class, 'createBanner'])->name('admin.create.banner');

            Route::get('slider', [DashboardController::class, 'listSlider'])->name('admin.sliders');
            Route::get('chinh-sua-hinh-anh/{id}', [DashboardController::class, 'editSlider'])->name('admin.edit.slider');
            Route::get('them-moi-hinh-anh', [DashboardController::class, 'createSlider'])->name('admin.create.slider');
            Route::post('store-slider', [DashboardController::class, 'storeSlider'])->name('admin.store.slider');
            Route::post('update-slider/{id}', [DashboardController::class, 'updateSlider'])->name('admin.update.slider');
            Route::post('destroy-slider', [DashboardController::class, 'destroySlider'])->name('admin.destroy.slider');
            Route::post('update-status-slider', [DashboardController::class, 'updateStatusSlider'])->name('admin.update.status.slider');

            //KHACH HANG
            Route::get('nguoi-dung', [UserController::class, 'listCustomer'])->name('admin.list.customer');
            Route::get('profile/{id}', [UserController::class, 'profile'])->name('admin.profile.customer');
            Route::post('update-status', [UserController::class, 'updateStatus'])->name('admin.update.status.user');
        });

        Route::prefix("tin-bat-dong-san")->group(function(){
            Route::post('unconfirm-article', [AdminArticleController::class, 'unconfirmArticle'])->name('article.unconfirm');
            Route::post('confirm-article', [AdminArticleController::class, 'confirmArticle'])->name('article.confirm');
            Route::post('update-featured-article', [AdminArticleController::class, 'updateFeaturedArticle'])->name('update-featured-article');
            Route::post('update-vip-article', [AdminArticleController::class, 'updateVipArticle'])->name('update-vip-article');
            Route::get('', [AdminArticleController::class, 'listArticle'])->name('article.list');
        });

        Route::prefix("quan-li-tin-tuc")->group(function(){
            Route::get('danh-sach-tin-tuc', [PostsController::class, 'index'])->name('news.manage');
            Route::get('them-moi-tin-tuc', [PostsController::class, 'create'])->name('news.add');
            Route::post('store', [PostsController::class, 'store'])->name('news.store');
            Route::post('update/{id}', [PostsController::class, 'update'])->name('news.update');
            Route::get('chinh-sua/{id}', [PostsController::class, 'edit'])->name('news.edit');
            Route::post('update-status-news', [PostsController::class, 'updateStatusNews'])->name('update-status-news');
            Route::get('destroy-news/{id}', [PostsController::class, 'destroy'])->name('news.destroy');
            Route::get('/{type}', [PostsController::class, 'editByType'])->name('news.edit.type');
            Route::get('crawl/news-cafe-f', [PostsController::class, 'crawlNewsCafeF'])->name('news.crawl.news.cafe.f');
        });
    });
});

// NEWS
Route::prefix('tin-tuc')->group(function () {
    Route::get('', [NewsController::class, 'index'])->name('news.index');
    Route::get('/{slug}', [NewsController::class, 'detail'])->name('news.detail');

});
