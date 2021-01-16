<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\Auth\LoginController as UserLoginController;
use App\Http\Controllers\Beneficiary\Auth\LoginController as BeneficiaryLoginController;
use App\Http\Controllers\DeliveryMan\Auth\LoginController as DeliveryManLoginController;

use App\Http\Controllers\User\Auth\AuthController as UserAuthController;
use App\Http\Controllers\Beneficiary\Auth\AuthController as BeneficiaryAuthController;
use App\Http\Controllers\DeliveryMan\Auth\AuthController as DeliveryManAuthController;
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
/********************** statr Auth different users *********************** */
Route::group([
    'middleware' => 'api',
    'prefix' => 'v1/auth/user'

], function ($router) {
    //Route::post('/login', [UserAuthController::class, 'login']);
    Route::post('/register', [UserAuthController::class, 'register']);
    Route::post('/logout', [UserAuthController::class, 'logout']);
    Route::post('/refresh', [UserAuthController::class, 'refresh']);
    Route::get('/me', [UserAuthController::class, 'me']);    
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'v1/auth/beneficiary'

],
    function ($router) {
        //Route::post('/login', [BeneficiaryAuthController::class, 'login']);
        Route::post('/register', [BeneficiaryAuthController::class, 'register']);
        Route::post('/logout', [BeneficiaryAuthController::class, 'logout']);
        Route::post('/refresh', [BeneficiaryAuthController::class, 'refresh']);
        Route::get('/me', [BeneficiaryAuthController::class, 'me']);
    }
);

Route::group(
    [
        'middleware' => 'api',
        'prefix' => 'v1/auth/delivery/man'

    ],
    function ($router) {
        //Route::post('/login', [DeliveryManAuthController::class, 'login']);
        Route::post('/register', [DeliveryManAuthController::class, 'register']);
        Route::post('/logout', [DeliveryManAuthController::class, 'logout']);
        Route::post('/refresh', [DeliveryManAuthController::class, 'refresh']);
        Route::get('/me', [DeliveryManAuthController::class, 'me']);
    }
);

Route::group([
    'middleware' => ['api'],
    'prefix' => 'v1'
], function () {
    Route::post('user/login', [UserLoginController::class,'login']);

    Route::post('beneficiary/login', [BeneficiaryLoginController::class, 'login']);
    
    Route::post('delivery/man/login', [DeliveryManLoginController::class, 'login']);
});

/********************** statr Auth different users *********************** */

//Group Routes For users auther type users
Route::group([
    'middleware' => ['api', 'manage_token:api_user,ROLE_USER_ADMIN|ROLE_USER_SALES'],
    'prefix'=>'v1'
], function () {
    Route::post('user/home', 'User\Profile\HomeController@home');
});


//Group Routes For users beneficiary
Route::group([
    'middleware' => ['api', 'manage_token:api_beneficiary,ROLE_BENEFICIARY'],
    'prefix' => 'v1'
], function () {
    Route::post('beneficiary/home', 'Beneficiary\Profile\HomeController@home');
});

//Group Routes For users delivery men
Route::group([
    'middleware' => ['api', 'manage_token:api_delivery_man,ROLE_DELIVERY_MAN'],
    'prefix' => 'v1'
],
    function () {
        Route::post('delivery/man/home', 'DeliveryMan\Profile\HomeController@home');
    }
);

//Group Routes Global for All different users
Route::group([
    'middleware' => ['api', 'manage_token:api_beneficiary|api_user|api_delivery_man,ROLE_USER_ADMIN|ROLE_BENEFICIARY|ROLE_DELIVERY_MAN'],
    'prefix' => 'v1'
], function () {
    Route::post('admin/home', 'Global\Admin\HomeController@home');
});