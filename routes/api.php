<?php

use App\Http\Controllers\API\WineController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource("/wines", WineController::class);

//Route::put('update', [WineController::class, 'update']);
Route::post('show', [WineController::class,'show']);
Route::delete('wines/{id}', function ($id) {
    return $id->wine();
});

Route::get('wines/{id}', function ($id){
    return $id->wine();
});

Route::put('wines/{id}', function ($id){
    return $id->wine();
});


