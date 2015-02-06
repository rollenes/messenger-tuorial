<?php

namespace spec\Domain;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EmailSenderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Domain\EmailSender');
    }

    function it_implements_sender()
    {
        $this->shouldImplement('Domain\Sender');
    }
}
