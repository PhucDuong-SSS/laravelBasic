<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/users', [UserController::class,'index']);

Route::resource('users', UserController::class)->only([
    'index', 'store', 'update', 'destroy'
]);

Route::resource('blogs', BlogController::class)->only([
    'index', 'store', 'update', 'destroy'
]);

Route::get('most',[UserController::class,'getUserHasMostBlogs']);
Route::get('least',[UserController::class,'getUserHasLeastBlogs']);

