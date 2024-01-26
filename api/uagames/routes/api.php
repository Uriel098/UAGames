<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GamesController;
use App\Http\Controllers\Api\CalificationsController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\CommentsController;
use App\Http\Controllers\Api\ConsolesController;
use App\Http\Controllers\Api\PublishersController;
use App\Http\Controllers\Api\ReviewsController;
use App\Http\Controllers\Api\StoresController;
use App\Http\Controllers\Api\UsersController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// api de games
Route::get ('/games', [GamesController::class, 'list']);
Route::get ('/games/{id}', [GamesController::class, 'item']);
Route::post ('/games/create', [GamesController::class, 'create']);
Route::post ('/games/{id}/update}', [GamesController::class, 'update']);
// api de califications
Route::get ('/califications', [CalificationsController::class, 'list']);
Route::get ('/califications/{id}', [CalificationsController::class, 'item']);
Route::post ('/califications/create', [CalificationsController::class, 'create']);
Route::post ('/califications/{id}/update}', [CalificationsController::class, 'update']);
// api de categories
Route::get ('/categories', [CategoriesController::class, 'list']);
Route::get ('/categories/{id}', [CategoriesController::class, 'item']);
Route::post ('/categories/create', [CategoriesController::class, 'create']);
Route::post ('/categories/{id}/update}', [CategoriesController::class, 'update']);
// api de comments
Route::get ('/comments', [CommentsController::class, 'list']);
Route::get ('/comments/{id}', [CommentsController::class, 'item']);
Route::post ('/comments/create', [CommentsController::class, 'create']);
Route::post ('/comments/{id}/update}', [CommentsController::class, 'update']);
// api de console
Route::get ('/console', [ConsolesController::class, 'list']);
Route::get ('/console/{id}', [ConsolesController::class, 'item']);
Route::post ('/console/create', [ConsolesController::class, 'create']);
Route::post ('/console/{id}/update}', [ConsolesController::class, 'update']);
// api de publishers
Route::get ('/publishers', [PublishersController::class, 'list']);
Route::get ('/publishers/{id}', [PublishersController::class, 'item']);
Route::post ('/publishers/create', [PublishersController::class, 'create']);
Route::post ('/publishers/{id}/update}', [PublishersController::class, 'update']);
// api de reviews
Route::get ('/reviews', [ReviewsController::class, 'list']);
Route::get ('/reviews/{id}', [ReviewsController::class, 'item']);
Route::post ('/reviews/create', [ReviewsController::class, 'create']);
Route::post ('/reviews/{id}/update}', [ReviewsController::class, 'update']);
// api de stores
Route::get ('/stores', [StoresController::class, 'list']);
Route::get ('/stores/{id}', [StoresController::class, 'item']);
Route::post ('/stores/create', [StoresController::class, 'create']);
Route::post ('/stores/{id}/update}', [StoresController::class, 'update']);
// api de users
Route::get ('/users', [UsersController::class, 'list']);
Route::get ('/users/{id}', [UsersController::class, 'item']);
Route::post ('/users/create', [UsersController::class, 'create']);
Route::post ('/users/{id}/update}', [UsersController::class, 'update']);