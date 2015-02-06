<?php

namespace spec\Domain\Message;

use Domain\Message\Recipient;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin Recipient
 */
class RecipientSpec extends ObjectBehavior
{
    function it_can_be_casted_to_string()
    {
        $testRecipient = 'test@test.pl';
        $this->beConstructedWith($testRecipient);

        $this->__toString()->shouldBe($testRecipient);
    }

    function it_rises_exception_when_created_with_no_string()
    {
        $this->shouldThrow()->during('__construct', [null]);
        $this->shouldThrow()->during('__construct', [132]);
    }
}
