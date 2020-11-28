<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use RealRashid\SweetAlert\Facades\Alert;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\HomeController as UserHomeController;


Auth::routes();

Route::get('/', [UserHomeController::class, 'index']);



// User

Route::get('/property/{id}', [\App\Http\Controllers\User\PropertyController::class, 'viewProperty']);


Route::group(['prefix' => 'my', 'middleware' => 'auth:web'], function () {
    Route::get('/', [\App\Http\Controllers\User\DashboardController::class, 'index'])->name('home');

    // Account
    Route::get('/account', [\App\Http\Controllers\User\AccountController::class, 'index'])->name('account');


    // Buy Point
    Route::get('/buy-point', [\App\Http\Controllers\User\PointController::class, 'buyPoint'])->name('buy-point');
    Route::get('/buy-point/package/{id}', [\App\Http\Controllers\User\PointController::class, 'buyPointForm'])->name('point-package');
    Route::post('/order-point', [\App\Http\Controllers\User\PointOrderController::class, 'orderPoint'])->name('orderPoint');

    // Upload Property
    Route::get('/upload-property', [\App\Http\Controllers\User\PropertyController::class, 'uploadProperty'])->name('upload-property');
    Route::post('/upload-property', [\App\Http\Controllers\User\PropertyController::class, 'postUploadProperty']);


    // Other
});


// Admin Dashboard

Route::group(['prefix' => 'dashboard'], function () {

    Route::get('/login', [LoginController::class, 'showAdminLoginForm']);
    Route::post('/login', [LoginController::class, 'adminLogin']);

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index']);

        // Points
        Route::get('/point-package', [\App\Http\Controllers\Admin\PointPackageController::class, 'pointPackage']);
        Route::get('/point-package/add', [\App\Http\Controllers\Admin\PointPackageController::class, 'addPointPackageForm']);
        Route::post('/point-package/add', [\App\Http\Controllers\Admin\PointPackageController::class, 'addPointPackage'])->name('addNewPackage');
        Route::post('/point-package/delete/{id}', [\App\Http\Controllers\Admin\PointPackageController::class, 'deletePointPackage'])->name('deletePointPackage');
        Route::get('/point-package/edit/{id}', [\App\Http\Controllers\Admin\PointPackageController::class, 'editPointPackageForm']);
        Route::post('/point-package/update/{id}', [\App\Http\Controllers\Admin\PointPackageController::class, 'updatePointPackage'])->name('updatePointPackage');

        // Point Orders
        Route::get('/point-order/all', [\App\Http\Controllers\Admin\PointOrderController::class, 'allOrder']);
        Route::get('/point-order/success', [\App\Http\Controllers\Admin\PointOrderController::class, 'successOrder']);
        Route::get('/point-order/pending', [\App\Http\Controllers\Admin\PointOrderController::class, 'pendingOrder']);

        Route::post('/point-order/transfer', [\App\Http\Controllers\Admin\PointOrderController::class, 'transferOrder']);

        // Advertisements

        Route::get('/advertisements', [\App\Http\Controllers\Admin\AdvertisementController::class, 'index']);
        Route::get('/advertisements/add', [\App\Http\Controllers\Admin\AdvertisementController::class, 'addAdsForm']);
        Route::post('/advertisements/add', [\App\Http\Controllers\Admin\AdvertisementController::class, 'addAds'])->name('addNewAds');
    });
});

// Tests

Route::get('/test', function () {
    $id = IdGenerator::generate(['table' => 'point_orders', 'field' => 'order_number', 'length' => 8, 'prefix' => 'MHP']);
    //output: INV-000001
});
