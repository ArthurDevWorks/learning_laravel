<?php

namespace beerandcode\modulo5\Providers\interfaces;

use beerandcode\modulo5\Utils\Http;

interface PaymentProviderContract
{
  public function __construct(Http $httpClient);

  public function charge(string $email, int $amount):string;
}
