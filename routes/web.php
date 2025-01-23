<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'index'])->name('page.home');
Route::get('/about', [HomeController::class, 'about'])->name('page.article');
Route::get('/articles', [HomeController::class, 'article'])->name('page.article');
Route::get('/article/{slug}', [HomeController::class, 'detailArticle'])->name('page.detail-article');
Route::get('/articless/new', [HomeController::class, 'newArticle'])->name('page.new-article');
Route::get('/contact', [HomeController::class, 'contact'])->name('page.contact');

Route::prefix('dashboard')->middleware(['auth'])->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('dashboard.profile');
    Route::post('/update-profile/{id}', [DashboardController::class, 'updateProfile'])->name('dashboard.update-profile');
    Route::post('/change-password/{id}', [DashboardController::class, 'changePassword'])->name('dashboard.change-password');
    Route::delete('/profile/delete/{id}', [DashboardController::class, 'deleteUser'])->name('dashboard.delete-user');
    Route::get('/articles', [DashboardController::class, 'articles'])->name('dashboard.articles');
    Route::get('/article/{slug}', [DashboardController::class, 'detailArticle'])->name('dashboard.detail-article');
    Route::get('/create-article', [DashboardController::class, 'viewCreateArticle'])->name('dashboard.create-article');
    Route::get('/categories', [DashboardController::class, 'categories'])->middleware(IsAdminMiddleware::class)->name('dashboard.categories');

    Route::prefix('articles')->group(function() {
        Route::post('/', [ArticleController::class, 'createArticle'])->name('articles-create-article');
        Route::post('/upload-file-article', [ArticleController::class, 'uploadFileArticle'])->name('upload');
        Route::post('/{slug}', [ArticleController::class, 'editArticle'])->name('articles.edit-article');
        Route::delete('/{slug}', [ArticleController::class, 'deleteArticle'])->name('articles.delete-article');
    });

    Route::prefix('categories')->middleware(IsAdminMiddleware::class)->group(function() {
        Route::post('/', [CategoryController::class, 'createCategory'])->name('categories.create-category');
        Route::delete('/{id}', [CategoryController::class, 'deleteCategory'])->name('categories.delete-category');
    });
});


Route::get('/login', [AuthController::class, 'viewLogin'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::get('/register', [AuthController::class, 'viewRegister'])->middleware('guest')->name('register');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
