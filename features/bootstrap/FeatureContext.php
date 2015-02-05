<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given I am on send email page
     */
    public function iAmOnSendEmailPage()
    {
        throw new PendingException();
    }

    /**
     * @When I provide recipient :arg1 and message :arg2
     */
    public function iProvideRecipientAndMessage($arg1, $arg2)
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
     * @Then I should see :arg1
     */
    public function iShouldSee($arg1)
    {
        throw new PendingException();
    }
}
