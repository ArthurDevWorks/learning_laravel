<?php

namespace beerandcode\modulo5\Base;

use Psr\Container\ContainerInterface;
use ReflectionClass;

class Container implements ContainerInterface
{

  //Guarda os dados das classes que vao ser carregadas pelo container
  protected array $services = [
    'id' => 'class'
  ];

  //Buscas os dados das classes e cria as instancias com o getInstance
  public function get(string $id):mixed{
    $service = $this->resolve($id);
    return $this->getInstance($service);
  }

  //Verifica se ja existe a classe carregadas no array
  public function has(string $id):bool{
    return array_key_exists($id,$this->services);
  }

  //Verifica se o serviço solicitado existe, caso nao exista ele cria uma instancia sem dados,
  //Que provavelmente vai parar nas Exceptions *Ainda restam duvidas*
  private function resolve(String $key): ReflectionClass{
    if($this->has(($key))){
      $service = $this->services[$key];

      if(is_callable($service)){
        return$service();
      }
      return $service;
    }
    $this->services[$key] = new ReflectionClass($key);

    return $this->services[$key];
  }

  //Verifica a quantidade de parametros do serviço e retorna a sua instancias.
  private function getInstance(ReflectionClass $service){
    $constructor = $service->getConstructor();

    if(is_null($constructor) || $constructor->getNumberOfRequiredParameters() == 0){
      return  $service->newInstance();
    }

    $params = [];

    //Percorre o construtor da classe e guarda todos os parametros em "params"
    foreach($constructor->getParameters() as $parameter){
      if($paramType = $parameter->getType()){
        $params[] = $this->get($paramType->getName());
      }
    }
    return $service->newInstanceArgs($params);
  }

  //Define manualmente o serviço que vai entrar no container, também restam dúvidas 
  public function register(string $key, string $target = null):void{
    $target = $target ?? $key;
    $this->services[$key] = new ReflectionClass($target);
  }
}
