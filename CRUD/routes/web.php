<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
Route::get("/",[ProductController::class,'index']);
Route::get("products/create",[ProductController::class,'create']);
Route::post("product/store",[ProductController::class,'store']);

Route::get("products/show/{id}",[ProductController::class,'show']);
Route::get("products/edit/{id}",[ProductController::class,'edit']);

Route::put("products/update/{id}",[ProductController::class,'update']);

Route::get("products/delete/{id}",[ProductController::class,'destroy']);
