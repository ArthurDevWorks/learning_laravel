<?php

namespace beerandcode\modulo5\Facades;

use beerandcode\modulo5\Base\Facade;
use beerandcode\modulo5\Providers\StripePaymentProvider;

class Stripe extends Facade
{
  protected static function getFacadeAcessor():string{
    return StripePaymentProvider::class;
  }
}
