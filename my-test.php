<?php

require_once(__DIR__ . '/vendor/autoload.php');

$host = 'http://localhost:4444/wd/hub'; // this is the default
$USE_FIREFOX = true; // if false, will use chrome.

if ($USE_FIREFOX)
{
    $driver = Facebook\WebDriver\Remote\RemoteWebDriver::create(
        $host, 
        Facebook\WebDriver\Remote\DesiredCapabilities::firefox()
    );
}
else
{
    $driver = Facebook\WebDriver\Remote\RemoteWebDriver::create(
        $host, 
        Facebook\WebDriver\Remote\DesiredCapabilities::chrome()
    );
}

$driver->get("http://www.google.com");

# enter text into the search field
$driver->findElement(Facebook\WebDriver\WebDriverBy::id('lst-ib'))->click();
sleep(1);
$driver->findElement(Facebook\WebDriver\WebDriverBy::id('lst-ib'))->sendKeys('programster selenium');
sleep(1);

# Click the search button
$driver->findElement(Facebook\WebDriver\WebDriverBy::name('btnK'))->click();
