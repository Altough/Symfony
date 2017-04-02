<<?php

namespace OC\PlatformBundle\Controlleur;

use Symfony\ComponentHttpFoundation\Response;
class Advertcontroller
{
  public function indexAction()
  {
    return new Response("Hello world");
  }
}
