<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ImageCollectionController;
use App\Http\Controllers\InitialInfoController;
use App\Http\Controllers\SecondaryInfoController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::post('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');

Route::post('initial_info/create', [InitialInfoController::class, 'create'])->middleware('auth:sanctum');
Route::get('initial_info/show/{id}', [InitialInfoController::class, 'show'])->middleware('auth:sanctum');
Route::post('initial_info/update/{id}', [InitialInfoController::class, 'update'])->middleware('auth:sanctum');
Route::delete('initial_info/delete/{id}', [InitialInfoController::class, 'delete'])->middleware('auth:sanctum');

Route::post('secondary_info/create', [SecondaryInfoController::class, 'create'])->middleware('auth:sanctum');
Route::get('secondary_info/show/{id}', [SecondaryInfoController::class, 'show'])->middleware('auth:sanctum');
Route::post('secondary_info/update/{id}', [SecondaryInfoController::class, 'update'])->middleware('auth:sanctum');
Route::delete('secondary_info/delete/{id}', [SecondaryInfoController::class, 'delete'])->middleware('auth:sanctum');

Route::post('comment/create', [CommentController::class, 'create']);
Route::get('comment/show/{id}', [CommentController::class, 'show']);
Route::post('comment/update/{id}', [CommentController::class, 'update'])->middleware('auth:sanctum');
Route::delete('comment/delete/{id}', [CommentController::class, 'delete'])->middleware('auth:sanctum');

Route::post('upload_image', [ImageCollectionController::class, 'uploadImage'])->middleware('auth:sanctum');
Route::delete('delete_image/{id}', [ImageCollectionController::class, 'deleteImageById'])->middleware('auth:sanctum');
