<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CalificationController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/old', function () {
    return view('welcome');
});

Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/admin',[AdminController::class, 'index'])->name('admin.home');
Route::get('/games',[GameController::class, 'index'])->name('games.games');
Route::get('/consoles',[ConsoleController::class, 'index'])->name('consoles.consoles');
Route::get('/reviews',[ReviewController::class, 'index'])->name('reviews.reviews');
Route::get('/stores',[StoreController::class, 'index'])->name('stores.stores');
Route::get('/comments',[CommentController::class, 'index'])->name('comments.comments');
Route::get('/publishers',[PublisherController::class, 'index'])->name('publishers.publishers');
Route::get('/categories',[CategorieController::class, 'index'])->name('categories.categories');
Route::get('/califications',[CalificationController::class, 'index'])->name('califications.califications');
Route::get('/Login', [LoginController::class, 'index'])->name('Login');
