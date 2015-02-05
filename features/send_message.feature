Feature:
  In order to communicate with other people
  As a website user
  I need to be able to send message

  Scenario: Sending email message
    Given I am on send email page
    When I provide recipient "rafal.wartalski@gmail.com" and message "Hi Rafał"
    And I send message
    Then I should see "Your message has been sent"