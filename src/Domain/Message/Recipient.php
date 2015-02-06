<?php

namespace Domain\Message;

final class Recipient
{
    public function __construct($recipient)
    {
        if (!is_string($recipient)) {
            throw new \LogicException('Recipient should be a string');
        }

        $this->recipient = $recipient;
    }

    public function __toString()
    {
        return $this->recipient;
    }
}
