<?php

use Illuminate\Support\Facades\Route;
use Facades\App\Services\PaymentProviders\PaddlePaymentProvider;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/learn-container', function(){
    // return Stripe::charge('arthur@beerandcode.com.br', 730);

    return PaddlePaymentProvider::charge('arthur@beerandcode.com.br', 730);
});