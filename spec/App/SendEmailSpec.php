<?php

namespace spec\App;

use App\SendEmail;
use App\Sender\Email;
use Domain\Message;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @mixin SendEmail
 */
class SendEmailSpec extends ObjectBehavior
{
    function let(\Twig_Environment $twig, Email $emailSender)
    {
        $this->beConstructedWith($twig, $emailSender);
    }

    function it_returns_response(Email $emailSender)
    {
        $request = new Request();

        $emailSender->send(Argument::type(Message::class))->shouldNotBeCalled();

        $this($request)->shouldBeAnInstanceOf(Response::class);
    }

    function it_sends_email(Email $emailSender)
    {
        $request = $this->createPostRequest();

        $this($request);

        $emailSender->send(Argument::type(Message::class))->shouldHaveBeenCalled();
    }

    private function createPostRequest()
    {
        $request = new Request([], [
            'recipient' => 'test@test.pl',
            'message' => 'Test message'
        ]);

        $request->setMethod('POST');

        return $request;
    }

}
