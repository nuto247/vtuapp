<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\AirtimeController;
use App\Http\Controllers\DataRechargeController;
use App\Http\Controllers\TVRechargeController;
use App\Http\Controllers\ElectricityBillController;
use App\Http\Controllers\VerifyCustomerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WebhookController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



// Registration Routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Login Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Logout Route
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Protected Route
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/subscribers', [App\Http\Controllers\HomeController::class, 'history'])->name('history');

Route::post('monnify-transaction-webhook', [WebhookController::class, 'monnifyTransactionWebHook']);

Route::get('/transactions', [PaymentController::class, 'transx']);

//Route::post('/initialize-payment', [PaymentController::class, 'initializePayment'])->name('payment.initialize');
//Route::get('/payment/callback', [PaymentController::class, 'paymentCallback'])->name('payment.callback');



// Laravel 8+
//Route::post('/pay', [App\Http\Controllers\PaymentController::class, 'redirectToMonnifyGateway'])->name('pay');

// Laravel 8+
//Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handlePaymentCallback']);




Route::middleware(['auth'])->group(function () {
    // Routes that require authentication

    Route::get('/rechargedata', [DataRechargeController::class, 'rechargeData1'])->middleware('auth');

    Route::get('/fund', [PaymentController::class, 'showPaymentForm']);
    Route::post('/fund-process', [PaymentController::class, 'processWalletFunding'])
        ->name('processWalletFunding');

    Route::get('/payment/callback', [PaymentController::class, 'handlePaymentCallback'])
    ->name('handlePaymentCallback');

    Route::get('/balance/{username}/{password}', [BalanceController::class, 'index']);

    Route::get('/recharge-airtime', [AirtimeController::class, 'recharge']);

    Route::get('/rechargeairtime', [AirtimeController::class, 'rechargeairtime'])->middleware('auth');



    Route::get('/recharge', function () {
        return view('recharge');
    });

    Route::get('/airtime-recharge-info', [AirtimeController::class, 'getRechargeInfo']);

    Route::get('/data', [DataRechargeController::class, 'rechargeData']);








    Route::get('/rechargetv', [TVRechargeController::class, 'rechargetv']);

    Route::get('/tvrecharge', [TVRechargeController::class, 'recharge']);

    //Electricity bill payment

    Route::get('/electricity', [ElectricityBillController::class, 'pay'])->name('pay');

    Route::get('/paybill', [ElectricityBillController::class, 'electricity']);



    Route::get('/verifycustomer', [VerifyCustomerController::class, 'verify']);

    Route::get('/verify', function () {
        return view('verifycustomer');
    });

    Route::get('/success', [PaymentController::class, 'success'])->name('success');

    Route::post('/save-data', [PaymentController::class, 'saveData']);
});
