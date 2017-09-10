Feature: Laravel Behat Extension
  In order to make testing setup easier
  As a developer
  I want to show an example of the Laravel Behat extension viewing UI elements.

  Scenario: Dummy Example
    Given I am on the homepage
    Then I should see "Project X"

  Scenario: Home Page Title
    Given I am on the homepage
    Then I should see "Project X" in the "title" element