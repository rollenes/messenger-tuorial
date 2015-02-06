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

$transport = new Swift_MailTransport();

$swiftMailer = \Swift_Mailer::newInstance($transport);

$sender = new App\Sender\Email($swiftMailer, 'dark@side.pl');

$request = Request::createFromGlobals();

$request->attributes->set('_controller', new \App\SendEmail($twig, $sender));

$kernel = new HttpKernel(new EventDispatcher(), new ControllerResolver());

$response = $kernel->handle($request);
$response->send();

