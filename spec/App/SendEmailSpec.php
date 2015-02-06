<?php

namespace spec\App;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SendEmailSpec extends ObjectBehavior
{
    function it_returns_response()
    {
        $request = $this->createRequest();

        $this($request)->shouldBeAnInstanceOf(Response::class);
    }

    private function createRequest()
    {
        return new Request([], [
            'recipient' => 'test@test.pl',
            'message' => 'Test message'
        ]);
    }

}
