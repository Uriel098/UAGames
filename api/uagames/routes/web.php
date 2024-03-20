<?php

use App\http\Controllers\HomeController;
use App\http\Controllers\AdminController;
use App\http\Controllers\GameController;
use App\http\Controllers\ConsoleController;
use App\http\Controllers\ReviewController;
use App\http\Controllers\StoreController;
use App\http\Controllers\CommentController;
use App\http\Controllers\PublisherController;
use App\http\Controllers\CategorieController;
use App\http\Controllers\CalificationController;
use App\http\Controllers\LoginController;
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
