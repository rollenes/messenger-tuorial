<?php

namespace App;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SendEmail
{
    public function __invoke(Request $request)
    {
        $content = include __DIR__ . '/../../view/send-email.php';

        return new Response($content);
    }
}


