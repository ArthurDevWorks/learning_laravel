<?php

use App\Http\Controllers\CieloController;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;

//Essa Facades antes criar em cache uma facade automatica
use Facades\App\Services\PaymentProviders\PaddlePaymentProvider;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/learn-container', function(){
    // return Stripe::charge('arthur@beerandcode.com.br', 730);

    return PaddlePaymentProvider::charge('arthur@beerandcode.com.br', 730);
});


Route::get('strip',[StripeController::class,'index']);

Route::get('cielo',[CieloController::class,'index']);
