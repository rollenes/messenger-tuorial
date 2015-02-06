<?php

namespace App\Sender;

use Domain\Message;
use Domain\Sender;

class Email implements Sender
{
    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @param Message $message
     * @throws \Domain\Exception\SenderException
     */
    public function send(Message $message)
    {
        $swiftMessage = new \Swift_Message('message from the dark side');
        $swiftMessage->setFrom('dark@side.pl');
        $swiftMessage->setTo((string)$message->getRecipient());
        $swiftMessage->setBody((string)$message->getText());

        $this->mailer->send($swiftMessage);
    }


}
