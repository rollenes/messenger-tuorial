<?php

namespace App;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SendEmail
{
    /**
     * @var \Twig_Environment
     */
    private $twig;

    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke(Request $request)
    {
        $content = $this->twig->render('send-email.html.twig', [
            'recipient' => $request->request->get('recipient'),
            'message' => $request->request->get('message')
        ]);

        return new Response($content);
    }


}
