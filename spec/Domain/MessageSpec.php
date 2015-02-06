<?php

namespace spec\Domain;

use Domain\Message;
use Domain\Message\Recipient;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin Message
 */
class MessageSpec extends ObjectBehavior
{
    private $recipient;
    private $text;

    public function let()
    {
        $this->recipient = new Recipient('test@test.pl');
        $this->text = new Message\Text('test text');

        $this->beConstructedWith($this->recipient, $this->text);
    }

    function it_has_recipient()
    {
        $this->getRecipient()->shouldBe($this->recipient);
    }

    function it_has_text()
    {
        $this->getText()->shouldBe($this->text);
    }
}
