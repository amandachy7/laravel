<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;
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

Route::get('/dashboard', [HomeController::class, 'apiDashboard']);
Route::get('/sales', [SalesController::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);
Route::post('/sales/create', [SalesController::class, 'add']);

Route::middleware('auth:sanctum')->get('/user-profile', [InfoUserController::class, 'userProfile']);
Route::middleware('auth:sanctum')->post('/update-profile', [InfoUserController::class, 'updateProfile']);

Route::get('/users', function() {
    return response()->json(['users' => App\Models\User::all()]);
});

Route::get('/data', 'DataController@getData');

