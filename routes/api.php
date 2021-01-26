<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{MasterBarangController, TransaksiBeliController};

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

Route::group(['prefix' => "master_barang"], function(){
    Route::get('autocomplete', [MasterBarangController::class, "autocomplete"]);
});

Route::group(['prefix' => "beli"], function(){
    Route::post("save", [TransaksiBeliController::class, "save"]);
    Route::get("list", [TransaksiBeliController::class, "list"]);
    Route::post("detail", [TransaksiBeliController::class, "detail"]);
});