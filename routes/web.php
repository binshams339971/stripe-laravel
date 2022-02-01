<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
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

Route::get('/', \App\Http\Livewire\StripeCheckout::class);
//Route::post('/stripe', 'StripePaymentController@stripePost')->name('stripe.post');
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::get('/success', [CheckoutController::class, 'success']);
Route::get('/cancel', [CheckoutController::class, 'cancel']);
Route::post('checkout', [CheckoutController::class, 'afterpayment'])->name('checkout.credit-card');
