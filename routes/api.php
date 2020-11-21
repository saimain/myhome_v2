<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/get-townships', function (Request $request) {

    $request->validate([
        'region_id' => 'required'
    ]);

    $townships = DB::table('townships')->where('region_id', $request->region_id)->get();

    return response()->json([
        'townships' => $townships
    ]);
})->name('get-townships');
