<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class WebContext implements Context, SnippetAcceptingContext
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
     * @When I provide recipient :recipient and message text :message
     */
    public function iProvideRecipientAndMessageText($recipient, $message)
    {
        $this->sendEmailPage->fillField('recipient', $recipient);
        $this->sendEmailPage->fillField('message', $message);
    }

    /**
     * @When I send message
     */
    public function iSendMessage()
    {
        $button = $this->sendEmailPage->findButton('send');

        if (!$button) {
            throw new \LogicException('There is no send button!');
        }

        $button->submit();
    }

    /**
     * @Then recipient :recipientEmail should get message
     */
    public function recipientShouldGetMessage($recipientEmail)
    {
        $confirmationText = $this->sendEmailPage->find('css', '#confirmation')->getText();

        if (strpos($confirmationText, $recipientEmail) === false) {
            throw new \LogicException('Message did not get to recipient');
        }
    }
}
