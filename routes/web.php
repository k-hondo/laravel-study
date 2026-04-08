<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilityController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\RequestSampleController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HiLowController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AdminCatController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AuthController;

// ////////////////////////////////////////////////
// ねこカフェサイトのルーティング
// ////////////////////////////////////////////////

// ねこカフェサイト トップページ
Route::get('/', [LandingController::class, 'index'])->name('index');

// 設備
Route::get('/facilities', fn () => view('facilities.index'))->name('facilities');

// ねこちゃんたち
Route::resource('/cats', CatController::class)->only(['index']);

// ブログ
Route::resource('/blogs', BlogController::class)->only(['index', 'show']);

// お問い合わせ
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'sendMail']);
Route::get('/contact/complete', [ContactController::class, 'complete'])->name('contact.complete');

// 管理画面
Route::prefix('/admin')
    ->name('admin.')
    ->group(function () {
        // ログイン時のみアクセス可能なルート
        Route::middleware('auth')
            ->group(function () {
                // ねこちゃん管理
                Route::resource('/cats', AdminCatController::class)->except(['show']);
                // ブログ管理
                Route::resource('/blogs', AdminBlogController::class)->except(['show']);

                // ユーザ管理
                Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
                Route::post('/users', [UserController::class, 'store'])->name('users.store');

                // ログアウト
                Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
            });

        // 未ログイン時のみアクセス可能なルート
        Route::middleware('guest')
            ->group(function () {
                // ログイン
                Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
                Route::post('/login', [AuthController::class, 'login']);
            });
    });







// ////////////////////////////////////////////////
// Laravel学習用のルーティング
// ////////////////////////////////////////////////

// Laravel学習 トップページ
Route::get('/laravel-study', fn () => view('laravel-study.index'))->name('laravel-study.index');

// サンプルページ
Route::get('/laravel-study/hello-world', fn () => view('laravel-study.hello_world'));
Route::get('/laravel-study/hello', fn () => view('laravel-study.hello', [
    'name' => '山田',
    'course' => 'Laravel',
]));

// カリキュラムページ
Route::get('/laravel-study/curriculum', fn () => view('laravel-study.curriculum'))->name('laravel-study.curriculum');

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
