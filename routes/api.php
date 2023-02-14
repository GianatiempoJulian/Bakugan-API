<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\BakuganController;
use App\Http\Controllers\AuthController;

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

//*====================================  PROTECTED ROUTES  ====================================*//

Route::middleware('auth:sanctum')->group(function() {
    //*====  AUTH ROUTES  ====*//
    Route::get('logout',[AuthController::class, 'logout']); //Logout method

    //*====  SERIE ROUTES  ====*//
    Route::post('/series',[SerieController::class, 'store']); //Store one serie
    Route::put('/series/{serie}',[SerieController::class, 'update']); //Update one serie
    Route::delete('/series/{serie}',[SerieController::class, 'destroy']); //Delete one serie

     //*====  BAKUGAN ROUTES  ====*//
    Route::post('/bakugans',[BakuganController::class, 'store']); //Store one bakugan
    Route::put('/bakugans/{bakugan}',[BakuganController::class, 'update']); //Update one bakugan
    Route::delete('/bakugans/{bakugan}',[BakuganController::class, 'destroy']); //Delete one bakugan

     //*====  ATTRIBUTE ROUTES  ====*
    Route::post('/attributes',[AttributeController::class, 'store']); //Store one attribute
    Route::put('/attributes/{attribute}',[AttributeController::class, 'update']); //Update one attribute
    Route::delete('/attributes/{attribute}',[AttributeController::class, 'destroy']); //Delete one attribute

     //*====  BAKUGAN <-> SERIE ROUTES  ====*//
    Route::post('/bakugans/series',[BakuganController::class, 'attachSerie']); //Attach one bakugan to a one serie
    Route::post('/bakugans/series/detach',[BakuganController::class, 'detachSerie']); //Detach one bakugan to a one serie

     //*====  BAKUGAN <-> ATTRIBUTES ROUTES  ====*//
    Route::post('/bakugans/attributes',[BakuganController::class, 'attachAttribute']); //Attach one attribute to a one bakugan
    Route::post('/bakugans/attributes/detach',[BakuganController::class, 'detachAttribute']); //Detach one attribute to a one bakugan
});

//*====================================  AUTH ROUTES (NO PROTECTED) ====================================*//

Route::post('register',[AuthController::class, 'register']); //Register method
Route::post('login',[AuthController::class, 'login']); //Login method


//*====================================  SERIE ROUTES (NO PROTECTED)   ====================================*//

Route::get('/series',[SerieController::class, 'index']); //Retrieve all the series
Route::get('/series/{serie}',[SerieController::class, 'show']); //Retrieve one serie


//*==================================== BAKUGAN ROUTES (NO PROTECTED) ====================================*//

Route::get('/bakugans',[BakuganController::class, 'index']); //Retrieve all the bakugans
Route::get('/bakugans/{bakugan}',[BakuganController::class, 'show']); //Retrieve one bakugan


//*=================================== ATTRIBUTE ROUTES (NO PROTECTED) ===================================*//

Route::get('/attributes',[AttributeController::class, 'index']); //Retrieve all the attributes
Route::get('/attributes/{attribute}',[AttributeController::class, 'show']); //Retrieve one attribute


//*==================================== BAKUGAN <-> SERIE ROUTES ====================================*//

//* Serie Side *//
Route::post('/serie/bakugans',[SerieController::class, 'bakugans']); //Fetch all the bakugans of this serie

//*==================================== BAKUGAN <-> ATTRIBUTES ROUTES ====================================*//


//* Attribute Side *//
Route::post('/attributes/{attribute}/bakugans',[AttributeController::class, 'bakugans']); //Fetch all the bakugans of this attribute
