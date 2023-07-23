<?php

use App\Http\Controllers\AuctionController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\UserMangeController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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
    // return view('welcome');
     return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
    // return view('layouts.backend.dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/category',CategoryController::class);
Route::resource('/product',ProductController::class);
Route::resource('/user',UserMangeController::class);


Route::get('/auction',[AuctionController::class,'index'])->name('auction.index');
Route::get('/auction/create',[AuctionController::class,'create'])->name('auction.create');
Route::post('/auction/insert',[AuctionController::class,'store'])->name('auction.store');
Route::get('/auction/view/{id}',[AuctionController::class,'view']);
Route::get('/auction/edit/{id}',[AuctionController::class,'edit']);
Route::post('/auction/update',[AuctionController::class,'update'])->name('auction.update');
Route::get('/auction/delete/{id}',[AuctionController::class,'distroy']);
Route::get('/auction/notification',[AuctionController::class,'notification'])->name('auction.notification');
// Route::get('/auction/time',[AuctionController::class,'timewise'])->name('auction.timewise');
 


Route::get('/bid',[BidController::class,'index'])->name('bid.index');
Route::get('/bid/insert',[BidController::class,'store'])->name('bid.store');
Route::get('/bid/history',[BidController::class,'show'])->name('bid.show');
Route::get('/bid/allhistory',[BidController::class,'showhistory'])->name('bid.showhistory');
Route::post('/bid/status/',[BidController::class,'winstatus'])->name('bid.winstatus');
Route::get('/bid/bidproduct',[BidController::class,'bidproduct'])->name('bid.bidproduct');



Route::get('/bid/add',[CartController::class,'storetocart'])->name('bid.cart');
Route::get('/checkout',[CheckoutController::class,'checkout']);
Route::post('/checkout/order',[CheckoutController::class,'placeorder'])->name('checkout.order');



Route::get('/order',[OrderController::class,'userorder'])->name('order');
Route::get('/order/allorder',[OrderController::class,'order'])->name('allorder');
Route::post('/order/status/',[OrderController::class,'orderstatus'])->name('order.status');


Route::get('/sms',[SmsController::class,'index'])->name('sms.index');
Route::post('/sms/send',[SmsController::class,'smssend'])->name('sms.send');

Route::get('/apperance',[SettingController::class,'index'])->name('apperance.index');
Route::post('/apperance/setting/{id}',[SettingController::class,'apperanceUpdate'])->name('apperance.update');




// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


// Route::get('/auth/redirect', function () {
//     return Socialite::driver('google')->redirect();
// });
 
// Route::get('/auth/callback', function () {
//     $user = Socialite::driver('google')->user();
 
//     // $user->token
// });

/*Socialite Login Routes*/
// Route::group(['as' => 'login.', 'prefix'=>'login'], function(){
//     Route::get('/{provider}', [LoginController::class, 'redirectToProvider'])->name('provider');
//     Route::get('/{provider}/callback', [LoginController::class, 'handleProviderCallback'])->name('provider.callback');
// });

Route::controller(App\Http\Controllers\GoogleController::class)->group(function(){
    Route::get('social/google', 'redirect')->name('auth.google');
    Route::get('social/google/callback', 'googleCallback');
});









require __DIR__.'/auth.php';
