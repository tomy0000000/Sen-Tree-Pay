<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get("/", function () {
    return redirect("/login");
});

// Route::any("/redirect", "FourziController@redirect");

Route::get("/betago", "FourziController@betago");
Route::any("/login", "FourziController@login");
Route::any("/logout", "FourziController@logout");

Route::group(["middleware" => "FourziMiddleware"], function () {
    Route::get("/dashboard", "FourziController@dashboard");
    // Unbuild
    Route::get("/getMyPassword", "FourziController@getMyPassword");
    Route::get("/myTeam", "FourziController@myTeam");
    Route::get("/allTeam", "FourziController@allTeam");
    Route::group(["prefix" => "qr"], function () {
        Route::get("/scan", "FourziController@qrscan");
        // Testing Channel
        Route::get("/scan_beta", "FourziController@qrscan_beta");
        Route::get("/info/{serial}", "FourziController@qrinfo");
        Route::post("/deposit/{serial}", "FourziController@qrdeposit");
        Route::get("/create", "FourziController@qrcreate");
        Route::get("/generate/{serial}", "FourziController@qrgenerate");
        Route::get("/list", "FourziController@qrlist");
        Route::get("/success", "FourziController@qrsuccess");
        Route::get("/fail", "FourziController@qrfail");
    });
    Route::get("/admin", "FourziController@admin");
    Route::get("/editQuota", "FourziController@editQuota");
	
});


