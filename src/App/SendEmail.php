<?php

namespace App;

use App\Sender\Email;
use Domain\Message;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SendEmail
{
    /**
     * @var \Twig_Environment
     */
    private $twig;

    /**
     * @var Email
     */
    private $emailSender;

    public function __construct(\Twig_Environment $twig, Email $emailSender)
    {
        $this->twig = $twig;
        $this->emailSender = $emailSender;
    }

    public function __invoke(Request $request)
    {

        if ($request->isMethod('POST')) {
            $message = new Message(new Message\Recipient($request->request->get('recipient')), new Message\Text($request->request->get('message')));
            $this->emailSender->send($message);
        }

        $content = $this->twig->render('send-email.html.twig', [
            'recipient' => $request->request->get('recipient'),
            'message' => $request->request->get('message')
        ]);

        return new Response($content);
    }
}
