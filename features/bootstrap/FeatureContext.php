<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    /**
     * @var \Page\SendEmail
     */
    private $sendEmailPage;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct(\Page\SendEmail $sendEmailPage)
    {
        $this->sendEmailPage = $sendEmailPage;
    }

    /**
     * @Given I am on send email page
     */
    public function iAmOnSendEmailPage()
    {
        $this->sendEmailPage->open();

        if (!$this->sendEmailPage->isOpen()) {
            throw new \LogicException('Cannot open send email page');
        }
    }

    /**
     * @When I provide recipient :recipient and message :message
     */
    public function iProvideRecipientAndMessage($arg1, $arg2)
    {
        $this->sendEmailPage->fillField('recipient', $arg1);
        $this->sendEmailPage->fillField('message', $arg2);
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
