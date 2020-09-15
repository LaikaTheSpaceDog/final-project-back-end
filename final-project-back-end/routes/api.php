<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Words;
use App\Http\Controllers\API\Words\Links;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(["prefix" => "words"], function () {
    Route::get("", [Words::class, "index"]);
    Route::post("", [Words::class, "store"]);
    Route::get("/liked", [Words::class, "like"]);
    Route::group(["prefix" => "{word}"], function () {
        Route::get("", [Words::class, "show"]);
        Route::patch("", [Words::class, "update"]);
        Route::group(["prefix" => "liked"], function () {
            Route::get("", [Links::class, "index"]);
        });
    });
});