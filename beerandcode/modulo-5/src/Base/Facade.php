<?php

namespace beerandcode\modulo5\Base;

class Facade
{
  public static function __callStatic($name, $arguments)
  {
    $container = Container::getContainer();
    $service = $container->get(static::getFacadeAcessor());
    return $service->method(...$arguments);
  }

  protected static function getFacadeAcessor():string{
    return "";
  }
}
