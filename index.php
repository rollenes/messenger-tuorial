<?php

require_once 'vendor/autoload.php';

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\HttpKernel;

$loader = new Twig_Loader_Filesystem(__DIR__ . '/view');
$twig = new Twig_Environment($loader, array(
    'cache' => __DIR__ . '/cache/twig',
));

$request = Request::createFromGlobals();

$request->attributes->set('_controller', new \App\SendEmail($twig));

$kernel = new HttpKernel(new EventDispatcher(), new ControllerResolver());

$response = $kernel->handle($request);
$response->send();

