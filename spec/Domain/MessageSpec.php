<?php

namespace spec\Domain;

use Domain\Message;
use Domain\Message\Recipient;
use Domain\Sender;
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

    function it_can_be_send(Sender $sender)
    {
        $sender->send($this)->shouldBeCalled();

        $this->send($sender)->shouldReturn(true);
    }
}
