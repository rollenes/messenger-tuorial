Feature:
  In order to communicate with other people
  As a website user
  I need to be able to send message

  Scenario: Sending email message
    Given I am on send email page
    When I provide recipient "rafal.wartalski@gmail.com" and message text "Hi Rafał"
    And I send message
    Then I should see confirmation "Your message has been sent"
    And recipient "rafal.wartalski@gmail.com" should get message
