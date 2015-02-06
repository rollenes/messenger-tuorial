<?php

require_once 'vendor/autoload.php';

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\HttpKernel;

$request = Request::createFromGlobals();
$request->attributes->set('_controller', \App\SendEmail::class);

$kernel = new HttpKernel(new EventDispatcher(), new ControllerResolver());

$response = $kernel->handle($request);
$response->send();

