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
     * @var Domain\EmailSender
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
        $this->sender = new Domain\EmailSender();
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
        throw new PendingException();
    }

    /**
     * @Then recipient :arg1 should get message
     */
    public function recipientShouldGetMessage($arg1)
    {
        throw new PendingException();
    }

}
