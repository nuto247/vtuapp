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
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BVNController;
use App\Http\Controllers\BVNVerificationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ForgotPasswordController;



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

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');


Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');


Route::get('tester', function() {

    dd(preg_replace( '/[^0-9]/', '', 'NGN300'));

});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bvn-verification', function () {
    return view('bvn_verification');
});


Route::post('/verify-bvn', [BVNVerificationController::class, 'verify'])->name('verify-bvn');




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

Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('edit');

Route::post('/update/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update');

Route::post('/updates', [App\Http\Controllers\HomeController::class, 'updates'])->name('updates');

Route::post('monnify-transaction-webhook', [WebhookController::class, 'monnifyTransactionWebHook']);

Route::get('/transactions', [PaymentController::class, 'transx']);

Route::get('/analysis', [PaymentController::class, 'analysis']);



Route::get('/sendmail', [MessageController::class, 'sendmails']);

Route::post('/store', [MessageController::class, 'store']);

//Route::post('/verify-bvn/', [BVNController::class, 'verifyBVN']);

//Route::post('/initialize-payment', [PaymentController::class, 'initializePayment'])->name('payment.initialize');
//Route::get('/payment/callback', [PaymentController::class, 'paymentCallback'])->name('payment.callback');



// Laravel 8+
//Route::post('/pay', [App\Http\Controllers\PaymentController::class, 'redirectToMonnifyGateway'])->name('pay');

// Laravel 8+
//Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handlePaymentCallback']);




Route::middleware(['auth'])->group(function () {
    // Routes that require authentication

    Route::get('/rechargedata', [DataRechargeController::class, 'rechargeData1'])->middleware('auth');
    Route::post('/fetch-data-plans', [DataRechargeController::class, 'getRechargeDataPlans'])
    ->name('getRechargeDataPlans')
    ->middleware('auth');

    Route::get('/mtn', [DataRechargeController::class, 'mtn'])->middleware('auth');

    Route::get('/fund', [PaymentController::class, 'showPaymentForm']);
    Route::post('/fund-process', [PaymentController::class, 'processWalletFunding'])
        ->name('processWalletFunding');

    Route::get('/payment/callback', [PaymentController::class, 'handlePaymentCallback'])
    ->name('handlePaymentCallback');

    Route::get('/fund1', [PaymentController::class, 'manualfunding']);

    Route::get('/balance/{username}/{password}', [BalanceController::class, 'index']);

    Route::get('/recharge-airtime', [AirtimeController::class, 'recharge']);

    Route::get('/rechargeairtime', [AirtimeController::class, 'rechargeairtime'])->middleware('auth');



    Route::get('/recharge', function () {
        return view('recharge');
    });

    Route::get('/airtime-recharge-info', [AirtimeController::class, 'getRechargeInfo']);

    Route::get('/data', [DataRechargeController::class, 'rechargeData']);

    Route::get('/fundmanual', [HomeController::class, 'historyfund']);

    Route::get('/fundmanualedit/{id}', [HomeController::class, 'fundmanualedit'])->name('fundmanualedit');

    Route::post('/fundupdates', [HomeController::class, 'fundupdates'])->name('fundupdates');


    Route::get('/rechargetv', [TVRechargeController::class, 'rechargetv']);

    Route::get('/tvrecharge', [TVRechargeController::class, 'recharge']);

    //Electricity bill payment

    Route::get('/electricity', [ElectricityBillController::class, 'pay'])->name('pay');

    Route::get('/paybill', [ElectricityBillController::class, 'electricity']);


    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');




    Route::get('/verifycustomer', [VerifyCustomerController::class, 'verify']);

    Route::get('/verify', function () {
        return view('verifycustomer');
    });

    Route::get('/success', [PaymentController::class, 'success'])->name('success');

    Route::post('/save-data', [PaymentController::class, 'saveData']);

    Route::get('/listdataprices', [App\Http\Controllers\DataRechargeController::class, 'listdataprices'])->name('listdataprices');

    Route::get('/listdatapriceedit/{id}', [DataRechargeController::class, 'listdatapriceedit'])->name('listdatapriceedit');

    Route::post('/listdatapriceupdate', [DataRechargeController::class, 'listdatapriceupdate'])->name('listdatapriceupdate');

    Route::get('/adddataprice', [DataRechargeController::class, 'adddataprice'])->name('adddataprice');

    Route::post('/adddataprices', [DataRechargeController::class, 'adddataprices'])->name('adddataprices');

    Route::delete('/deletedataprice/{id}', [DataRechargeController::class, 'deletedataprice'])->name('deletedataprice');

    Route::get('/readmail', [MessageController::class, 'readmails'])->name('readmail');

    Route::get('/messaged/{id}', [MessageController::class, 'message'])->name('message');


    Route::get('/addward', [DataRechargeController::class, 'addward'])->name('addward');

    Route::post('/addwards', [DataRechargeController::class, 'addwards'])->name('addwards');


    Route::get('formshow', [DataRechargeController::class, 'formshow'])->name('formshow');

Route::get('getSubcategories', [DataRechargeController::class, 'getSubcategories'])->name('getSubcategories');
});
