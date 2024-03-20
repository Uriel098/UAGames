<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\Api\CalificationController;
use App\Http\Controllers\Api\CategorieController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\ConsoleController;
use App\Http\Controllers\Api\PublisherController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\StoreController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// api de Games
Route::get ('/Games', [GameController::class, 'list']);
Route::get ('/Games/{id}', [GameController::class, 'item']);
Route::post ('/Games/create', [GameController::class, 'create']);
Route::post ('/Games/update', [GameController::class, 'update']);
Route::delete ('/Games/{id}', [GameController::class, 'delete']);
// api de Calification
Route::get ('/Califications', [CalificationController::class, 'list']);
Route::get ('/Califications/{id}', [CalificationController::class, 'item']);
Route::post ('/Califications/create', [CalificationController::class, 'create']);
Route::post ('/Califications/{id}/update}', [CalificationController::class, 'update']);
// api de Categorie
Route::get ('/Categories', [CategorieController::class, 'list']);
Route::get ('/Categories/{id}', [CategorieController::class, 'item']);
Route::post ('/Categories/create', [CategorieController::class, 'create']);
Route::post ('/Categories/{id}/update}', [CategorieController::class, 'update']);
// api de Comment
Route::get ('/Comments', [CommentController::class, 'list']);
Route::get ('/Comments/{id}', [CommentController::class, 'item']);
Route::post ('/Comments/create', [CommentController::class, 'create']);
Route::post ('/Comments/{id}/update}', [CommentController::class, 'update']);
// api de Console
Route::get ('/Console', [ConsoleController::class, 'list']);
Route::get ('/Console/{id}', [ConsoleController::class, 'item']);
Route::post ('/Console/create', [ConsoleController::class, 'create']);
Route::post ('/Console/{id}/update}', [ConsoleController::class, 'update']);
Route::delete ('/Console/{id}', [ConsoleController::class, 'delete']);
// api de Publisher
Route::get ('/Publishers', [PublisherController::class, 'list']);
Route::get ('/Publishers/{id}', [PublisherController::class, 'item']);
Route::post ('/Publishers/create', [PublisherController::class, 'create']);
Route::post ('/Publishers/update', [PublisherController::class, 'update']);
Route::delete ('/Publishers/{id}', [PublisherController::class, 'delete']);
// api de Review
Route::get ('/Reviews', [ReviewController::class, 'list']);
Route::get ('/Reviews/{id}', [ReviewController::class, 'item']);
Route::post ('/Reviews/create', [ReviewController::class, 'create']);
Route::post ('/Reviews/{id}/update}', [ReviewController::class, 'update']);
// api de Store
Route::get ('/Stores', [StoreController::class, 'list']);
Route::get ('/Stores/{id}', [StoreController::class, 'item']);
Route::post ('/Stores/create', [StoreController::class, 'create']);
Route::post ('/Stores/{id}/update}', [StoreController::class, 'update']);
// api de User
Route::get('/users', [UserController::class, 'list']);
Route::get('/users/{id}', [UserController::class, 'item']);
Route::post('/users/create', [UserController::class, 'create']);
Route::post('/users/{id}/update}', [UserController::class, 'update']);

Route::post ('/login', [AuthController::class, 'login']);

