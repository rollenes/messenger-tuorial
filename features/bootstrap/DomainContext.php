<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Domain\Message;
use Domain\Message\Recipient;
use Domain\Message\Text;

/**
 * Defines application features from the specific context.
 */
class DomainContext implements Context, SnippetAcceptingContext
{
    /**
     * @var \Fake\Sender
     */
    private $sender;

    /**
     * @var Message
     */
    private $message;

    /**
     * @Given I am on send email page
     */
    public function iAmOnSendEmailPage()
    {
        $this->sender = new \Fake\Sender();
    }

    /**
     * @When I provide recipient :recipient and message text :messageText
     */
    public function iProvideRecipientAndMessageText($recipient, $messageText)
    {
        $this->message = new Message(new Recipient($recipient), new Text($messageText));
    }

    /**
     * @When I send message
     */
    public function iSendMessage()
    {
        $this->message->send($this->sender);
    }

    /**
     * @Then recipient :recipient should get message
     */
    public function recipientShouldGetMessage($recipient)
    {
        if ($recipient !== (string)$this->message->getRecipient()) {
            throw new \LogicException(
                sprintf('Message was sent to: %s. Expected: %s', $this->message->getRecipient(), $recipient)
            );
        }

        if (!$this->sender->findSentMessage($this->message)) {
            throw new \LogicException('Message didn`t get to recipient');
        }
    }
}
