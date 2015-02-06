<?php

namespace Domain;

use Domain\Exception\MessageException;
use Domain\Message\Recipient;
use Domain\Message\Text;

class Message
{
    /**
     * @var Recipient
     */
    private $recipient;

    /**
     * @var Text
     */
    private $text;

    /**
     * @var bool
     */
    private $sent = false;

    public function __construct(Recipient $recipient, Text $text)
    {
        $this->recipient = $recipient;
        $this->text = $text;
    }

    public function getRecipient()
    {
        return $this->recipient;
    }

    public function getText()
    {
        return $this->text;
    }

    public function send(Sender $sender)
    {
        if ($this->isSent()) {
            throw new MessageException('Message cannot be sent twice');
        }

        $sender->send($this);

        $this->sent = true;
    }

    public function isSent()
    {
        return $this->sent;
    }
}
