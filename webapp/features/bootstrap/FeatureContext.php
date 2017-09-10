<?php

use App\Models\User;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\MinkExtension\Context\MinkContext;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;

#This will be needed if you require "behat/mink-selenium2-driver"
#use Behat\Mink\Driver\Selenium2Driver;

// Import PHP Unit

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context, SnippetAcceptingContext
{


    public $knownUser;
    public $knownPassword;

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

    /** @BeforeScenario */
    public function before($event)
    {
        // prepare system for test suite
        // before it runs

        $faker = Faker\Factory::create();

        // Setup the user
        $firstName = "Test";
        $lastName = "User";
        $email = $faker->email;
        $this->knownPassword = $faker->password;

        //  Create the user
        $this->knownUser = User::create([
            "first_name" => $firstName,
            "last_name" => $lastName,
            "email" => $email,
            'password' => bcrypt($this->knownPassword)
        ]);

    }

    /** @AfterScenario */
    public function after($event)
    {
        $this->knownUser->delete();
    }

    /**
     * @Given I am a guest user
     * Not an authenticated user
     */
    public function iAmAGuestUser()
    {
        Auth::logout();
    }

    /**
     * @Given I am a registered user
     */
    public function iAmARegisteredUser()
    {
        Auth::login($this->knownUser);
    }

    /**
     * @Given I am a company user
     */
    public function iAmACompanyUser()
    {
        throw new PendingException();
    }

    /**
     * @Given I am on the login page
     */
    public function iAmOnTheLoginPage()
    {
        $this->visitPath('/login');
    }

    /**
     * @When I fill in :field with a registered email
     * Example: When I fill in "email" with a registered email
     */
    public function iFillInWithARegisteredEmail($field)
    {

        $value = $this->getRegisteredEmail();
        $this->getSession()->getPage()->fillField($field, $value);
    }

    protected function getRegisteredEmail()
    {
        return $this->knownUser->email;
    }

    /**
     * @When I fill in :arg1 with a unregistered email
     */
    public function iFillInWithAUnregisteredEmail($field)
    {
        $faker = Faker\Factory::create();
        $value = $faker->email;
        $this->getSession()->getPage()->fillField($field, $value);
    }

    /**
     * @When I fill in :arg1 with a registered emails password
     */
    public function iFillInWithARegisteredEmailsPassword($field)
    {
        $value = $this->getRegisteredPassword();
        $this->getSession()->getPage()->fillField($field, $value);
    }

    protected function getRegisteredPassword()
    {
        return $this->knownPassword;
    }
}
