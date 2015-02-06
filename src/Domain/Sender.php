<?php

namespace Domain;

interface Sender
{
    public function send(Message $message);
} 