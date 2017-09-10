Feature: Register Process
  In order to register on the system
  A register form should be presented
  The guest should be able to enter their details and submit.

  Scenario: Navigates to the register page as a guest
    Given I am a guest user
    When I go to "/register"
    Then I should see "Register"
    And I should see a "form" element

  Scenario: Navigates to the register page as a guest
    Given I am a registered user
    When I go to "/register"
    Then I should be on the homepage

  Scenario: Navigates to the register page and enters correct details
    Given I am a guest user
    When I go to "/register"
    Then I should see "Register"
    And I should see a "form" element
    When I fill in "first_name" with "Test"
    When I fill in "last_name" with "User"
    When I fill in "email" with a unregistered email
    When I fill in "password" with "password123"
    When I fill in "password_confirmation" with "password123"
    And I press "Sign Up"
    Then I should be on "/"

  Scenario: Navigates to the register page and enters duplicate details
    Given I am a guest user
    When I go to "/register"
    Then I should see "Register"
    And I should see a "form" element
    When I fill in "first_name" with "Test"
    When I fill in "last_name" with "User"
    When I fill in "email" with a registered email
    When I fill in "password" with a registered emails password
    When I fill in "password_confirmation" with a registered emails password
    And I press "Sign Up"
    Then I should be on "/register"
    And I should see "The email has already been taken."