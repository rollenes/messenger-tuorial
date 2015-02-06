<?php

namespace Domain\Message;

class Text
{
    private $text;

    public function __construct($text)
    {
        if (!is_string($text)) {
            throw new \LogicException('Recipient should be a string');
        }

        $this->text = $text;
    }

    public function __toString()
    {
        return $this->text;
    }
}
