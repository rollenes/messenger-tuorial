<?php

namespace spec\App\Sender;

use App\Sender\Email;
use Domain\Message;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * @mixin Email
 */
class EmailSpec extends ObjectBehavior
{
    function let(\Swift_Mailer $mailer)
    {
        $this->beConstructedWith($mailer);
    }

    function it_is_sender()
    {
        $this->shouldImplement('Domain\Sender');
    }

    function it_sends_email(\Swift_Mailer $mailer)
    {
        $domainMessage = new Message(new Message\Recipient('test@test.pl'), new Message\Text('test message'));

        $swiftMessageMatcher = function($swiftMessage) {

            if (!$swiftMessage instanceof \Swift_Message) {
                return false;
            }

            if ($swiftMessage->getTo() != ['test@test.pl' => null]) {
                return false;
            }

            if ($swiftMessage->getBody() !== 'test message') {
                return false;
            }

            return true;
        };

        $mailer->send(Argument::that($swiftMessageMatcher))->shouldBeCalled();

        $this->send($domainMessage)->shouldNotThrow();
    }
}
