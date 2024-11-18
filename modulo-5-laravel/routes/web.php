<?php

use App\Services\Checkout;
use App\Services\Utils\Http;
use App\Services\Utils\ThirdParty;
use Illuminate\Support\Facades\Route;
use App\Services\PaymentProviders\CieloPaymentProvider;
use App\Services\PaymentProviders\PaddlePaymentProvider;
use App\Services\PaymentProviders\StripePaymentProvider;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/learn-container', function(StripePaymentProvider $paymentProvider){
    // $checkout = new Checkout('arthurparente@gmail.com', 380);

    // return $checkout->handle($paymentProvider);
});