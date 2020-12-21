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

Route::get('/sale/properties', [\App\Http\Controllers\User\PropertyController::class, 'viewSaleProperties']);
Route::get('/rent/properties', [\App\Http\Controllers\User\PropertyController::class, 'viewRentProperties']);
Route::get('/search', [\App\Http\Controllers\User\SearchController::class, 'searchProperty']);
Route::post('/search', [\App\Http\Controllers\User\SearchController::class, 'searchPropertyPost'])->name('searchProperty');

Route::get('/auth/redirect/{provider}', [\App\Http\Controllers\User\SocialController::class, 'redirect']);
Route::get('/callback/{provider}', [\App\Http\Controllers\User\SocialController::class, 'callback']);


Route::get('/agents', [\App\Http\Controllers\User\AgentController::class, 'viewAgent']);
Route::get('/agent/{name}', [\App\Http\Controllers\User\AgentController::class, 'viewAgentDetail']);

Route::get('/construction', [\App\Http\Controllers\User\ConstructionController::class, 'viewConstructs']);

Route::get('/about', [\App\Http\Controllers\User\AboutController::class, 'viewAbout']);
Route::get('/contact', [\App\Http\Controllers\User\ContactController::class, 'viewContact']);
Route::post('/contact', [\App\Http\Controllers\User\ContactController::class, 'sendContact']);
Route::get('/privacy-policy', [\App\Http\Controllers\User\PrivacyController::class, 'viewPrivacy']);
Route::get('/term-of-service', [\App\Http\Controllers\User\TermController::class, 'viewTerm']);
Route::get('/guide', [\App\Http\Controllers\User\UserGuideController::class, 'viewGuide']);

// User

Route::get('/properties', [\App\Http\Controllers\User\PropertyController::class, 'viewProperties']);
Route::get('/property/{id}', [\App\Http\Controllers\User\PropertyController::class, 'viewProperty']);

Route::group(['prefix' => 'my', 'middleware' => 'auth:web'], function () {
    Route::get('/', [\App\Http\Controllers\User\DashboardController::class, 'index'])->name('home');

    // Account
    Route::get('/account', [\App\Http\Controllers\User\AccountController::class, 'index'])->name('account');

    // Agent

    Route::get('/account/agent', [\App\Http\Controllers\User\AccountController::class, 'upgradeAgentForm']);
    Route::post('/account/agent', [\App\Http\Controllers\User\AccountController::class, 'upgradeAgent']);

    // Buy Point
    Route::get('/buy-point', [\App\Http\Controllers\User\PointController::class, 'buyPoint'])->name('buy-point');
    Route::get('/buy-point/package/{id}', [\App\Http\Controllers\User\PointController::class, 'buyPointForm'])->name('point-package');
    Route::post('/order-point', [\App\Http\Controllers\User\PointOrderController::class, 'orderPoint'])->name('orderPoint');

    // Upload Property
    Route::get('/upload-property', [\App\Http\Controllers\User\PropertyController::class, 'uploadProperty'])->name('upload-property');
    Route::post('/upload-property', [\App\Http\Controllers\User\PropertyController::class, 'postUploadProperty']);


    // Inbox Message

    Route::get('/inbox', [\App\Http\Controllers\User\MessageController::class, 'index']);
    Route::get('/inbox/{user_id}', [\App\Http\Controllers\User\MessageController::class, 'viewMessge']);
    Route::post('/inbox/{user_id}', [\App\Http\Controllers\User\MessageController::class, 'sendMessage']);

    // Save

    Route::get('/saved', [\App\Http\Controllers\User\SavePropertyController::class, 'viewSaved']);
    Route::post('/save/{id}', [\App\Http\Controllers\User\SavePropertyController::class, 'saveProperty']);

    // Comment

    Route::post('/property/comment/{id}', [\App\Http\Controllers\User\CommentController::class, 'addComment'])->name('addComment');

    // Other
});


// Admin Dashboard

Route::group(['prefix' => 'dashboard'], function () {

    Route::get('/login', [LoginController::class, 'showAdminLoginForm']);
    Route::post('/login', [LoginController::class, 'adminLogin']);

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index']);

        // Properties

        Route::get('/property', [\App\Http\Controllers\Admin\PropertyController::class, 'viewProperty']);
        Route::get('/property/featured', [\App\Http\Controllers\Admin\PropertyController::class, 'viewFeaturedProperty']);
        Route::get('/property/user', [\App\Http\Controllers\Admin\PropertyController::class, 'viewUserProperty']);
        Route::get('/property/agent', [\App\Http\Controllers\Admin\PropertyController::class, 'viewAgentProperty']);
        Route::post('/property/delete/{id}', [\App\Http\Controllers\Admin\PropertyController::class, 'deleteProperty'])->name('propertyDeleteAdmin');

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
        Route::post('/point-order/cencel/{id}', [\App\Http\Controllers\Admin\PointOrderController::class, 'cancelOrder']);

        // Advertisements

        Route::get('/advertisements', [\App\Http\Controllers\Admin\AdvertisementController::class, 'index']);
        Route::get('/advertisements/add', [\App\Http\Controllers\Admin\AdvertisementController::class, 'addAdsForm']);
        Route::post('/advertisements/add', [\App\Http\Controllers\Admin\AdvertisementController::class, 'addAds'])->name('addNewAds');
        Route::post('/advertisements/delete/{id}', [\App\Http\Controllers\Admin\AdvertisementController::class, 'deleteAdvertise'])->name('deleteAdvertise');


        Route::get('/users', [\App\Http\Controllers\Admin\UserController::class, 'viewUser']);
        Route::get('/agents', [\App\Http\Controllers\Admin\AgentController::class, 'viewAgent']);
    });
});

// Tests

Route::get('/test', function () {
    $id = IdGenerator::generate(['table' => 'point_orders', 'field' => 'order_number', 'length' => 8, 'prefix' => 'MHP']);
    //output: INV-000001
});
