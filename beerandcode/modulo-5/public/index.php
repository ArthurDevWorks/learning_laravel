<?php

use beerandcode\modulo5\Utils\Http;
use beerandcode\modulo5\Base\Facade;
use beerandcode\modulo5\Base\Container;
use beerandcode\modulo5\Facades\Stripe;
use beerandcode\modulo5\Utils\ThirdParty;
use beerandcode\modulo5\Services\Checkout;
use beerandcode\modulo5\Providers\CieloPaymentProvider;
use beerandcode\modulo5\Providers\PaddlePaymentProvider;
use beerandcode\modulo5\Providers\StripePaymentProvider;
use beerandcode\modulo5\Providers\interfaces\PaymentProviderContract;

require __DIR__.'/../vendor/autoload.php';

  // $container = new Container;
  // $container->register(PaymentProviderContract::class,PaddlePaymentProvider::class);

  // $paymentProvider = $container->get(PaymentProviderContract::class);

  // $service = new Checkout('arthur@beerandcode.com', 400);

  // echo $service->handle($paymentProvider);

  //Utilizando container
  //$provider = new StripePaymentProvider(new Http(new ThirdParty));

  //Usa a Facade que foi implementada
  echo Stripe::change('arthur@beerandcode.com', 400);