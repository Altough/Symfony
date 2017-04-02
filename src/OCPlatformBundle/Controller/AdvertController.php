<<?php

namespace OC\PlatformBundle\Controlleur;

use Symfony\Component\HttpFoundation\Response;
class Advertcontroller
{
  public function indexAction()
  {
    return new Response("Hello world");
  }
}
