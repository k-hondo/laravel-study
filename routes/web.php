<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilityController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\RequestSampleController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HiLowController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AdminBlogController;


// ////////////////////////////////////////////////
// ねこカフェサイトのルーティング
// ////////////////////////////////////////////////

// ねこカフェサイト トップページ
Route::view('/', 'index')->name('index');

// お問い合わせ
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'sendMail']);
Route::get('/contact/complete', [ContactController::class, 'complete'])->name('contact.complete');

// ブログ
Route::get('/admin/blogs', [AdminBlogController::class, 'index'])->name('admin.blogs.index');
Route::get('/admin/blogs/create', [AdminBlogController::class, 'create'])->name('admin.blogs.create');
Route::post('/admin/blogs', [AdminBlogController::class, 'store'])->name('admin.blogs.store');
Route::get('/admin/blogs/{blog}', [AdminBlogController::class, 'edit'])->name('admin.blogs.edit');
Route::put('/admin/blogs/{blog}', [AdminBlogController::class, 'update'])->name('admin.blogs.update');
Route::delete('/admin/blogs/{blog}', [AdminBlogController::class, 'destroy'])->name('admin.blogs.destroy');






// ////////////////////////////////////////////////
// Laravel学習用のルーティング
// ////////////////////////////////////////////////

// Laravel学習 トップページ
Route::get('/laravel-study', fn() => view('laravel-study.index'))->name('laravel-study.index');

// サンプルページ
Route::get('/laravel-study/hello-world', fn() => view('laravel-study.hello_world'));
Route::get('/laravel-study/hello', fn() => view('laravel-study.hello', [
    'name' => '山田',
    'course' => 'Laravel',
]));

// カリキュラムページ
Route::get('/laravel-study/curriculum', fn() => view('laravel-study.curriculum'))->name('laravel-study.curriculum');

// 世界の時間
Route::get('/laravel-study/world-time', [UtilityController::class, 'worldTime'])->name('laravel-study.world-time');

// おみくじ
Route::get('/laravel-study/omikuji', [GameController::class, 'omikuji'])->name('laravel-study.omikuji');

// モンティ・ホール問題
Route::get('/laravel-study/monty-hall', [GameController::class, 'montyHall'])->name('laravel-study.monty-hall');

// リクエスト
Route::get('/laravel-study/form', [RequestSampleController::class, 'form'])->name('laravel-study.form');
Route::get('/laravel-study/query-strings', [RequestSampleController::class, 'queryStrings'])->name('laravel-study.query-strings');
Route::get('/laravel-study/users/{id}', [RequestSampleController::class, 'profile'])->name('laravel-study.profile');
Route::get('/laravel-study/products/{category}/{year}', [RequestSampleController::class, 'productsArchive'])->name('laravel-study.products-archive');
Route::get('/laravel-study/route-link', [RequestSampleController::class, 'routeLink'])->name('laravel-study.route-link');

Route::get('/laravel-study/login', [RequestSampleController::class, 'loginForm'])->name('laravel-study.login-form');
Route::post('/laravel-study/login', [RequestSampleController::class, 'login'])->name('laravel-study.login');

Route::name('laravel-study.')->group(function () {
    Route::resource('/laravel-study/events', EventController::class)->only(['create', 'store']);
});

// ハイローゲーム
Route::get('/laravel-study/hi-low', [HiLowController::class, 'index'])->name('laravel-study.hi-low');
Route::post('/laravel-study/hi-low', [HiLowController::class, 'result'])->name('laravel-study.hi-low.result');

// ファイル管理
Route::name('laravel-study.')->group(
    function () {
        Route::resource('/laravel-study/photos', PhotoController::class)->only(['create', 'store', 'show', 'destroy']);
    }
);
Route::get('/laravel-study/photos/{photo}/download', [PhotoController::class, 'download'])->name('laravel-study.photos.download');
