<?php

namespace Domain;

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
}
