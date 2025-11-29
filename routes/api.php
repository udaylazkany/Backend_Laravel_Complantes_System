<?php

use App\Http\Controllers\AdmainsController;
use App\Http\Controllers\CitzensController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplantsController;

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


Route::post('citizen/create',[CitzensController::class,'store']);
Route::post('/Admain/login',[AdmainsController::class,'Login']);
Route::post('/Citizen/login',[CitzensController::class,'Login']);

Route::prefix('Admain')->middleware([ 'auth:sanctum'])->group(function () {
    Route::post('/Department/Create',[AdmainsController::class,'Create_Department']);
    Route::get('/Department/Show',[AdmainsController::class,'Show_Department']);
    Route::post('/add_area',[AdmainsController::class,'Create_Location']);
    Route::post('/logout',[AdmainsController::class,'Logout']);

});
Route::middleware([ 'auth:sanctum','role:Admain_Department'])->group(function () {

    
});
Route::middleware([ 'auth:sanctum','role:Employee'])->group(function () {

    
});

Route::prefix('citizen')->middleware([ 'auth:sanctum',])->group(function () {
    Route::get('/Show_Department_name',[CitzensController::class,'Show_Department']);
   Route::post('/Add_Complants',[ComplantsController::class,'Create']);
    Route::post('/logout',[CitzensController::class,'logout']);

    
});