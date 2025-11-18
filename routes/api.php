<?php

use App\Http\Controllers\AdmainsController;
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
Route::post('/Admain/login',[AdmainsController::class,'Login']);

Route::middleware([ 'auth:sanctum','role:Admain'])->group(function () {
Route::post('/Admain/logout',[AdmainsController::class,'Logout']);

});
Route::middleware([ 'auth:sanctum ','role:Admain_Department'])->group(function () {

    
});
Route::middleware([ 'auth:sanctum ','role:Employee'])->group(function () {

    
});
Route::middleware([ 'auth:sanctum ','role:Citzen'])->group(function () {

    
});