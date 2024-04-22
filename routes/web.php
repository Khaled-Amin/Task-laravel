<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::prefix('admin')->group(function () {
    Route::match(['get', 'post'],'login/', [AdminController::class, 'login'])->name('admin.login');
    Route::group(['middleware' => ['admin']], function() {
        Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');

        // Articles CRUD
        Route::get('articles', [ArticleController::class, 'index'])->name('admin.articles');
        Route::get('articles/create', [ArticleController::class, 'create'])->name('admin.articles.create');
        Route::post('articles/store', [ArticleController::class, 'store'])->name('admin.articles.store');
        Route::get('articles/edit/{id}', [ArticleController::class, 'edit'])->name('admin.articles.edit');
        Route::put('articles/update/{id}', [ArticleController::class, 'update'])->name('admin.articles.update');
        Route::get('articles/destroy/{id}', [ArticleController::class, 'destroy'])->name('admin.articles.destroy');
    });
});


// Auth User

Route::middleware('auth')->group(function () {
    // User routes...
});

Route::get('/', [Controller::class, 'index'])->name('front');
// Route::group(['prefix' => '{locale}'], function() {
//     Route::get('/', [Controller::class, 'index'])->middleware('setLocale');
// });



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
