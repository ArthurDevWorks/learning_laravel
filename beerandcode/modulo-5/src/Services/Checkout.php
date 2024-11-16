<?php

namespace beerandcode\modulo5\Services;

use beerandcode\modulo5\Providers\interfaces\PaymentProviderContract;

class Checkout{
  public function __construct(private string $email, private int $amount)
  {}

  public function handle(PaymentProviderContract $paymentProvider){
    return $paymentProvider->charge($this->email, $this->amount);
  }
}