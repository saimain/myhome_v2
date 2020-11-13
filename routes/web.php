<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\HomeController as UserHomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserHomeController::class, 'index']);

Auth::routes();


Route::group(['prefix' => 'my', 'middleware' => 'web'], function () {
    Route::get('/', [\App\Http\Controllers\User\DashboardController::class, 'index']);
});


Route::group(['prefix' => 'dashboard'], function () {

    Route::get('/login', [LoginController::class, 'showAdminLoginForm']);
    Route::post('/login', [LoginController::class, 'adminLogin']);

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index']);

        // Points
        Route::get('/point-package', [\App\Http\Controllers\Admin\PointPackageController::class, 'pointPackage']);
        Route::get('/point-package/add', [\App\Http\Controllers\Admin\PointPackageController::class, 'addPointPackageForm']);
        Route::post('/point-package/add', [\App\Http\Controllers\Admin\PointPackageController::class, 'addPointPackage'])->name('addNewPackage');
    });
});

// Tests

Route::get('/test', function () {
    return time() . rand();
});
