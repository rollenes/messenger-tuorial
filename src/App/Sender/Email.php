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

    /**
     * @var string
     */
    private $emailFrom;

    public function __construct(\Swift_Mailer $mailer, $emailFrom)
    {
        $this->mailer = $mailer;
        $this->emailFrom = $emailFrom;
    }

    /**
     * @param Message $message
     * @throws \Domain\Exception\SenderException
     */
    public function send(Message $message)
    {
        $swiftMessage = new \Swift_Message('message from the dark side');
        $swiftMessage->setFrom($this->emailFrom);
        $swiftMessage->setTo((string)$message->getRecipient());
        $swiftMessage->setBody((string)$message->getText());

        $this->mailer->send($swiftMessage);
    }


}
