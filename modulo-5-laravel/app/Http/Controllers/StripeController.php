<?php

namespace App\Http\Controllers;

use App\Services\Checkout;
use Illuminate\Http\Request;
use App\Services\PaymentProviders\interfaces\PaymentProviderContract;

class StripeController extends Controller
{
    public function __construct(private PaymentProviderContract $paymentProvider)
    {}

    public function index(){
        $checkout = new Checkout('arthur@beerandcode.com.br',820);

        return $checkout->handle($this->paymentProvider);
   }   
}
