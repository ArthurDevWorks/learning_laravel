<?php

use beerandcode\modulo5\Base\Container;
use beerandcode\modulo5\Services\Checkout;
use beerandcode\modulo5\Providers\PaddlePaymentProvider;
use beerandcode\modulo5\Providers\StripePaymentProvider;
use beerandcode\modulo5\Providers\CieloPaymentProvider;
use beerandcode\modulo5\Providers\interfaces\PaymentProviderContract;
use beerandcode\modulo5\Utils\Http;

require __DIR__.'/../vendor/autoload.php';

  $container = new Container;
  $container->register(PaymentProviderContract::class,PaddlePaymentProvider::class);

  $paymentProvider = $container->get(PaymentProviderContract::class);

  $service = new Checkout('arthur@beerandcode.com', 400);

  echo $service->handle($paymentProvider);