Feature: Login Process
  In order to login to the system
  A login form should be presented
  The user should be able to enter their email and password
  If correct, the user should be logged in
  If not correct the user should see an error

  Scenario: Navigates to the login page
    Given I am on "/login"
    Then I should see "Login"
    And I should see a "form" element

  Scenario: Navigates to the login page and enters correct details
    Given I am on "/login"
    Then I should see "Login"
    And I should see a "form" element
    When I fill in "email" with a registered email
    When I fill in "password" with a registered emails password
    And I press "Login"
    Then I should be on "/"

  Scenario: Navigates to the login page and enters no details
    Given I am on "/login"
    Then I should see "Login"
    And I should see a "form" element
    When I fill in "email" with ""
    When I fill in "password" with ""
    And I press "Login"
    Then I should see "This is a required field"

  Scenario: Navigates to the login page and enters details that don't match
    Given I am on "/login"
    Then I should see "Login"
    And I should see a "form" element
    When I fill in "email" with a unregistered email
    When I fill in "password" with "12345password"
    And I press "Login"
    Then I should be on "/login"
    And I should see "These credentials do not match our records."
