<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class DomainContext implements Context, SnippetAcceptingContext
{
    /**
     * @Given I am on send email page
     */
    public function iAmOnSendEmailPage()
    {
        throw new PendingException();
    }

    /**
     * @When I provide recipient :arg1 and message text :arg2
     */
    public function iProvideRecipientAndMessageText($arg1, $arg2)
    {
        throw new PendingException();
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
