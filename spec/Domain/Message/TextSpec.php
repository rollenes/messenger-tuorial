<?php

namespace spec\Domain\Message;

use Domain\Message\Text;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin Text
 */
class TextSpec extends ObjectBehavior
{
    function it_can_be_casted_to_string()
    {
        $testMessage = 'this is test message';
        $this->beConstructedWith($testMessage);

        $this->__toString()->shouldBe($testMessage);
    }

    function it_rises_exception_when_created_with_no_string()
    {
        $this->shouldThrow()->during('__construct', [null]);
        $this->shouldThrow()->during('__construct', [132]);
    }
}
