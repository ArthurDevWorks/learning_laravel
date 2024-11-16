<?php

namespace beerandcode\modulo5\Providers;

use beerandcode\modulo5\Providers\interfaces\PaymentProviderContract;
use beerandcode\modulo5\Utils\Http;

class StripePaymentProvider implements PaymentProviderContract
{
  public function __construct(Http $clientHttp)
  {
  }
  public function charge(string $email, int $amount):string{
    return "We successfully charged USD {$amount}$ from {$email}";
  }
}