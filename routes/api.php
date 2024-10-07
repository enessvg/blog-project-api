<?php

use App\Http\Controllers\AgreementsController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\SiteSettingsController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/auth/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

#POST
Route::get('/post', [PostController::class, 'index']);
Route::get('/popular-post', [PostController::class, 'popularPost']);
Route::get('/post/detail/{slug}',[PostController::class, "show"]);

#POST

#Category
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/{slug}',[CategoryController::class, 'show']);


#Category


#COMMENTS
Route::get('/comments', [CommentController::class, 'index']);
Route::post('/comments', [CommentController::class, 'store']);
#COMMENTS


#Site Settings
Route::get('/agreement', [AgreementsController::class, 'index']);
Route::get('/agreement/{slug}', [AgreementsController::class,'show']);

#Site Settings

#Auth
Route::post('auth/login', [CustomAuthController::class, 'login']);
Route::post('auth/register', [CustomAuthController::class, 'register']);
Route::middleware('auth:sanctum')->post('/auth/logout',[CustomAuthController::class, 'logout']);

//     $request->user()->currentAccessToken()->delete();
//     return response()->json(['message' => 'Çıkış başarılı']);
// });
