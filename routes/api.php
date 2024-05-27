<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FlipkartController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('register',[CustomerController::class,'register']);
Route::put('update/{id}',[CustomerController::class,'update']);
Route::get('login',[CustomerController::class,'login']);
Route::delete('delete/{id}',[CustomerController::class,'delete']);


route::post('/product',[ProductController::class,'createproduct']);
route::put('/product/update/{id}',[ProductController::class,'update']);
route::get('/product/{id}',[ProductController::class,'getproduct']);
route::get('/allproduct',[ProductController::class,'getallproduct']);
route::delete('/product/delete/{id}',[ProductController::class,'delete']);

