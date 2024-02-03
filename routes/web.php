<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/posts', [PostController::class, 'index']);

Route::get('/posts/{post:slug}', [PostController::class,'show']);

Route::get('/about', [AboutController::class, 'index']);

Route::get('/categories', [PostController::class, 'allCategories']);

Route::get('/authors', [PostController::class, 'allAuthors']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware("guest");
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware("guest");
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware("auth");

Route::get('/dashboard/posts/checkSlug',[DashboardPostController::class, 'checkSlug']);
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware("auth");

Route::get('/dashboard/category/checkSlug',[AdminCategoryController::class, 'checkSlug']);
Route::resource('/dashboard/category', AdminCategoryController::class)->except('show')->middleware("admin");




