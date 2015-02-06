<?php

namespace Fake;

use Domain\Message;

class Sender implements \Domain\Sender
{
    private $sentMessages = [];

    /**
     * @param Message $message
     * @throws \Domain\Exception\SenderException
     */
    public function send(Message $message)
    {
        array_push($this->sentMessages, $message);
    }

    public function findSentMessage(Message $message)
    {
        foreach ($this->sentMessages as $sentMessage) {
            if ($message == $sentMessage) {
                return $sentMessage;
            }
        }
    }
}