<?php

namespace Domain;

interface Sender
{
    /**
     * @param Message $message
     * @throws \Domain\Exception\SenderException
     */
    public function send(Message $message);
} 