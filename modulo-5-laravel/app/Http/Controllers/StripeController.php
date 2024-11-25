<?php

namespace App\Http\Controllers;

use App\Services\Checkout;
use Illuminate\Http\Request;
use App\Services\PaymentProviders\interfaces\PaymentProviderContract;

class StripeController extends Controller
{
    public function index(PaymentProviderContract $paymentProvider){
        $checkout = new Checkout('arthur@beerandcode.com.br',820);
        return $checkout->handle($paymentProvider);
   }   
}
