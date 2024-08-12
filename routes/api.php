<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return view('api');
});
Route::get('login',function(){
    return response()->json('login token is wrong');
})->name('login');
Route::post('login',[AuthController::class,'login']);
Route::middleware('auth:sanctum')->group( function () {
    Route::post('logout',[AuthController::class,'logout']);
    Route::get('divisions',[DivisionController::class,'index']);
    Route::resource('employees', EmployeeController::class)->only([
        'index', 'store', 'update', 'destroy'
    ]);
});
