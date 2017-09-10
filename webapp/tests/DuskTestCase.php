<?php

namespace Tests;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\WebDriverCapabilityType;
use Laravel\Dusk\TestCase as BaseTestCase;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     * @return void
     */
    public static function prepare()
    {
//        static::startChromeDriver();
    }

    protected function baseUrl()
    {
        return 'http://project-x.selenium:8080';
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {

        $options = new ChromeOptions();

        $options->addArguments(['--kiosk']);

        $capabilities = DesiredCapabilities::chrome();
        $capabilities->setCapability(WebDriverCapabilityType::ACCEPT_SSL_CERTS, true);
        $capabilities->setCapability(ChromeOptions::CAPABILITY, $options);

        return RemoteWebDriver::create(
            'http://selenium-ch:4444/wd/hub', $capabilities
        );

//        return RemoteWebDriver::create(
//            'http://selenium-firefox:4444/wd/hub', DesiredCapabilities::firefox()
//        );
    }
}
